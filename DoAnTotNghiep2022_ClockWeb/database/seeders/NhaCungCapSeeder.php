<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NhaCungCapSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('nha_cung_caps')->insert([
            ['TenNhaCungCap'=>'Công ty ABC',
             'DiaChi'=>'Tp HCM',
             'SDT'=>'028873761',
             'TrangThai'=>1
            ],
            ['TenNhaCungCap'=>'Công ty Á Châu',
             'DiaChi'=>'Tp HCM',
             'SDT'=>'0827326287',
             'TrangThai'=>1
            ],
            ['TenNhaCungCap'=>'Công ty Đông Âu',
             'DiaChi'=>'Hà Nội',
             'SDT'=>'0372872824',
             'TrangThai'=>1
            ],
        ]);
    }
}
