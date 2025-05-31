<?php

namespace App\Http\Controllers;

use App\Http\Requests\DiagnosisRequest; // Request khusus untuk validasi input diagnosis
use App\Models\Diagnosis; // Model diagnosis
use App\Services\Diagnosis\DiagnosisService; // Service yang menangani logika diagnosis
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Untuk cek user login
use Dompdf\Dompdf; // DomPDF untuk cetak PDF
use Dompdf\Options;
use Illuminate\Support\Facades\Http; // Untuk kirim request ke Fonnte (WhatsApp)
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

class DiagnosisController extends Controller
{
    // Injeksi service diagnosis melalui constructor
    public function __construct(private DiagnosisService $service) {}

    /**
     * Menampilkan halaman awal diagnosis (bisa langsung redirect ke create).
     */
    public function index()
    {
        $data = $this->service->create();
        return view('User.Diagnosis.diagnosis', $data);
    }

    /**
     * Menampilkan form untuk mengisi diagnosis baru.
     */
    public function create()
    {

        $data = $this->service->create(); // Ambil data gejala dan lainnya dari service
        return view('User.Diagnosis.diagnosis', $data);
    }

    /**
     * Menyimpan data diagnosis yang diisi pengguna.
     */
    public function store(DiagnosisRequest $request)
    {

        $data = $this->service->store($request); // Simpan data ke database
        if ($data) {
            // Kirim hasil diagnosis via WhatsApp ke nomor user
            $this->sendMessage($data, Auth::user()->number);
            
            // Redirect ke halaman hasil diagnosis
            return redirect(route('diagnosis.show', $data->diagnosis_id));
        } else {
            // Jika tidak memilih gejala
            return redirect()->back()->with('error_gejala', 'Mohon memasukkan Gejala/Kondisi');
        }
    }

    /**
     * Mengirim pesan hasil diagnosis ke WhatsApp menggunakan API Fonnte.
     */
    public function sendMessage($data, $target)
    {
        // Variabel untuk setiap parameter
        $redirect = 'https://fonnte.com';
        $token = env('FONNTE_TOKEN'); // Token dari .env

        // Membuat URL untuk hasil diagnosis
        $diagnosisUrl = route('cetak-diagnosis', $data->diagnosis_id); // Link cetak PDF

        // Mengambil tanggal dan waktu saat ini dalam format WIB
        $dateTime = new \DateTime('now', new \DateTimeZone('Asia/Jakarta'));
        $formattedDateTime = $dateTime->format('d/m/Y H:i:s');

        // Membuat pesan dengan interpolasi variabel yang benar
        // Template pesan WA
        $message = "Hallo *{$data->nama_pengguna}*, \n\n" .
            "Terima kasih telah menggunakan layanan kami. Berikut informasi mengenai pengecekan kondisi Anda:\n\n" .
            "Nama: {$data->nama_pengguna}\n" .
            "Alamat: {$data->alamat_pengguna}\n" .
            // "Umur: {$data->age} thn\n" .
            "Tanggal: {$formattedDateTime} WIB \n" .
            "Detail: {$diagnosisUrl}\n\n" .
            "Salam Hangat,\n*SIDINYAM - Sistem Informasi Deteksi Penyakit Akibat Gigitan Nyamuk*";

        // Encode parameter message
        // Encode dan kirim ke API Fonnte
        $encodedMessage = urlencode($message);

        // Buat URL lengkap dengan parameter yang di-encode
        $url = "https://api.fonnte.com/send?redirect=" . urlencode($redirect) .
            "&token=" . urlencode($token) .
            "&target=" . urlencode($target) .
            "&message=" . $encodedMessage;

        // Kirim permintaan GET menggunakan Http Client
        $response = Http::get($url);

        // Kembalikan true jika pesan berhasil dikirim, atau false jika gagal
        return $response->successful();
    }



    /**
     * Menampilkan hasil diagnosis berdasarkan ID.
     */
    public function show(string $id)
{
    $data = $this->service->find($id);

    if ($data) {
        $currentUser = Auth::user();

        // Admin atau pemilik data
        if (
            $currentUser->hasRole('admin') ||
            $data['data']->kode_pengguna == $currentUser->id ||
            (
                $currentUser->hasRole('pakar') &&
                in_array($data['data']->user->getRoleNames()->first(), ['admin', 'user'])
            )
        ) {
            return view('User.Diagnosis.hasil', $data);
        }
    }

    // Jika tidak berhak melihat
    return redirect()->route('riwayat-diagnosis')->with('error', 'Anda tidak memiliki akses ke hasil diagnosis ini.');
}


    /**
     * Mencetak hasil diagnosis menjadi file PDF.
     */
    public function cetak($id)
    {
        // Ambil data diagnosis berdasarkan ID
        $data = $this->service->find($id);
        if ($data) {
            // Load HTML dari view cetak
            $html = view('User.Diagnosis.cetak', $data)->render();

            // Konfigurasi Dompdf
            $options = new Options();
            $options->set('isHtml5ParserEnabled', true);
            $options->set('isRemoteEnabled', true);

            $dompdf = new Dompdf($options);
            $dompdf->loadHtml($html);
            $dompdf->setPaper('A4', 'portrait');
            $dompdf->render();

            // Nama file PDF
            $filename = $data['data']->diagnosis_id . ".pdf";

            // Tampilkan PDF di browser
            return $dompdf->stream($filename, ["Attachment" => false]);
        }
        return view('User.Diagnosis.riwayat', $this->service->getAll());
    }
    /**
     * disiapkan untuk fitur edit diagnosis.
     */
    public function edit(Diagnosis $diagnosis)
    {
        //
    }

    /**
     * disiapkan untuk fitur update diagnosis.
     */
    public function update(Request $request, Diagnosis $diagnosis)
    {
        //
    }

    /**
     * Menampilkan seluruh riwayat diagnosis milik user.
     */
    public function history()
{
    $user = auth()->user();

    if ($user->hasRole('pakar')) {
        $diagnosis = Diagnosis::whereHas('user.roles', function ($q) {
            $q->whereIn('name', ['user', 'admin']);
        })->latest()->get();
    
        // Buat chart diagnosis per penyakit
        $chart = $diagnosis->groupBy(fn ($item) => $item->desease->nama_penyakit)
            ->map(fn ($items) => number_format(($items->count() * 100) / max(1, $diagnosis->count()), 2));
    }    
    elseif ($user->hasRole('admin')) {
        $diagnosis = Diagnosis::where(function ($q) use ($user) {
            $q->where('kode_pengguna', $user->id)
              ->orWhereHas('user.roles', function ($r) {
                  $r->where('name', 'user');
              });
        })->latest()->get();

        // Buat data chart: hitung jumlah diagnosis per penyakit
        $chart = $diagnosis->groupBy(fn ($item) => $item->desease->nama_penyakit)
    ->map(fn ($items) => number_format(($items->count() * 100) / max(1, $diagnosis->count()), 2));
    }
    else {
        $diagnosis = Diagnosis::where('kode_pengguna', $user->id)->latest()->get();
        $chart = collect(); // Kosongkan untuk user
    }

    return view('User.Diagnosis.riwayat', [
        'pageTitle' => 'Riwayat Diagnosis',
        'breadcrumb' => [['label' => 'Beranda'], ['label' => 'Riwayat Pemeriksaan']],
        'diagnosis' => $diagnosis,
        'chart' => $chart
    ]);
}

    /**
     * Menghapus satu data diagnosis berdasarkan ID.
     */
    public function destroy($id)
    {

        $this->service->destroy($id);
        return redirect(route('riwayat-diagnosis'))->with(['success' => 'Hapus Berhasil']);
    }

    /**
     * Menghapus semua data diagnosis milik user.
     */
    public function deleteAll()
    {
        $this->service->deleteAll();
        return redirect(route('riwayat-diagnosis'))->with(['success' => 'Hapus Berhasil']);
    }
}
