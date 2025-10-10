<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            // CompanySeeder::class,
            // LocationSeeder::class,
            // SubLocationSeeder::class,
            // ServerTypeSeeder::class,
            // BrandSeeder::class,
            // ServerSeeder::class,
            // CameraTypeSeeder::class,
            // CameraCategorySeeder::class,
            // CameraVariantSeeder::class,
            // CameraSeeder::class,
            // CaptureSeeder::class,
            // CameraDetailSeeder::class,
        ]);
    }
}