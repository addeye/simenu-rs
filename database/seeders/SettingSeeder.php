<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert(
            [
                "nama" => "RSUD dr DARSONO KABUPATEN PACITAN",
                "intro" => "Selamat Datang di Sistem Informasi Rumah Sakit, Silahkan Pilih Modul di Bawah ini.",
                "footer" => "Copyright © 2016 Rumah Sakit Umum Daerah dr DARSONO Kabupaten Pacitan",
                "logo" => "",
            ]
        );
    }
}
