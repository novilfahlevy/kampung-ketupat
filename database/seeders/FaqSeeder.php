<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Faq::create(['question' => 'Apa saja yang tersedia di kampung ketupat?', 'answer' => 'Selain ciri khas ketupatnya, terdapat spot yang bagus untuk berfoto dan beberapa makanan tradisional yang tersedia, juga ada acara yang diadakan guna meramaikan kampung ketupat, bahkan di hari minggu terdapat hiburan musik dan permainan tradisional.']);
        Faq::create(['question' => 'Bagaimana sejarah kampung ketupat?', 'answer' => 'Dinamai kampung ketupat karena keunikan masyarakatnya yang mempunyai kebiasaan membuat ketupat.']);
        Faq::create(['question' => 'Apakah pihak luar bisa bekerja sama dengan kampung ketupat?', 'answer' => 'Sudah banyak pihak-pihak yang bekerjasama dengan kampung ketupat, seperti ada yang ingin membuat acara dan juga banyak mahasiswa-mahasiswa yang melakukan kegiatan KKN, PKM, dan pengabdian masyarakat yang membuat fasilitas di kampung ketupat menjadi lebih bervariasi.']);
    }
}
