<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LoaiSanPhamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('loai_san_phams')->insert([
            ['TenLoaiSanPham'=>'Đồng hồ nam',
             'TrangThai'=>1
            ],
            ['TenLoaiSanPham'=>'Đồng hồ nữ',
             'TrangThai'=>1
            ],
        ]);
    }
}
