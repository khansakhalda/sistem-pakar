<?php

namespace Database\Seeders;

use App\Models\Desease;
use App\Models\Indication;
use App\Models\Rule;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
use Whoops\Run;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(1)->create();

        //Role Creation
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'user']);

        $admin = User::create([
            'name' => 'admin',
            'age' => '20',
            'number' => '085731013100',
            'email' => 'khansakhalda1604@gmail.com',
            'address' => 'Kediri',
            'email_verified_at' => now(),
            'password' => Hash::make('adminkhansa'),
            'remember_token' => Str::random(10),
        ]);

        $user = User::create([
            'name' => 'user',
            'age' => '20',
            'number' => '085731013101',
            'email' => 'khansa.khalda@mhs.unsoed.ac.id',
            'address' => 'Kediri',
            'email_verified_at' => now(),
            'password' => Hash::make('userkhansa'),
            'remember_token' => Str::random(10),
        ]);

        // Register Role  & Permission to Users
        $admin->assignRole('admin');
        $user->assignRole('user');




        Desease::create([
            'nama_penyakit' => 'Croup',
            'detail_penyakit' => 'Croup adalah penyakit respiratorik serius pada anak-anak, umumnya menyerang usia 6 bulan hingga 3 tahun, dan jarang terjadi pada usia 3 bulan dan di atas 15 tahun. Penyebab utama croup adalah virus, dengan Human Parainfluenza Virus tipe I sebagai penyebab paling umum (75%). Virus lainnya termasuk Respiratory Syncytial Virus (RSV), metapneumovirus, virus influenza A dan B, adenovirus, dan coronavirus. Meski jarang, Mycoplasma pneumonia juga pernah ditemukan sebagai penyebab croupCroup adalah penyakit respiratorik serius pada anak-anak, umumnya menyerang usia 6 bulan hingga 3 tahun, dan jarang terjadi pada usia 3 bulan dan di atas 15 tahun. Penyebab utama croup adalah virus, dengan Human Parainfluenza Virus tipe I sebagai penyebab paling umum (75%). Virus lainnya termasuk Respiratory Syncytial Virus (RSV), metapneumovirus, virus influenza A dan B, adenovirus, dan coronavirus. Meski jarang, Mycoplasma pneumonia juga pernah ditemukan sebagai penyebab croup',
            // 'solusi_penyakit' => 'Croup',
        ]);

        Desease::create([
            'nama_penyakit' => 'Sinusitis Akut',
            'detail_penyakit' => 'Sinusitis akut adalah infeksi pada sinus paranasal yang berlangsung kurang dari 30 hari. Kondisi ini ditandai dengan gejala yang menetap atau memburuk dalam jangka waktu singkat. Sinusitis akut dapat menyebabkan ketidaknyamanan dan mempengaruhi kualitas hidup, namun biasanya dapat sembuh dengan pengobatan yang tepat.',
            // 'solusi_penyakit' => 'Sinusitis Akut',
        ]);

        Desease::create([
            'nama_penyakit' => 'Pertusis (Batuk Rejan)',
            'detail_penyakit' => 'Batuk rejan (pertusis) merupakan infeksi bakteri pada saluran pernapasan yang sangat menular yang disebabkan oleh Bordetella pertussis. Penyakit ini merupakan penyebab utama kesakitan dan kematian di seluruh dunia, terutama pada bayi. Bordetella parapertussis juga dapat menyebabkan penyakit yang mirip dengan pertusis, meskipun biasanya tidak seberat itu. Gejala khas pertusis meliputi serangan batuk paroksismal yang disertai dengan suara teriakan dan muntah',
            // 'solusi_penyakit' => 'Pertusis (Batuk Rejan)',
        ]);

        Desease::create([
            'nama_penyakit' => 'Bronchitis',
            'detail_penyakit' => 'Bronkitis merupakan salah satu alasan yang sering menyebabkan kunjungan ke dokter. Penyakit ini biasanya disebabkan oleh virus, dengan durasi sekitar 1-3 minggu, yang umumnya terjadi pada orang dewasa yang sehat dengan batuk sebagai gejala utama. Selain batuk dan produksi dahak, bronkitis akut sering kali disertai dengan gejala saluran pernapasan bagian atas',
            // 'solusi_penyakit' => 'Bronchitis',
        ]);

        Desease::create([
            'nama_penyakit' => 'Pneumonia',
            'detail_penyakit' => 'Pneumonia adalah infeksi umum pada saluran pernapasan yang secara khusus mempengaruhi alveoli dan cabang-cabang bronkial terakhir di paru-paru. Infeksi ini dapat disebabkan oleh virus, bakteri, jamur, atau kombinasi dari mereka, yang mengakibatkan peradangan dan penumpukan cairan di jaringan paru-paru. Pneumonia merupakan salah satu penyebab utama tingkat keparahan dan kematian pada anak-anak di bawah usia 5 tahun secara global',
            // 'solusi_penyakit' => 'Pneumonia',
        ]);

        Desease::create([
            'nama_penyakit' => 'Epiglotitis',
            'detail_penyakit' => 'Epiglotitis merupakan inflamasi pada epiglotis, struktur yang terletak di belakang lidah dan terdiri dari tulang rawan serta berbentuk seperti flap. Biasanya, kondisi ini dipicu oleh infeksi bakteri atau trauma pada tenggorokan. Epiglotis berfungsi sebagai katup yang menutup batang tenggorokan saat menelan, mencegah makanan atau cairan masuk ke saluran pernapasan. Epiglotitis merupakan kondisi darurat yang membutuhkan penanganan segera',
            // 'solusi_penyakit' => 'Epiglotitis',
        ]);

        Desease::create([
            'nama_penyakit' => 'Tonsilitis Akut',
            'detail_penyakit' => 'Tonsilitis adalah kondisi inflamasi pada tonsil palatina, yang merupakan bagian dari cincin Waldeyer. Penularan infeksi dapat melalui udara (airborne droplets), kontak tangan, dan juga ciuman. Tonsilitis dapat terjadi pada semua rentang usia, namun lebih sering ditemukan pada anak-anak',
            // 'solusi_penyakit' => 'Tonsilitis Akut',
        ]);

        Desease::create([
            'nama_penyakit' => 'Faringitis (Radang Tenggorokan)',
            'detail_penyakit' => 'Faringitis merujuk pada infeksi atau peradangan di tenggorokan (faring), yang merupakan saluran yang menghubungkan hidung dan mulut ke paru-paru. Faringitis termasuk dalam kategori penyakit Infeksi Saluran Pernapasan Akut (ISPA), yang meliputi infeksi pada saluran pernapasan dengan durasi tidak lebih dari 14 hari. Faringitis menjadi penyebab 1-2% pasien yang mengunjungi poliklinik atau unit gawat darurat, dan diperkirakan bahwa setiap tahun terdapat 11-18 juta pasien yang mengunjungi layanan kesehatan akibat faringitis di Amerika Serikat',
            // 'solusi_penyakit' => 'Faringitis (Radang Tenggorokan)',
        ]);

        Desease::create([
            'nama_penyakit' => 'Laringitis Akut',
            'detail_penyakit' => 'Laringitis, juga dikenal sebagai peradangan pada organ laring, terjadi terutama pada pita suara. Kondisi ini ditandai dengan pembengkakan pada pita suara yang menyebabkan suara menjadi serak atau parau, sementara pembengkakan ini juga dapat mengganggu pernapasan dengan menghalangi aliran oksigen. Meskipun laringitis dapat sembuh sendiri dalam waktu 2-3 minggu, jika berlangsung lebih lama, dapat berkembang menjadi laringitis kronis. Biasanya, laringitis menyerang individu yang intens menggunakan suara mereka dalam aktivitas sehari-hari, seperti penyanyi, penyiar radio, atau MC
',
            // 'solusi_penyakit' => 'Laringitis Akut',
        ]);

        Desease::create([
            'nama_penyakit' => 'Asma',
            'detail_penyakit' => 'Asma adalah kondisi inflamasi kronis pada saluran napas yang melibatkan berbagai sel dan elemen di dalamnya. Inflamasi yang berkelanjutan menyebabkan peningkatan reaktivitas pada saluran napas, yang menghasilkan gejala episodik yang berulang seperti kesulitan bernapas, sensasi berat di dada, mengi, terutama terjadi pada malam hari atau siang hari',

        ]);

        Desease::create([
            'nama_penyakit' => 'Common Cold',
            'detail_penyakit' => '<p>Common cold adalah salah satu infeksi saluran pernapasan akut (ISPA) yang termasuk kategori nonspesifik atau "flu biasa". Penyakit ini disebabkan oleh virus dan menyerang saluran pernapasan akut, terutama hidung. Infeksi pernapasan akut yang paling banyak ditemukan adalah nasofaringitis atau common cold. Penyebabnya antara lain rhinovirus, influenza virus, adenovirus (ADV), enterovirus, dan parainfluenza viruses (PIV). Lebih dari 200 tipe rhinovirus telah ditemukan, dan infeksi ini terutama terjadi pada anak-anak di bawah usia 5 tahun.</p>',
        ]);

        // Indication::create([
        //     'nama_gejala' => 'kesulitan bernafas',
        // ]);

        // Indication::create([
        //     'nama_gejala' => 'suara yang serak',
        // ]);

        // Indication::create([
        //     'nama_gejala' => 'suara batuk seperti monggong yang keras',
        // ]);

        // Indication::create([
        //     'nama_gejala' => 'suara kasar bernada tinggi saat menghirup nafas',
        // ]);

        // Indication::create([
        //     'nama_gejala' => 'mudah merasa kesal',
        // ]);

        // Indication::create([
        //     'nama_gejala' => 'tidak selera makan',
        // ]);

        // Indication::create([
        //     'nama_gejala' => 'bernafas melalui mulut',
        // ]);

        // Indication::create([
        //     'nama_gejala' => 'suara terdengar sengau',
        // ]);

        // Indication::create([
        //     'nama_gejala' => 'munculnya lendir berwarna kuning atau hijau dari hidung',
        // ]);

        // Indication::create([
        //     'nama_gejala' => 'mengeluarkan bunyi saat bernafas',
        // ]);

        // Indication::create([
        //     'nama_gejala' => 'muntah akibat rejan yang parah',
        // ]);

        // Indication::create([
        //     'nama_gejala' => 'tubuh menjadi memerah dan membiru (sianosis)',
        // ]);

        // Indication::create([
        //     'nama_gejala' => 'batuk berlangsung selama 5 hari atau lebih',
        // ]);

        // Indication::create([
        //     'nama_gejala' => 'keluar dahak bening, kuning, hijau atau putih',
        // ]);

        // Indication::create([
        //     'nama_gejala' => 'dada terasa sakit atau nyeri saat batuk',
        // ]);

        // Indication::create([
        //     'nama_gejala' => 'demam (suhu tubuh di atas 38 derajat Celsius)',
        // ]);

        // Indication::create([
        //     'nama_gejala' => 'hidung tersumbat',
        // ]);

        // Indication::create([
        //     'nama_gejala' => 'terasa sakit pada bagian perut saat batuk',
        // ]);

        // Indication::create([
        //     'nama_gejala' => 'tidak nafsu makan sehingga memicu dehidrasi',
        // ]);

        // Indication::create([
        //     'nama_gejala' => 'Ngiler',
        // ]);

        // Indication::create([
        //     'nama_gejala' => 'Nyeri tenggorokan',
        // ]);

        // Indication::create([
        //     'nama_gejala' => 'Gangguan menelan',
        // ]);

        // Indication::create([
        //     'nama_gejala' => 'Mengi, ditandai dengan suara terjepit seperti siulan ketika penderita bernapas',
        // ]);

        // Indication::create([
        //     'nama_gejala' => 'Batuk kering dikarenakan lapisan pada paru-paru mengalami iritasi dan lendir yang muncul pada bronkial sulit dihilangkan',
        // ]);

        // Indication::create([
        //     'nama_gejala' => 'Hypoxia atau kekurangan oksigen pada beberapa bagian tubuh, ditandai dengan kulit yang membiru dan rasa sakit pada atau di sekitar bagian tubuh yang kekurangan oksigen',
        // ]);

        // Indication::create([
        //     'nama_gejala' => 'jeda antara nafas yang berlangsung 20 detik atau lebih',
        // ]);

        // Indication::create([
        //     'nama_gejala' => 'nafas terengah-engah',
        // ]);

        // Indication::create([
        //     'nama_gejala' => 'Tersedak',
        // ]);

        // Indication::create([
        //     'nama_gejala' => 'detak jantung lambat',
        // ]);

        // Indication::create([
        //     'nama_gejala' => 'Dyspnea / Sesak Nafas (mungkin beraktivitas atau dengan istirahat, tergantung pada tingkat keparahan stenosis)',
        // ]);

        // Indication::create([
        //     'nama_gejala' => 'Pneumonitis berulang',
        // ]);

        Indication::create([
            'nama_gejala' => 'kesulitan bernafas',
        ]);

        Indication::create([
            'nama_gejala' => 'suara yang serak',
        ]);

        Indication::create([
            'nama_gejala' => 'suara batuk seperti monggong yang keras',
        ]);

        Indication::create([
            'nama_gejala' => 'suara kasar bernada tinggi saat menghirup nafas',
        ]);

        Indication::create([
            'nama_gejala' => 'Bau Nafas Tidak Sedap',
        ]);

        Indication::create([
            'nama_gejala' => 'Pilek Tidak Kunjung Membaik',
        ]);

        Indication::create([
            'nama_gejala' => 'bernafas melalui mulut',
        ]);

        Indication::create([
            'nama_gejala' => 'suara terdengar sengau',
        ]);

        Indication::create([
            'nama_gejala' => 'munculnya lendir berwarna kuning atau hijau dari hidung',
        ]);

        Indication::create([
            'nama_gejala' => 'Nyeri Pada bagian wajah terutama ketika bertunduk',
        ]);

        Indication::create([
            'nama_gejala' => 'mengeluarkan bunyi saat bernafas',
        ]);

        Indication::create([
            'nama_gejala' => 'muntah akibat rejan yang parah',
        ]);

        Indication::create([
            'nama_gejala' => 'tubuh menjadi memerah dan membiru (sianosis)',
        ]);

        Indication::create([
            'nama_gejala' => 'batuk berlangsung selama 5 hari atau lebih',
        ]);

        Indication::create([
            'nama_gejala' => 'keluar dahak bening, kuning, hijau atau putih',
        ]);

        Indication::create([
            'nama_gejala' => 'dada terasa sakit atau nyeri saat batuk',
        ]);

        Indication::create([
            'nama_gejala' => 'demam (suhu tubuh di atas 38 derajat Celsius)',
        ]);

        Indication::create([
            'nama_gejala' => 'Batuk',
        ]);

        Indication::create([
            'nama_gejala' => 'Nafas cepat',
        ]);

        Indication::create([
            'nama_gejala' => 'terasa sakit pada bagian perut saat batuk',
        ]);

        Indication::create([
            'nama_gejala' => 'tidak nafsu makan sehingga memicu dehidrasi',
        ]);

        Indication::create([
            'nama_gejala' => 'Ngiler',
        ]);

        Indication::create([
            'nama_gejala' => 'Nyeri tenggorokan',
        ]);

        Indication::create([
            'nama_gejala' => 'Gangguan menelan',
        ]);

        Indication::create([
            'nama_gejala' => 'Sesak',
        ]);

        Indication::create([
            'nama_gejala' => 'Nyeri Menelan',
        ]);

        Indication::create([
            'nama_gejala' => 'Ngorok Saat Tidur',
        ]);

        Indication::create([
            'nama_gejala' => 'Amandel Membesar',
        ]);

        Indication::create([
            'nama_gejala' => 'Tenggorokan Berwarna Merah',
        ]);

        Indication::create([
            'nama_gejala' => 'Suara Serak sampai Hilang',
        ]);

        Indication::create([
            'nama_gejala' => 'Mengi, ditandai dengan suara terjepit seperti siulan ketika penderita bernapas',
        ]);

        Indication::create([
            'nama_gejala' => 'Ada Riwayat Alergi',
        ]);

        Indication::create([
            'nama_gejala' => 'bersin-bersin',
        ]);

        Indication::create([
            'nama_gejala' => 'sakit kepala',
        ]);

        Indication::create([
            'nama_gejala' => 'badan terasa sakit dan tidak nyaman',
        ]);

        // // P01
        // Rule::create(['kode_penyakit' => 'P01', 'kode_gejala' => 'G01', 'cf_pakar' => 0.5, 'mb_pakar' => 0.6, 'md_pakar' => 0.1]);
        // Rule::create(['kode_penyakit' => 'P01', 'kode_gejala' => 'G02', 'cf_pakar' => 0.4, 'mb_pakar' => 0.5, 'md_pakar' => 0.1]);
        // Rule::create(['kode_penyakit' => 'P01', 'kode_gejala' => 'G03', 'cf_pakar' => 0.6, 'mb_pakar' => 0.6, 'md_pakar' => 0.0]);
        // Rule::create(['kode_penyakit' => 'P01', 'kode_gejala' => 'G04', 'cf_pakar' => 0.7, 'mb_pakar' => 0.8, 'md_pakar' => 0.1]);

        // // P02
        // Rule::create(['kode_penyakit' => 'P02', 'kode_gejala' => 'G05', 'cf_pakar' => 0.4, 'mb_pakar' => 0.5, 'md_pakar' => 0.1]);
        // Rule::create(['kode_penyakit' => 'P02', 'kode_gejala' => 'G06', 'cf_pakar' => 0.3, 'mb_pakar' => 0.4, 'md_pakar' => 0.1]);
        // Rule::create(['kode_penyakit' => 'P02', 'kode_gejala' => 'G07', 'cf_pakar' => 0.7, 'mb_pakar' => 0.7, 'md_pakar' => 0.0]);
        // Rule::create(['kode_penyakit' => 'P02', 'kode_gejala' => 'G08', 'cf_pakar' => 0.6, 'mb_pakar' => 0.6, 'md_pakar' => 0.0]);
        // Rule::create(['kode_penyakit' => 'P02', 'kode_gejala' => 'G09', 'cf_pakar' => 0.9, 'mb_pakar' => 0.9, 'md_pakar' => 0.0]);

        // // P03
        // Rule::create(['kode_penyakit' => 'P03', 'kode_gejala' => 'G01', 'cf_pakar' => 0.6, 'mb_pakar' => 0.7, 'md_pakar' => 0.1]);
        // Rule::create(['kode_penyakit' => 'P03', 'kode_gejala' => 'G10', 'cf_pakar' => 0.4, 'mb_pakar' => 0.5, 'md_pakar' => 0.1]);
        // Rule::create(['kode_penyakit' => 'P03', 'kode_gejala' => 'G11', 'cf_pakar' => 0.8, 'mb_pakar' => 0.8, 'md_pakar' => 0.1]);
        // Rule::create(['kode_penyakit' => 'P03', 'kode_gejala' => 'G12', 'cf_pakar' => 0.6, 'mb_pakar' => 0.7, 'md_pakar' => 0.1]);
        // Rule::create(['kode_penyakit' => 'P03', 'kode_gejala' => 'G16', 'cf_pakar' => 0.4, 'mb_pakar' => 0.5, 'md_pakar' => 0.1]);

        // // P04
        // Rule::create(['kode_penyakit' => 'P04', 'kode_gejala' => 'G13', 'cf_pakar' => 0.6, 'mb_pakar' => 0.7, 'md_pakar' => 0.1]);
        // Rule::create(['kode_penyakit' => 'P04', 'kode_gejala' => 'G14', 'cf_pakar' => 0.8, 'mb_pakar' => 0.8, 'md_pakar' => 0.1]);
        // Rule::create(['kode_penyakit' => 'P04', 'kode_gejala' => 'G15', 'cf_pakar' => 0.7, 'mb_pakar' => 0.8, 'md_pakar' => 0.1]);
        // Rule::create(['kode_penyakit' => 'P04', 'kode_gejala' => 'G16', 'cf_pakar' => 0.4, 'mb_pakar' => 0.5, 'md_pakar' => 0.1]);

        // // P05
        // Rule::create(['kode_penyakit' => 'P05', 'kode_gejala' => 'G13', 'cf_pakar' => 0.5, 'mb_pakar' => 0.6, 'md_pakar' => 0.1]);
        // Rule::create(['kode_penyakit' => 'P05', 'kode_gejala' => 'G16', 'cf_pakar' => 0.4, 'mb_pakar' => 0.5, 'md_pakar' => 0.1]);
        // Rule::create(['kode_penyakit' => 'P05', 'kode_gejala' => 'G17', 'cf_pakar' => 0.4, 'mb_pakar' => 0.5, 'md_pakar' => 0.1]);
        // Rule::create(['kode_penyakit' => 'P05', 'kode_gejala' => 'G01', 'cf_pakar' => 0.7, 'mb_pakar' => 0.8, 'md_pakar' => 0.1]);
        // Rule::create(['kode_penyakit' => 'P05', 'kode_gejala' => 'G18', 'cf_pakar' => 0.6, 'mb_pakar' => 0.7, 'md_pakar' => 0.1]);
        // Rule::create(['kode_penyakit' => 'P05', 'kode_gejala' => 'G19', 'cf_pakar' => 0.5, 'mb_pakar' => 0.6, 'md_pakar' => 0.1]);

        // // P06
        // Rule::create(['kode_penyakit' => 'P06', 'kode_gejala' => 'G20', 'cf_pakar' => 0.3, 'mb_pakar' => 0.4, 'md_pakar' => 0.1]);
        // Rule::create(['kode_penyakit' => 'P06', 'kode_gejala' => 'G21', 'cf_pakar' => 0.7, 'mb_pakar' => 0.8, 'md_pakar' => 0.1]);
        // Rule::create(['kode_penyakit' => 'P06', 'kode_gejala' => 'G22', 'cf_pakar' => 0.6, 'mb_pakar' => 0.7, 'md_pakar' => 0.1]);
        // Rule::create(['kode_penyakit' => 'P06', 'kode_gejala' => 'G04', 'cf_pakar' => 0.4, 'mb_pakar' => 0.5, 'md_pakar' => 0.1]);
        // Rule::create(['kode_penyakit' => 'P06', 'kode_gejala' => 'G02', 'cf_pakar' => 0.4, 'mb_pakar' => 0.5, 'md_pakar' => 0.1]);
        // Rule::create(['kode_penyakit' => 'P06', 'kode_gejala' => 'G16', 'cf_pakar' => 0.5, 'mb_pakar' => 0.6, 'md_pakar' => 0.1]);
        // Rule::create(['kode_penyakit' => 'P06', 'kode_gejala' => 'G12', 'cf_pakar' => 0.5, 'mb_pakar' => 0.6, 'md_pakar' => 0.1]);

        // // P07
        // Rule::create(['kode_penyakit' => 'P07', 'kode_gejala' => 'G23', 'cf_pakar' => 0.5, 'mb_pakar' => 0.6, 'md_pakar' => 0.1]);
        // Rule::create(['kode_penyakit' => 'P07', 'kode_gejala' => 'G01', 'cf_pakar' => 0.8, 'mb_pakar' => 0.8, 'md_pakar' => 0.0]);
        // Rule::create(['kode_penyakit' => 'P07', 'kode_gejala' => 'G24', 'cf_pakar' => 0.4, 'mb_pakar' => 0.5, 'md_pakar' => 0.1]);
        // Rule::create(['kode_penyakit' => 'P07', 'kode_gejala' => 'G15', 'cf_pakar' => 0.6, 'mb_pakar' => 0.7, 'md_pakar' => 0.1]);
        // Rule::create(['kode_penyakit' => 'P07', 'kode_gejala' => 'G25', 'cf_pakar' => 0.6, 'mb_pakar' => 0.7, 'md_pakar' => 0.1]);

        // // P08
        // Rule::create(['kode_penyakit' => 'P08', 'kode_gejala' => 'G26', 'cf_pakar' => 0.9, 'mb_pakar' => 0.9, 'md_pakar' => 0.0]);
        // Rule::create(['kode_penyakit' => 'P08', 'kode_gejala' => 'G27', 'cf_pakar' => 0.6, 'mb_pakar' => 0.7, 'md_pakar' => 0.1]);
        // Rule::create(['kode_penyakit' => 'P08', 'kode_gejala' => 'G28', 'cf_pakar' => 0.4, 'mb_pakar' => 0.5, 'md_pakar' => 0.1]);
        // Rule::create(['kode_penyakit' => 'P08', 'kode_gejala' => 'G12', 'cf_pakar' => 0.5, 'mb_pakar' => 0.6, 'md_pakar' => 0.1]);
        // Rule::create(['kode_penyakit' => 'P08', 'kode_gejala' => 'G29', 'cf_pakar' => 0.6, 'mb_pakar' => 0.7, 'md_pakar' => 0.1]);

        // // P09
        // Rule::create(['kode_penyakit' => 'P09', 'kode_gejala' => 'G30', 'cf_pakar' => 0.7, 'mb_pakar' => 0.8, 'md_pakar' => 0.1]);
        // Rule::create(['kode_penyakit' => 'P09', 'kode_gejala' => 'G04', 'cf_pakar' => 0.5, 'mb_pakar' => 0.6, 'md_pakar' => 0.1]);
        // Rule::create(['kode_penyakit' => 'P09', 'kode_gejala' => 'G02', 'cf_pakar' => 0.4, 'mb_pakar' => 0.5, 'md_pakar' => 0.1]);
        // Rule::create(['kode_penyakit' => 'P09', 'kode_gejala' => 'G13', 'cf_pakar' => 0.4, 'mb_pakar' => 0.5, 'md_pakar' => 0.1]);
        // Rule::create(['kode_penyakit' => 'P09', 'kode_gejala' => 'G31', 'cf_pakar' => 0.5, 'mb_pakar' => 0.6, 'md_pakar' => 0.1]);
        // Rule::create(['kode_penyakit' => 'P09', 'kode_gejala' => 'G12', 'cf_pakar' => 0.6, 'mb_pakar' => 0.7, 'md_pakar' => 0.1]);

        Rule::create(['kode_penyakit' => 'P01', 'kode_gejala' => 'G01', 'cf_pakar' => 0.5, 'mb_pakar' => 0.6, 'md_pakar' => 0.1]);
        Rule::create(['kode_penyakit' => 'P01', 'kode_gejala' => 'G02', 'cf_pakar' => 0.4, 'mb_pakar' => 0.5, 'md_pakar' => 0.1]);
        Rule::create(['kode_penyakit' => 'P01', 'kode_gejala' => 'G03', 'cf_pakar' => 0.8, 'mb_pakar' => 0.8, 'md_pakar' => 0.0]);
        Rule::create(['kode_penyakit' => 'P01', 'kode_gejala' => 'G04', 'cf_pakar' => 0.7, 'mb_pakar' => 0.8, 'md_pakar' => 0.1]);

        Rule::create(['kode_penyakit' => 'P02', 'kode_gejala' => 'G05', 'cf_pakar' => 0.8, 'mb_pakar' => 0.8, 'md_pakar' => 0.0]);
        Rule::create(['kode_penyakit' => 'P02', 'kode_gejala' => 'G06', 'cf_pakar' => 0.8, 'mb_pakar' => 0.8, 'md_pakar' => 0.0]);
        Rule::create(['kode_penyakit' => 'P02', 'kode_gejala' => 'G07', 'cf_pakar' => 0.5, 'mb_pakar' => 0.5, 'md_pakar' => 0.0]);
        Rule::create(['kode_penyakit' => 'P02', 'kode_gejala' => 'G08', 'cf_pakar' => 0.6, 'mb_pakar' => 0.6, 'md_pakar' => 0.0]);
        Rule::create(['kode_penyakit' => 'P02', 'kode_gejala' => 'G09', 'cf_pakar' => 0.9, 'mb_pakar' => 0.9, 'md_pakar' => 0.0]);
        Rule::create(['kode_penyakit' => 'P02', 'kode_gejala' => 'G10', 'cf_pakar' => 0.8, 'mb_pakar' => 0.8, 'md_pakar' => 0.0]);

        Rule::create(['kode_penyakit' => 'P03', 'kode_gejala' => 'G01', 'cf_pakar' => 0.6, 'mb_pakar' => 0.7, 'md_pakar' => 0.1]);
        Rule::create(['kode_penyakit' => 'P03', 'kode_gejala' => 'G11', 'cf_pakar' => 0.4, 'mb_pakar' => 0.5, 'md_pakar' => 0.1]);
        Rule::create(['kode_penyakit' => 'P03', 'kode_gejala' => 'G12', 'cf_pakar' => 0.7, 'mb_pakar' => 0.8, 'md_pakar' => 0.1]);
        Rule::create(['kode_penyakit' => 'P03', 'kode_gejala' => 'G13', 'cf_pakar' => 0.6, 'mb_pakar' => 0.7, 'md_pakar' => 0.1]);
        Rule::create(['kode_penyakit' => 'P03', 'kode_gejala' => 'G17', 'cf_pakar' => 0.4, 'mb_pakar' => 0.5, 'md_pakar' => 0.1]);
        Rule::create(['kode_penyakit' => 'P03', 'kode_gejala' => 'G18', 'cf_pakar' => 0.5, 'mb_pakar' => 0.5, 'md_pakar' => 0.0]);

        Rule::create(['kode_penyakit' => 'P04', 'kode_gejala' => 'G14', 'cf_pakar' => 0.6, 'mb_pakar' => 0.7, 'md_pakar' => 0.1]);
        Rule::create(['kode_penyakit' => 'P04', 'kode_gejala' => 'G15', 'cf_pakar' => 0.5, 'mb_pakar' => 0.6, 'md_pakar' => 0.1]);
        Rule::create(['kode_penyakit' => 'P04', 'kode_gejala' => 'G16', 'cf_pakar' => 0.4, 'mb_pakar' => 0.5, 'md_pakar' => 0.1]);
        Rule::create(['kode_penyakit' => 'P04', 'kode_gejala' => 'G17', 'cf_pakar' => 0.2, 'mb_pakar' => 0.3, 'md_pakar' => 0.1]);
        Rule::create(['kode_penyakit' => 'P04', 'kode_gejala' => 'G25', 'cf_pakar' => 0.5, 'mb_pakar' => 0.5, 'md_pakar' => 0.0]);

        Rule::create(['kode_penyakit' => 'P05', 'kode_gejala' => 'G14', 'cf_pakar' => 0.5, 'mb_pakar' => 0.6, 'md_pakar' => 0.1]);
        Rule::create(['kode_penyakit' => 'P05', 'kode_gejala' => 'G17', 'cf_pakar' => 0.6, 'mb_pakar' => 0.6, 'md_pakar' => 0]);
        Rule::create(['kode_penyakit' => 'P05', 'kode_gejala' => 'G19', 'cf_pakar' => 0.8, 'mb_pakar' => 0.8, 'md_pakar' => 0.0]);
        Rule::create(['kode_penyakit' => 'P05', 'kode_gejala' => 'G20', 'cf_pakar' => 0.3, 'mb_pakar' => 0.4, 'md_pakar' => 0.1]);
        Rule::create(['kode_penyakit' => 'P05', 'kode_gejala' => 'G21', 'cf_pakar' => 0.3, 'mb_pakar' => 0.4, 'md_pakar' => 0.1]);
        Rule::create(['kode_penyakit' => 'P05', 'kode_gejala' => 'G25', 'cf_pakar' => 0.7, 'mb_pakar' => 0.8, 'md_pakar' => 0.1]);

        Rule::create(['kode_penyakit' => 'P06', 'kode_gejala' => 'G02', 'cf_pakar' => 0.4, 'mb_pakar' => 0.5, 'md_pakar' => 0.1]);
        Rule::create(['kode_penyakit' => 'P06', 'kode_gejala' => 'G04', 'cf_pakar' => 0.4, 'mb_pakar' => 0.5, 'md_pakar' => 0.1]);
        Rule::create(['kode_penyakit' => 'P06', 'kode_gejala' => 'G13', 'cf_pakar' => 0.5, 'mb_pakar' => 0.6, 'md_pakar' => 0.1]);
        Rule::create(['kode_penyakit' => 'P06', 'kode_gejala' => 'G17', 'cf_pakar' => 0.5, 'mb_pakar' => 0.6, 'md_pakar' => 0.1]);
        Rule::create(['kode_penyakit' => 'P06', 'kode_gejala' => 'G22', 'cf_pakar' => 0.3, 'mb_pakar' => 0.4, 'md_pakar' => 0.1]);
        Rule::create(['kode_penyakit' => 'P06', 'kode_gejala' => 'G23', 'cf_pakar' => 0.7, 'mb_pakar' => 0.8, 'md_pakar' => 0.1]);
        Rule::create(['kode_penyakit' => 'P06', 'kode_gejala' => 'G24', 'cf_pakar' => 0.6, 'mb_pakar' => 0.7, 'md_pakar' => 0.1]);

        Rule::create(['kode_penyakit' => 'P07', 'kode_gejala' => 'G05', 'cf_pakar' => 0.5, 'mb_pakar' => 0.6, 'md_pakar' => 0.1]);
        Rule::create(['kode_penyakit' => 'P07', 'kode_gejala' => 'G17', 'cf_pakar' => 0.6, 'mb_pakar' => 0.6, 'md_pakar' => 0.0]);
        Rule::create(['kode_penyakit' => 'P07', 'kode_gejala' => 'G26', 'cf_pakar' => 0.7, 'mb_pakar' => 0.7, 'md_pakar' => 0.0]);
        Rule::create(['kode_penyakit' => 'P07', 'kode_gejala' => 'G27', 'cf_pakar' => 0.8, 'mb_pakar' => 0.8, 'md_pakar' => 0.0]);
        Rule::create(['kode_penyakit' => 'P07', 'kode_gejala' => 'G28', 'cf_pakar' => 1.0, 'mb_pakar' => 1.0, 'md_pakar' => 0.0]);

        Rule::create(['kode_penyakit' => 'P08', 'kode_gejala' => 'G17', 'cf_pakar' => 0.6, 'mb_pakar' => 0.6, 'md_pakar' => 0.0]);
        Rule::create(['kode_penyakit' => 'P08', 'kode_gejala' => 'G26', 'cf_pakar' => 0.8, 'mb_pakar' => 0.8, 'md_pakar' => 0.0]);
        Rule::create(['kode_penyakit' => 'P08', 'kode_gejala' => 'G29', 'cf_pakar' => 0.8, 'mb_pakar' => 0.8, 'md_pakar' => 0.0]);

        Rule::create(['kode_penyakit' => 'P09', 'kode_gejala' => 'G17', 'cf_pakar' => 0.5, 'mb_pakar' => 0.6, 'md_pakar' => 0.1]);
        Rule::create(['kode_penyakit' => 'P09', 'kode_gejala' => 'G18', 'cf_pakar' => 0.5, 'mb_pakar' => 0.6, 'md_pakar' => 0.1]);
        Rule::create(['kode_penyakit' => 'P09', 'kode_gejala' => 'G26', 'cf_pakar' => 0.7, 'mb_pakar' => 0.7, 'md_pakar' => 0.0]);
        Rule::create(['kode_penyakit' => 'P09', 'kode_gejala' => 'G30', 'cf_pakar' => 1.0, 'mb_pakar' => 1.0, 'md_pakar' => 0.0]);

        Rule::create(['kode_penyakit' => 'P10', 'kode_gejala' => 'G18', 'cf_pakar' => 0.6, 'mb_pakar' => 0.6, 'md_pakar' => 0.0]);
        Rule::create(['kode_penyakit' => 'P10', 'kode_gejala' => 'G25', 'cf_pakar' => 0.7, 'mb_pakar' => 0.7, 'md_pakar' => 0.0]);
        Rule::create(['kode_penyakit' => 'P10', 'kode_gejala' => 'G31', 'cf_pakar' => 0.9, 'mb_pakar' => 0.9, 'md_pakar' => 0.0]);
        Rule::create(['kode_penyakit' => 'P10', 'kode_gejala' => 'G32', 'cf_pakar' => 0.6, 'mb_pakar' => 0.6, 'md_pakar' => 0.0]);

        Rule::create(['kode_penyakit' => 'P11', 'kode_gejala' => 'G06', 'cf_pakar' => 0.9, 'mb_pakar' => 0.9, 'md_pakar' => 0.0]);
        Rule::create(['kode_penyakit' => 'P11', 'kode_gejala' => 'G17', 'cf_pakar' => 0.5, 'mb_pakar' => 0.5, 'md_pakar' => 0.0]);
        Rule::create(['kode_penyakit' => 'P11', 'kode_gejala' => 'G18', 'cf_pakar' => 0.7, 'mb_pakar' => 0.7, 'md_pakar' => 0.0]);
        Rule::create(['kode_penyakit' => 'P11', 'kode_gejala' => 'G33', 'cf_pakar' => 0.9, 'mb_pakar' => 0.9, 'md_pakar' => 0.0]);
        Rule::create(['kode_penyakit' => 'P11', 'kode_gejala' => 'G34', 'cf_pakar' => 0.6, 'mb_pakar' => 0.6, 'md_pakar' => 0.0]);
        Rule::create(['kode_penyakit' => 'P11', 'kode_gejala' => 'G35', 'cf_pakar' => 0.6, 'mb_pakar' => 0.6, 'md_pakar' => 0.0]);
    }
}
