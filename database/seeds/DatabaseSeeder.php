<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $vincentia = App\Models\User::create([
            'name' => 'Vincentia Dyah K',
            'longname' => 'Vincentia Dyah K',
            'email' => 'vincentia@gmail.com',
            'password' => bcrypt('11111111'),
        ]);

        $majalah = App\Models\Type::create([
            'title' => 'Majalah',
            'user_id' => $vincentia->id
        ]);

        $surat = App\Models\Type::create([
            'title' => 'Surat Kabar',
            'user_id' => $vincentia->id
        ]);

        $tahunan = App\Models\Time::create([
            'title' => 'Tahunan',
            'user_id' => $vincentia->id
        ]);

        $bulanan = App\Models\Time::create([
            'title' => 'Bulanan',
            'user_id' => $vincentia->id
        ]);

        $indo = App\Models\Language::create([
            'title' => 'Indonesia',
            'user_id' => $vincentia->id
        ]);

        $eng = App\Models\Language::create([
            'title' => 'English',
            'user_id' => $vincentia->id
        ]);

        $cetak = App\Models\Format::create([
            'title' => 'Cetak',
            'user_id' => $vincentia->id
        ]);

        $digital = App\Models\Format::create([
            'title' => 'Digital',
            'user_id' => $vincentia->id
        ]);

        $mikro = App\Models\Format::create([
            'title' => 'Bentuk Mikro',
            'user_id' => $vincentia->id
        ]);

        $dapat = App\Models\Status::create([
            'title' => 'Dapat Digunakan',
            'user_id' => $vincentia->id
        ]);

        $tidak = App\Models\Status::create([
            'title' => 'Tidak Dapat Digunakan',
            'user_id' => $vincentia->id
        ]);

        $tempo = App\Models\Title::create([
            'title' => 'tempo',
            'kode' => '1',
            'slug' => 'tempo',
            'city' => 'jakarta',
            'publisher' => 'Tempo Media Group',
            'year' => '1971',
            'first_year' => '1971',
            'featured_img' => 'tempo.jpg',
            'updated_by' => $vincentia->id,
            'user_id' => $vincentia->id
        ]);

        $tempo->types()->attach($majalah->id);
        $tempo->times()->attach($tahunan->id);
        $tempo->languages()->attach($indo->id);
        $tempo->formats()->attach($cetak->id);

        $edisi = App\Models\EditionTitle::create([
            'title_id' => $tempo->id,
            'edition_code' => '1',
            'edition_year' => '2019',
            'edition_title' => 'Ambyar',
            'slug' => 'ambyar',
            'volume' => '1',
            'chapter' => '1',
            'edition_no' => '1',
            'publish_date' => '23',
            'publish_month' => '12',
            'publish_year' => '2019',
            'original_date' => '23-12-2019',
            'call_number' => '1',
            'edition_image' => 'ambyar.jpg',
            'updated_by' => $vincentia->id,
            'user_id' => $vincentia->id
        ]);

        $artikel = App\Models\ArticleEdition::create([
            'user_id' => $vincentia->id,
            'edition_title_id' => $edisi->id,
            'article_title' => 'Musim libur pemberantasan korupsi',
            'subject' => 'Berita',
            'writer' => 'Linda Trianita',
            'pages' => '1',
            'column' => '1',
            'source' => 'majalah.tempo.co',
            'desc' => 'Kinerja Komisi Pemberantasan Korupsi mengendur sejak Undang-Undang KPK hasil revisi berlaku pada 17 Oktober lalu. Dalam dua bulan terakhir, operasi tangkap tangan nihil',
            'keyword' => 'KPK, Undang-Undang',
            'detail_img' => '',
            'updated_by' => $vincentia->id
        ]);

        $artikel->statuses()->attach($dapat->id);

    }
}
