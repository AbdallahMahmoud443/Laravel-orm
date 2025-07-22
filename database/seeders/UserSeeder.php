<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        /*
            make vs create method
            🔧 make() method
                1.Creates an Eloquent model instance without saving it to the database.
                2.Useful when you want to create an object, maybe modify it, or validate it before saving
            🧱 create() method
                1.Creates and saves the model instance in one step.
                2.Requires the fillable or guarded properties to be properly set on the model to prevent mass assignment vulnerabilities
        **/
        User::factory(3)->create(); // generate fake data without insert them in database
        /*
        $users = User::factory(3)->make();
        dump($users);
        */
    }
}
