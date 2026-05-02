<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create default admin user
        User::firstOrCreate(
            ['email' => 'admin@safeworldtelecom.co.ke'],
            [
                'name' => 'Admin',
                'password' => bcrypt('Admin@1234'),
                'is_admin' => true,
            ]
        );

        $this->call([
            CategorySeeder::class,
            BrandSeeder::class,
            ProductSeeder::class,
            HomepageSettingSeeder::class,
            TestimonialSeeder::class,
        ]);
    }

}


// hello world
// Email : noreply@safeworldtelecom.co.ke
// Password : Noreply@1234
