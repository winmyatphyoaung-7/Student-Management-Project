<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {

        Category::create([
            'name' => 'Laravel',
        ]);

        Category::create([
            'name' => 'PHP',
        ]);

        Category::create([
            'name' => 'Javascript',
        ]);

        Category::create([
            'name' => 'React Js',
        ]);

        Category::create([
            'name' => 'Vue Js',
        ]);

        Category::create([
            'name' => 'Full Stack Course',
        ]);

        Category::create([
            'name' => 'Web Design Course',
        ]);
        
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'phone' => '09405118211',
            'gender' => 'male',
            'address' => 'Yangon',
            'role' => 'admin',
            'password' => Hash::make('admin123'),
            'email_verified_at' => Carbon::now(),
        ]);

        $this->call([CourseSeeder::class]);
    }
}
