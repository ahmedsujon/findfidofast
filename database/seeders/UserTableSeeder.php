<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $emails = ["user@example.com", "user1@example.com"];
        $phones = ["+14698783479", "+14696625784"];
        $names = ["Shihab", "Andrew"];

        foreach ($emails as $key => $email) {
            $getUser = User::where('email', $email)->first();
            if (!$getUser) {
                $user = new User();
                $user->name = $names[$key];
                $user->email = $email;
                $user->phone = $phones[$key];
                $user->password = Hash::make('12345678');
                $user->avatar = 'assets/images/avatar.png';
                $user->save();
            }
        }
    }
}
