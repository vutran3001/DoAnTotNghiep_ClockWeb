<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
            $user-> fill([
                'name'=>'Vũ Trần',
            'email'=>'admin@gmail.com',
            'password'=>bcrypt('123456'),
            'GioiTinh'=>'Nam',
            'NgaySinh'=>date('2001/01/30'),
            'DiaChi'=>'Quảng Ngãi',
            'SDT'=>'0737928393',
            'Quyen'=>1,
            'TrangThai'=>1
            ]);
            $user->save();

            $user2 = new User();
            $user2-> fill([
                'name'=>'Đức Thịnh',
            'email'=>'thinh@gmail.com',
            'password'=>bcrypt('123456'),
            'GioiTinh'=>'Nam',
            'NgaySinh'=>date('2001/01/30'),
            'DiaChi'=>'Quảng Ngãi',
            'SDT'=>'0737928393',
            'Quyen'=>1,
            'TrangThai'=>1
            ]);
            $user2->save();
    }
}
