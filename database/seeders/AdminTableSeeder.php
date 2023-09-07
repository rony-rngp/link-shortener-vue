<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->delete();
        Admin::updateOrCreate([
           'id' => 1,
           'name' => 'Rony Islam',
           'email' => 'rony.rng@gmail.com',
           'password' => Hash::make(11111111),
           'gender' => 'Male',
           'image' => '',
        ]);
    }
}
