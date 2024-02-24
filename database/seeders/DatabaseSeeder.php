<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'role' => 'admin',
            'password' => bcrypt('123'),
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Mentor 1',
            'email' => 'mentor@gmail.com',
            'role' => 'mentor',
            'password' => bcrypt('123'),
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Mentor 2',
            'email' => 'mentor2@gmail.com',
            'role' => 'mentor',
            'password' => bcrypt('123'),
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Pegawai',
            'email' => 'pegawai@gmail.com',
            'role' => 'pegawai',
            'password' => bcrypt('123'),
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Umum',
            'email' => 'umum@gmail.com',
            'role' => 'umum',
            'password' => bcrypt('123'),
        ]);

        \App\Models\Kategori::factory()->create([
            'nama' => 'Pelatihan/Pengembangan Kompetensi Bidang Teknis'
        ]);

        \App\Models\Kategori::factory()->create([
            'nama' => 'Pelatihan/Pengembangan Kompetensi Bidang Manajemen'
        ]);

        \App\Models\Kategori::factory()->create([
            'nama' => 'Pelatihan/Pengembangan Kompetensi Bidang Sosio Kultural'
        ]);

        \App\Models\Pelatihan::factory()->create([
            'nama' => 'Pelatihan Wajib Dasar, Manajemen Fasilitas, Keselamatan Dan Keamanan',
            'deskripsi' => 'Instalasi Gawat Darurat (IGD) merupakan gerbang utama bagi pasien untuk memperoleh askes penanganan gawat darurat di Rumah Sakit. Kemampuan Rumah Sakit dalam hal kualitas dan kesiapan sebagai tempat Pelayanan maupun sebagai pusat rujukan penderita dari prafasilitas pelayanaan kesehataan tercermin dari kemampuan IGD-nya. Penangan kegawatdaruratan di IGD mengacu pada kemampuan Pelayanan, sumber daya manusia, sarana, prasarana, obat dan bahan medis habis pakai, dan alat kesehatan yang tersedia di Rumah sakit sesuai Permenkes No.47 tahun 2018 tentang Pelayanan Kegawatdaruratan. Pelahan Dasar Manajemen Instaalasi Gawat Darurat bagi Tenagaa Kesehatan di Rumah Sakit diselenggarakaan dengan tujuan untuk meningkatkan kompetensi peserta agar mampu melakukan pengelolan IGD Rumah sakit sesuai standar.',
            'kategori_id' => 1,
            'image_url' => Storage::url('images/patient.jpg'),
            'modul_pelatihan' => Storage::url('file/test.pdf'),
        ]);

        \App\Models\Pelatihan::factory()->create([
            'nama' => 'Resertifikasi Basic Trauma Cardiac Life Support',
            'deskripsi' => 'Instalasi Gawat Darurat (IGD) merupakan gerbang utama bagi pasien untuk memperoleh askes penanganan gawat darurat di Rumah Sakit. Kemampuan Rumah Sakit dalam hal kualitas dan kesiapan sebagai tempat Pelayanan maupun sebagai pusat rujukan penderita dari prafasilitas pelayanaan kesehataan tercermin dari kemampuan IGD-nya. Penangan kegawatdaruratan di IGD mengacu pada kemampuan Pelayanan, sumber daya manusia, sarana, prasarana, obat dan bahan medis habis pakai, dan alat kesehatan yang tersedia di Rumah sakit sesuai Permenkes No.47 tahun 2018 tentang Pelayanan Kegawatdaruratan. Pelahan Dasar Manajemen Instaalasi Gawat Darurat bagi Tenagaa Kesehatan di Rumah Sakit diselenggarakaan dengan tujuan untuk meningkatkan kompetensi peserta agar mampu melakukan pengelolan IGD Rumah sakit sesuai standar.',
            'kategori_id' => 1,
            'image_url' => Storage::url('images/patient.jpg'),
            'modul_pelatihan' => Storage::url('file/test.pdf'),
        ]);

        \App\Models\Pelatihan::factory()->create([
            'nama' => 'Pelatihan Dasar Manajemen Instalasi Gawat Darurat bagi Tenaga Kesehatan di Rumah Sakit Penjelasan',
            'deskripsi' => 'Instalasi Gawat Darurat (IGD) merupakan gerbang utama bagi pasien untuk memperoleh askes penanganan gawat darurat di Rumah Sakit. Kemampuan Rumah Sakit dalam hal kualitas dan kesiapan sebagai tempat Pelayanan maupun sebagai pusat rujukan penderita dari prafasilitas pelayanaan kesehataan tercermin dari kemampuan IGD-nya. Penangan kegawatdaruratan di IGD mengacu pada kemampuan Pelayanan, sumber daya manusia, sarana, prasarana, obat dan bahan medis habis pakai, dan alat kesehatan yang tersedia di Rumah sakit sesuai Permenkes No.47 tahun 2018 tentang Pelayanan Kegawatdaruratan. Pelahan Dasar Manajemen Instaalasi Gawat Darurat bagi Tenagaa Kesehatan di Rumah Sakit diselenggarakaan dengan tujuan untuk meningkatkan kompetensi peserta agar mampu melakukan pengelolan IGD Rumah sakit sesuai standar.',
            'kategori_id' => 2,
            'image_url' => Storage::url('images/patient.jpg'),
            'modul_pelatihan' => Storage::url('file/test.pdf'),
        ]);

        \App\Models\Pelatihan::factory()->create([
            'nama' => 'Pelatihan Manajemen Risiko Fasilitas dan Keselamatan Rumah Sakit (Pelatihan K3RS Lanjutan)',
            'deskripsi' => 'Dalam rangka menciptakan fasilitas pelayanan kesehatan yang aman, fungsional dan supporf bagi pasien, tenaga kerja, keluarga pasien, peserta didik, dan pengunjung di lingkungan rumah sakit dak dapat lepas dari risiko-risiko yang dapat berpengaruh terhadap tujuan rumah sakit. Risikotersebut semakin meningkat sehubungan dengan semakin kompleksnyapelayanan kesehatan serta penggunaan teknologi nggi. Risiko¬risiko tersebut dak mungkin dihindari, tetapi harus dikelola melalui suatu mekanisme yang dinamakan "Manajemen Risiko". Rumah sakit dianggap mampu mengendalikan risiko tersebut jika memiliki kemampuan sensif untuk mendeteksi risiko, memiliki fleksibilitas untuk merespon risiko dan menjamin kapabilitas sumber daya untuk melakukan ndakan guna mengurangi ngkat risiko agar dak terjadi pemborosan sumber dana dan waktu serta dak tercapainya tujuan perusahaan.',
            'kategori_id' => 2,
            'image_url' => Storage::url('images/patient.jpg'),
            'modul_pelatihan' => Storage::url('file/test.pdf'),
        ]);

        \App\Models\Pelatihan::factory()->create([
            'nama' => 'Pelatihan Remunerasi di Rumah Sakit',
            'deskripsi' => 'Perubahan kebijakan atas sistem penjaminan terutama Jaminan Kesehatan Nasional (JKN), dan merupakan reformasi pembiayaan kesehatan dari yang sebelumnya berupa sistem fee for service menjadi sistem paket. Dengan adanya perubahan ini, banyak masalah mbul dalam pelaksanaan tersebut mulai dari masalah teknis hingga masalah mind-set. Tiga komponen dalam sistem remunerasi, yaitu pay-for-posion, pay-for-performance dan pay-forpeople. Batang tubuh dari sistem ini terdiri dari grade dan kelompok jabatan. Jadi dak ada lagi islah jasa pelayanan, jasa medis, jasa obat dan sebagainya',
            'kategori_id' => 2,
            'image_url' => Storage::url('images/patient.jpg'),
            'modul_pelatihan' => Storage::url('file/test.pdf'),
        ]);
    }
}
