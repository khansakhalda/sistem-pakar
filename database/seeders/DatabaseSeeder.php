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
        Role::firstOrCreate(['name' => 'admin']);
        Role::firstOrCreate(['name' => 'user']);

        $admin = User::firstOrCreate([
            'name' => 'admin',
            'age' => '20',
            'number' => '085731013100',
            'email' => 'khansakhalda1604@gmail.com',
            'address' => 'Kediri',
            'email_verified_at' => now(),
            'password' => Hash::make('adminkhansa1'),
            'remember_token' => Str::random(10),
        ]);

        $user = User::firstOrCreate([
            'name' => 'user',
            'age' => '20',
            'number' => '085731013101',
            'email' => 'khansa.khalda@mhs.unsoed.ac.id',
            'address' => 'Kediri',
            'email_verified_at' => now(),
            'password' => Hash::make('userkhansa1'),
            'remember_token' => Str::random(10),
        ]);

        // Register Role  & Permission to Users
        if (!$admin->hasRole('admin')) {
    $admin->assignRole('admin');
}
if (!$user->hasRole('user')) {
    $user->assignRole('user');
}

        Desease::create([
    'nama_penyakit' => 'Demam Berdarah Dengue (DBD)',
    'detail_penyakit' => 'Demam Berdarah Dengue (DBD) adalah penyakit infeksi virus yang disebabkan oleh virus dengue yang masuk ke dalam tubuh manusia melalui gigitan nyamuk Aedes aegypti atau Aedes albopictus. Virus ini menyerang pembuluh darah dan sistem kekebalan tubuh, sehingga menyebabkan kebocoran pembuluh darah kapiler dan penurunan jumlah trombosit secara drastis. Proses infeksi dimulai ketika nyamuk yang telah menghisap darah seseorang yang terinfeksi virus dengue menggigit orang lain, lalu menyebarkan virus tersebut ke dalam aliran darah. Penyakit ini berkembang cepat dan dapat menyebabkan komplikasi serius seperti syok dan perdarahan internal jika tidak ditangani dengan cepat.',
]);

Desease::create([
    'nama_penyakit' => 'Malaria',
    'detail_penyakit' => 'Malaria adalah penyakit menular yang disebabkan oleh parasit Plasmodium, yang ditularkan ke manusia melalui gigitan nyamuk Anopheles betina yang terinfeksi. Parasit ini masuk ke dalam aliran darah dan kemudian menyerang sel-sel hati untuk berkembang biak sebelum kembali ke aliran darah dan menginfeksi sel darah merah. Siklus infeksi ini menyebabkan gejala demam yang muncul secara berkala, bersamaan dengan menggigil, keringat berlebih, dan kelelahan. Parasit malaria merusak sel darah merah sehingga dapat menyebabkan anemia berat dan komplikasi berbahaya pada organ-organ vital.',
]);

Desease::create([
    'nama_penyakit' => 'Chikungunya',
    'detail_penyakit' => 'Chikungunya merupakan penyakit virus yang ditularkan ke manusia melalui gigitan nyamuk Aedes aegypti atau Aedes albopictus yang terinfeksi virus chikungunya. Setelah virus masuk ke dalam tubuh, sistem kekebalan tubuh merespons dengan peradangan yang menyebabkan demam tinggi dan nyeri sendi parah, terutama pada tangan, kaki, dan pergelangan. Virus ini menyerang jaringan sendi dan otot sehingga menyebabkan pembengkakan dan kekakuan yang bisa berlangsung berminggu-minggu atau bahkan berbulan-bulan. Meskipun tidak menyebabkan kematian, chikungunya dapat sangat mengganggu aktivitas sehari-hari.',
]);

Desease::create([
    'nama_penyakit' => 'Encephalitis',
    'detail_penyakit' => 'Encephalitis atau radang otak adalah kondisi peradangan pada jaringan otak yang disebabkan oleh infeksi virus, salah satunya adalah virus ensefalitis Jepang. Virus ini ditularkan oleh nyamuk Culex yang telah membawa virus dari hewan perantara seperti babi atau burung. Setelah masuk ke dalam tubuh manusia melalui gigitan nyamuk, virus menyebar melalui aliran darah dan menyerang sistem saraf pusat, terutama otak. Hal ini menimbulkan gejala yang sangat serius seperti kejang, kebingungan, kehilangan kesadaran, dan bahkan koma. Encephalitis merupakan kondisi yang berpotensi fatal dan memerlukan penanganan medis intensif.',
]);

Desease::create([
    'nama_penyakit' => 'Zika',
    'detail_penyakit' => 'Zika adalah penyakit yang disebabkan oleh virus Zika yang ditularkan melalui gigitan nyamuk Aedes aegypti. Setelah memasuki tubuh manusia, virus ini menyebar melalui darah dan memicu respons imun yang menyebabkan demam ringan, ruam, nyeri otot, dan konjungtivitis. Zika juga memiliki kemampuan menembus sawar darah-otak dan plasenta, sehingga berisiko tinggi bagi ibu hamil karena dapat menginfeksi janin. Infeksi Zika pada kehamilan awal dapat menyebabkan mikrosefali, yaitu kelainan perkembangan otak pada bayi yang menyebabkan ukuran kepala lebih kecil dari normal.',
]);

Desease::create([
    'nama_penyakit' => 'Filariasis',
    'detail_penyakit' => 'Filariasis, atau yang lebih dikenal dengan sebutan kaki gajah, merupakan penyakit parasit kronis yang disebabkan oleh cacing filaria seperti Wuchereria bancrofti. Parasit ini masuk ke dalam tubuh manusia melalui gigitan nyamuk yang membawa larva cacing tersebut. Setelah masuk ke dalam tubuh, larva berkembang dan menetap di saluran limfatik (getah bening), menyebabkan penyumbatan dan peradangan kronis. Akibatnya, bagian tubuh seperti kaki, lengan, atau alat kelamin mengalami pembengkakan ekstrem yang berlangsung lama dan bersifat progresif. Penyakit ini bersifat menahun dan dapat menyebabkan disabilitas permanen jika tidak ditangani.',
]);

Desease::create([
    'nama_penyakit' => 'Demam Kuning',
    'detail_penyakit' => 'Demam Kuning adalah penyakit virus akut yang disebabkan oleh virus demam kuning dan ditularkan ke manusia melalui gigitan nyamuk Aedes aegypti yang terinfeksi. Virus ini menyerang sel-sel hati, ginjal, dan jantung, sehingga menyebabkan kerusakan organ dan gangguan fungsi sistem tubuh. Setelah infeksi, penderita akan mengalami gejala awal seperti demam, nyeri otot, dan mual, kemudian memasuki fase toksik yang lebih serius seperti penyakit kuning (ikterus), perdarahan, dan kerusakan organ. Infeksi berat dari demam kuning dapat berakibat fatal jika tidak segera mendapatkan penanganan medis.',
]);

Indication::create(['nama_gejala' => 'Demam']);
Indication::create(['nama_gejala' => 'Sakit kepala']);
Indication::create(['nama_gejala' => 'Lemas dan lelah']);
Indication::create(['nama_gejala' => 'Nafsu makan menurun']);
Indication::create(['nama_gejala' => 'Mual dan muntah']);
Indication::create(['nama_gejala' => 'Tubuh merasa dingin']);
Indication::create(['nama_gejala' => 'Bintik merah pada kulit']);
Indication::create(['nama_gejala' => 'Seluruh tubuh terasa sakit']);
Indication::create(['nama_gejala' => 'Tubuh pegal linu']);
Indication::create(['nama_gejala' => 'Sendi bengkak']);
Indication::create(['nama_gejala' => 'Sakit tenggorokan saat menelan']);
Indication::create(['nama_gejala' => 'Sakit perut']);
Indication::create(['nama_gejala' => 'Otot terasa sakit dan kaku saat disentuh']);
Indication::create(['nama_gejala' => 'Stamina menurun']);
Indication::create(['nama_gejala' => 'Denyut nadi terasa lemah']);
Indication::create(['nama_gejala' => 'Sendi terasa nyeri terutama saat digerakkan']);
Indication::create(['nama_gejala' => 'Leher dan punggung terasa kaku']);
Indication::create(['nama_gejala' => 'Mengantuk']);
Indication::create(['nama_gejala' => 'Mudah terangsang kejang atau kaku']);
Indication::create(['nama_gejala' => 'Mata merah']);
Indication::create(['nama_gejala' => 'Ruam kulit']);
Indication::create(['nama_gejala' => 'Nyeri dan pembengkakan pada area kelenjar getah bening']);

Rule::create(['kode_penyakit' => 'P01', 'kode_gejala' => 'G01', 'cf_pakar' => 1.0, 'mb_pakar' => 1.0, 'md_pakar' => 0.0]);
Rule::create(['kode_penyakit' => 'P01', 'kode_gejala' => 'G02', 'cf_pakar' => 0.6, 'mb_pakar' => 0.7, 'md_pakar' => 0.1]);
Rule::create(['kode_penyakit' => 'P01', 'kode_gejala' => 'G03', 'cf_pakar' => 0.6, 'mb_pakar' => 0.7, 'md_pakar' => 0.1]);
Rule::create(['kode_penyakit' => 'P01', 'kode_gejala' => 'G06', 'cf_pakar' => 0.6, 'mb_pakar' => 0.7, 'md_pakar' => 0.1]);
Rule::create(['kode_penyakit' => 'P01', 'kode_gejala' => 'G07', 'cf_pakar' => 0.4, 'mb_pakar' => 0.4, 'md_pakar' => 0.0]);
Rule::create(['kode_penyakit' => 'P01', 'kode_gejala' => 'G08', 'cf_pakar' => 1.0, 'mb_pakar' => 1.0, 'md_pakar' => 0.0]);
Rule::create(['kode_penyakit' => 'P01', 'kode_gejala' => 'G11', 'cf_pakar' => 0.0, 'mb_pakar' => 0.0, 'md_pakar' => 0.0]);

Rule::create(['kode_penyakit' => 'P02', 'kode_gejala' => 'G01', 'cf_pakar' => 1.0, 'mb_pakar' => 1.0, 'md_pakar' => 0.0]);
Rule::create(['kode_penyakit' => 'P02', 'kode_gejala' => 'G02', 'cf_pakar' => 1.0, 'mb_pakar' => 1.0, 'md_pakar' => 0.0]);
Rule::create(['kode_penyakit' => 'P02', 'kode_gejala' => 'G03', 'cf_pakar' => 0.5, 'mb_pakar' => 0.5, 'md_pakar' => 0.0]);
Rule::create(['kode_penyakit' => 'P02', 'kode_gejala' => 'G05', 'cf_pakar' => 0.6, 'mb_pakar' => 0.7, 'md_pakar' => 0.1]);
Rule::create(['kode_penyakit' => 'P02', 'kode_gejala' => 'G06', 'cf_pakar' => 1.0, 'mb_pakar' => 1.0, 'md_pakar' => 0.0]);
Rule::create(['kode_penyakit' => 'P02', 'kode_gejala' => 'G16', 'cf_pakar' => 0.1, 'mb_pakar' => 0.1, 'md_pakar' => 0.0]);

Rule::create(['kode_penyakit' => 'P03', 'kode_gejala' => 'G01', 'cf_pakar' => 0.6, 'mb_pakar' => 0.7, 'md_pakar' => 0.1]);
Rule::create(['kode_penyakit' => 'P03', 'kode_gejala' => 'G04', 'cf_pakar' => 0.1, 'mb_pakar' => 0.1, 'md_pakar' => 0.0]);
Rule::create(['kode_penyakit' => 'P03', 'kode_gejala' => 'G09', 'cf_pakar' => 0.8, 'mb_pakar' => 0.9, 'md_pakar' => 0.1]);
Rule::create(['kode_penyakit' => 'P03', 'kode_gejala' => 'G10', 'cf_pakar' => 0.0, 'mb_pakar' => 0.0, 'md_pakar' => 0.0]);
Rule::create(['kode_penyakit' => 'P03', 'kode_gejala' => 'G14', 'cf_pakar' => 0.4, 'mb_pakar' => 0.4, 'md_pakar' => 0.0]);
Rule::create(['kode_penyakit' => 'P03', 'kode_gejala' => 'G15', 'cf_pakar' => 0.0, 'mb_pakar' => 0.0, 'md_pakar' => 0.0]);
Rule::create(['kode_penyakit' => 'P03', 'kode_gejala' => 'G16', 'cf_pakar' => 0.8, 'mb_pakar' => 0.9, 'md_pakar' => 0.1]);

Rule::create(['kode_penyakit' => 'P04', 'kode_gejala' => 'G01', 'cf_pakar' => 1.0, 'mb_pakar' => 1.0, 'md_pakar' => 0.0]);
Rule::create(['kode_penyakit' => 'P04', 'kode_gejala' => 'G02', 'cf_pakar' => 1.0, 'mb_pakar' => 1.0, 'md_pakar' => 0.0]);
Rule::create(['kode_penyakit' => 'P04', 'kode_gejala' => 'G05', 'cf_pakar' => 0.6, 'mb_pakar' => 0.7, 'md_pakar' => 0.1]);
Rule::create(['kode_penyakit' => 'P04', 'kode_gejala' => 'G16', 'cf_pakar' => 0.1, 'mb_pakar' => 0.1, 'md_pakar' => 0.0]);
Rule::create(['kode_penyakit' => 'P04', 'kode_gejala' => 'G17', 'cf_pakar' => 0.6, 'mb_pakar' => 0.7, 'md_pakar' => 0.1]);
Rule::create(['kode_penyakit' => 'P04', 'kode_gejala' => 'G18', 'cf_pakar' => 0.2, 'mb_pakar' => 0.2, 'md_pakar' => 0.0]);
Rule::create(['kode_penyakit' => 'P04', 'kode_gejala' => 'G19', 'cf_pakar' => 0.4, 'mb_pakar' => 0.4, 'md_pakar' => 0.0]);

Rule::create(['kode_penyakit' => 'P05', 'kode_gejala' => 'G01', 'cf_pakar' => 1.0, 'mb_pakar' => 1.0, 'md_pakar' => 0.0]);
Rule::create(['kode_penyakit' => 'P05', 'kode_gejala' => 'G02', 'cf_pakar' => 0.5, 'mb_pakar' => 0.6, 'md_pakar' => 0.1]);
Rule::create(['kode_penyakit' => 'P05', 'kode_gejala' => 'G03', 'cf_pakar' => 0.4, 'mb_pakar' => 0.5, 'md_pakar' => 0.1]);
Rule::create(['kode_penyakit' => 'P05', 'kode_gejala' => 'G12', 'cf_pakar' => 0.6, 'mb_pakar' => 0.7, 'md_pakar' => 0.1]);
Rule::create(['kode_penyakit' => 'P05', 'kode_gejala' => 'G13', 'cf_pakar' => 0.5, 'mb_pakar' => 0.6, 'md_pakar' => 0.1]);
Rule::create(['kode_penyakit' => 'P05', 'kode_gejala' => 'G16', 'cf_pakar' => 0.6, 'mb_pakar' => 0.6, 'md_pakar' => 0.0]);
Rule::create(['kode_penyakit' => 'P05', 'kode_gejala' => 'G20', 'cf_pakar' => 0.9, 'mb_pakar' => 0.9, 'md_pakar' => 0.0]);
Rule::create(['kode_penyakit' => 'P05', 'kode_gejala' => 'G21', 'cf_pakar' => 0.6, 'mb_pakar' => 0.7, 'md_pakar' => 0.1]);

Rule::create(['kode_penyakit' => 'P06', 'kode_gejala' => 'G01', 'cf_pakar' => 0.7, 'mb_pakar' => 0.7, 'md_pakar' => 0.0]);
Rule::create(['kode_penyakit' => 'P06', 'kode_gejala' => 'G02', 'cf_pakar' => 0.5, 'mb_pakar' => 0.6, 'md_pakar' => 0.1]);
Rule::create(['kode_penyakit' => 'P06', 'kode_gejala' => 'G03', 'cf_pakar' => 0.4, 'mb_pakar' => 0.5, 'md_pakar' => 0.1]);
Rule::create(['kode_penyakit' => 'P06', 'kode_gejala' => 'G13', 'cf_pakar' => 1.0, 'mb_pakar' => 1.0, 'md_pakar' => 0.0]);
Rule::create(['kode_penyakit' => 'P06', 'kode_gejala' => 'G16', 'cf_pakar' => 0.9, 'mb_pakar' => 0.9, 'md_pakar' => 0.0]);
Rule::create(['kode_penyakit' => 'P06', 'kode_gejala' => 'G21', 'cf_pakar' => 0.4, 'mb_pakar' => 0.5, 'md_pakar' => 0.1]);
Rule::create(['kode_penyakit' => 'P06', 'kode_gejala' => 'G22', 'cf_pakar' => 0.8, 'mb_pakar' => 0.8, 'md_pakar' => 0.0]);

Rule::create(['kode_penyakit' => 'P07', 'kode_gejala' => 'G01', 'cf_pakar' => 1.0, 'mb_pakar' => 1.0, 'md_pakar' => 0.0]);
Rule::create(['kode_penyakit' => 'P07', 'kode_gejala' => 'G02', 'cf_pakar' => 0.7, 'mb_pakar' => 0.7, 'md_pakar' => 0.0]);
Rule::create(['kode_penyakit' => 'P07', 'kode_gejala' => 'G04', 'cf_pakar' => 0.5, 'mb_pakar' => 0.6, 'md_pakar' => 0.1]);
Rule::create(['kode_penyakit' => 'P07', 'kode_gejala' => 'G05', 'cf_pakar' => 0.5, 'mb_pakar' => 0.6, 'md_pakar' => 0.1]);
Rule::create(['kode_penyakit' => 'P07', 'kode_gejala' => 'G06', 'cf_pakar' => 0.7, 'mb_pakar' => 0.7, 'md_pakar' => 0.0]);
Rule::create(['kode_penyakit' => 'P07', 'kode_gejala' => 'G13', 'cf_pakar' => 0.9, 'mb_pakar' => 0.9, 'md_pakar' => 0.0]);

    }
}
