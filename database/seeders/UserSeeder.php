<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Factory;
use Database\Factories\UserFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // use factory state to change values of dummy data ,
        User::factory()
            ->unverified()
            ->AdminAccount()
            ->trashed()
            ->count(2)
            ->create();
    }
}
