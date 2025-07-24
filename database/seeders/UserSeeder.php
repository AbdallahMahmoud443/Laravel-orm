<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Factory;
use Database\Factories\UserFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // hint: override Attributes Before inserting it in database with create method
        // User::factory()
        //     ->count(1)
        //     ->create([
        //         'name' => 'Test User',
        //         'is_admin' => '1'
        //     ]);
        // hint: override Attributes after creating fake  with make method
        // $users = User::factory()
        //     ->count(1)
        //     ->make([
        //         'name' => 'Test User',
        //         'is_admin' => '1'
        //     ]);
        // dd($users);
        // hint: override Attributes  with state method
        // User::factory()->count(2)->state([
        //     'is_admin' => '1',
        //     'name' => 'Ahmed'
        // ])->create();

        // hint :create sequences of dummy data with state method
        // User::factory()->count(3)
        //     ->state(new Sequence(
        //         ['is_admin' => '0',],
        //         ['is_admin' => '1']
        //     ))
        //     ->create();

        // hint :create sequences of dummy data with sequence method
        // User::factory()->count(3)->sequence(
        //     ['is_admin' => '0',],
        //     ['is_admin' => '1']
        // )->create();

        User::factory()
            ->count(10)
            ->state(new Sequence(
                ['is_admin' => '0',],
                ['is_admin' => '1']
            ))
            ->create();
    }
}
