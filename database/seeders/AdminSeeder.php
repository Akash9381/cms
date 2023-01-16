<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name'=>'Admin',
            'email'=>'cms@addressmaker.com',
            'password'=>Hash::make('3z4p6PDJFtKaj5y'),
            'email_verified_at'=>Carbon::now()
        ]);
        $user->assignRole('admin');
    }
}
