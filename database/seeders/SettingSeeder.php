<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create(['key' => 'header_background_url', 'value' => '']);
        Setting::create(['key' => 'location', 'value' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.652932174733!2d117.15012201542001!3d-0.5216927354187605!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2df67f93fc6a90bb%3A0x6b206598b103ec0c!2sKampung%20Ketupat!5e0!3m2!1sid!2sid!4v1659330964343!5m2!1sid!2sid']);
        
        Setting::create(['key' => 'about', 'value' => 'Kampung Ketupat merupakan kampung destinasi wisata yang ada di kota Samarinda.']);
        Setting::create(['key' => 'address', 'value' => 'Jl. Mangkupalas, Mesjid, Kec. Samarinda Seberang, Kota Samarinda, Kalimantan Timur 75251']);
        Setting::create(['key' => 'email', 'value' => 'kampungketupat@gmail.com']);
        Setting::create(['key' => 'phone', 'value' => '123456']);

        Setting::create(['key' => 'facebook', 'value' => '']);
        Setting::create(['key' => 'twitter', 'value' => '']);
        Setting::create(['key' => 'instagram', 'value' => '']);
        Setting::create(['key' => 'youtube', 'value' => '']);
    }
}
