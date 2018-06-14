<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        
        $faker = Faker\Factory::create();
		
        $users = [];
        foreach (range(1, 5) as $index){
        	$users[] = [
				'id' => $index,
				'email' => $faker->email,
				'name' => $faker->name,
				'password' => Hash::make('12345678'),
				'created_at' => \Carbon\Carbon::now(),
				'updated_at' => \Carbon\Carbon::now()
			];
		}
  
		DB::table('users')->insert($users);
    }
}
