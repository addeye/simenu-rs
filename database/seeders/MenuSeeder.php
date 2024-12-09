<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menus = [
            ['nama' => 'BILLING SIMRS', 'gambar' => 'upload/si3UmSqI2lXKYdR78759xz24pDXa5X7CRrPxkoA5.png', 'link' => 'http://simrs.rsudpacitan.go.id/', 'urutan' => 4],
            ['nama' => 'Farmasi', 'gambar' => 'upload/KqVEVVbaKFR3mqGGphWof1xzK7hxnzQ8gxtIhEy2.png', 'link' => 'http://rsudpacitan.go.id/farmasi', 'urutan' => 5],
            ['nama' => 'E-Klaim', 'gambar' => 'upload/c0afime5FnIr5pYvRooOnTTAQH40g4elOWg9rWtZ.png', 'link' => 'http://inacbg.rsudpacitan.go.id/', 'urutan' => 6],
            ['nama' => 'Jasa Medis', 'gambar' => 'upload/ydax53o4E9VFZEcjDh1bGXDSAmJof9mH0JJGDqeb.png', 'link' => 'http://jasa.rsudpacitan.go.id/', 'urutan' => 7],
            ['nama' => 'Pendapatan', 'gambar' => 'upload/Wil9W9F6gWpwORYfj2jofihC6SFVeqmYOmLtcKHd.png', 'link' => 'http://rsudpacitan.go.id/pendapatan', 'urutan' => 8],
            ['nama' => 'Gudang', 'gambar' => 'upload/2hlWsFTtbI4QqevZPlPCHCJmVzQPfJU3pfLLEc55.png', 'link' => 'http://rsudpacitan.go.id/gudang', 'urutan' => 9],
            ['nama' => 'Pengadaan', 'gambar' => 'upload/1ONqOQhInaXpkUuzGj3VdMmsE2Waca19Uaw3dn5c.png', 'link' => 'http://rsudpacitan.go.id/pengadaan', 'urutan' => 10],
            ['nama' => 'SINAKES-RS', 'gambar' => 'upload/EfyAgaLvwOH37N0DetdwxjGHVWEUySKwHLiJ7xXH.png', 'link' => 'http://rsudpacitan.go.id/kepegawaian', 'urutan' => 11],
            ['nama' => 'Testing', 'gambar' => 'upload/Ny6ENdJD0iIYgOvaNgo1TPJaUkc73kuVWRywodT1.png', 'link' => 'https://darsono.myds.me/file/', 'urutan' => 1],
            ['nama' => 'Indikator RS', 'gambar' => 'upload/haf5SSjgoqZqiyFDnOlzgwJYJGnQbHjAabsjuZpY.png', 'link' => 'http://indikator.rsudpacitan.go.id/', 'urutan' => 12],
            ['nama' => 'Komite Medis', 'gambar' => 'upload/DPAEVB4Z2nPlmRWrCZPChiX1xlcIc7mQ5VoWXwvS.png', 'link' => 'http://rsudpacitan.go.id/komite', 'urutan' => 13],
            ['nama' => 'SITB', 'gambar' => 'upload/9JfV5OejUsoSgYdknaa3RorPNt6u5XneN86Q98rd.png', 'link' => 'http://sitb.id/sitb/app', 'urutan' => 14],
            ['nama' => 'SIHA', 'gambar' => 'upload/CjI1xmp1DICk2WndIilXdoVatDgJfAJQRoWDNwqS.png', 'link' => 'http://rsudpacitan.go.id/siha', 'urutan' => 15],
            ['nama' => 'Advokasi', 'gambar' => 'upload/yvZDx8lsjNDcCGuvRblD0zC1nn4592cvkz6k8Hav.png', 'link' => 'http://rsudpacitan.go.id/advokasi', 'urutan' => 16],
            ['nama' => 'Akuntansi', 'gambar' => 'upload/RjIz0ezUhOTQ7LpJ2xoAapmfXAh5DonuSGjFRlED.png', 'link' => 'http://rsudpacitan.go.id/akuntansi_blud', 'urutan' => 17],
            ['nama' => 'EKOHORT', 'gambar' => 'upload/EFTuaK1QU2I0UlTlrFkQEx07iHsnClTTwPGEOq3r.png', 'link' => 'https://ekohort.kemkes.go.id/', 'urutan' => 18],
            ['nama' => 'SIPP', 'gambar' => 'upload/HMYiSY2iRpRFSCL3cA7zqso0qqa8yfzHdYswzokp.jpg', 'link' => 'https://sipp.bpjs-kesehatan.go.id/sipp/#/app/dashboardadmin', 'urutan' => 19],
            ['nama' => 'Gizi', 'gambar' => 'upload/WNYDmocYUOQMmz3M5EJMhWVbLBJtQQGJT6SXMla5.png', 'link' => 'http://rsudpacitan.go.id/gizi', 'urutan' => 20],
            ['nama' => 'SISMADAK', 'gambar' => 'upload/T0CHx5zTxaLOTM9MxKH39gObd5ERNA7f6mRr8GtR.png', 'link' => 'http://sismadak.rsudpacitan.go.id/', 'urutan' => 21],
            ['nama' => 'SIDOKARS', 'gambar' => 'upload/8tnetFq76tjC8oMs9yruJgBIcuIpnYz3FnSksabk.png', 'link' => 'http://sidokar.rsudpacitan.go.id/', 'urutan' => 22],
            ['nama' => 'SISRUTE', 'gambar' => 'upload/ZopxVMVgmZcdCbs8l2VeK3iZwkMH5aka0BPmd7mq.png', 'link' => 'https://sisrute.kemkes.go.id/', 'urutan' => 23],
            ['nama' => 'DATA RSUD', 'gambar' => 'upload/g4uFsWUAiMqDmK2eGvuJYu8Hpqho5hM3jD7bFFLX.png', 'link' => 'https://darsono.myds.me/file/', 'urutan' => 24],
            ['nama' => 'BPJS KT', 'gambar' => 'upload/uS1Qm9zNWNris3YXE0EeFtSh8U3XXfiezHbK5i8Q.png', 'link' => 'http://plkk.bpjsketenagakerjaan.go.id/', 'urutan' => 3],
            ['nama' => 'ADMEDIKA', 'gambar' => 'upload/iEazi98eK2nZiWeO1QpxKZ1XY2GHnQIbd2iiyhjR.png', 'link' => 'https://mobile.admedika.co.id/edc/#', 'urutan' => 25],
            ['nama' => 'SIM-KEPK', 'gambar' => 'upload/D7tddjRmPbFM6U9fdxtb1oKgGE7b0sql4sK7EY7A.png', 'link' => 'http://simepk.rsdarsono.id/kepk/', 'urutan' => 26],
            ['nama' => 'Testing', 'gambar' => 'upload/txpuDkFYY3wC9SIsh50XeShE82JpHSSDc6R34KdL.png', 'link' => 'https://darsono.myds.me/file/', 'urutan' => 2]
        ];

        DB::table('menus')->insert($menus);
    }
}
