<?php

use Illuminate\Database\Seeder;
use Faker as Faker;

class ProfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker\Factory::create();

        // Create LastNames
        $lastname1 = $faker->lastName;  
        $lastname2 = $faker->lastName;
        $lastname3 = $faker->lastName;

        // $gender = $faker->randomElement(['male', 'female']);

        //
        // Family One
        /////

            // Father
            DB::table('profiles')->insert([
                'first_name'    => $faker->firstNameMale,
                'last_name'     => $lastname1,
                'gender'        => 'male',
                'date_of_birth' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'date_of_death' => null,
                'location'      => $faker->city,
                'user_id'       => 1,
            ]);
            $father_id = DB::getPdo()->lastInsertId();
            
            // Mother
            DB::table('profiles')->insert([
                'first_name'    => $faker->firstNameFemale,
                'last_name'     => $lastname1,
                'gender'        => 'female',
                'date_of_birth' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'date_of_death' => null,
                'location'      => $faker->city,
            ]);
            $mother_id = DB::getPdo()->lastInsertId();

            // Child 1
            $gender = $faker->randomElement(['male', 'female']);
            DB::table('profiles')->insert([
                'first_name'    => $faker->firstName($gender),
                'last_name'     => $lastname1,
                'gender'        => $gender,
                'date_of_birth' => $faker->dateTimeThisDecade($max = 'now', $timezone = null),
                'date_of_death' => null,
                'location'      => $faker->city,
                'father_id'     => $father_id,
                'mother_id'     => $mother_id,
            ]);

            // Child 2
            $gender = $faker->randomElement(['male', 'female']);
            DB::table('profiles')->insert([
                'first_name'    => $faker->firstName($gender),
                'last_name'     => $lastname1,
                'gender'        => $gender,
                'date_of_birth' => $faker->dateTimeThisDecade($max = 'now', $timezone = null),
                'date_of_death' => null,
                'location'      => $faker->city,
                'father_id'     => $father_id,
                'mother_id'     => $mother_id,
            ]);

            //
        // Family Two
        /////

            // Father
            DB::table('profiles')->insert([
                'first_name'    => $faker->firstNameMale,
                'last_name'     => $lastname2,
                'gender'        => 'male',
                'date_of_birth' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'date_of_death' => null,
                'location'      => $faker->city,
            ]);
            $father_id = DB::getPdo()->lastInsertId();
            
            // Mother
            DB::table('profiles')->insert([
                'first_name'    => $faker->firstNameFemale,
                'last_name'     => $lastname2,
                'gender'        => 'female',
                'date_of_birth' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'date_of_death' => null,
                'location'      => $faker->city,
            ]);
            $mother_id = DB::getPdo()->lastInsertId();

            // Child 1
            $gender = $faker->randomElement(['male', 'female']);
            DB::table('profiles')->insert([
                'first_name'    => $faker->firstName($gender),
                'last_name'     => $lastname2,
                'gender'        => $gender,
                'date_of_birth' => $faker->dateTimeThisDecade($max = 'now', $timezone = null),
                'date_of_death' => null,
                'location'      => $faker->city,
                'father_id'     => $father_id,
                'mother_id'     => $mother_id,
            ]);

            // Child 2
            $gender = $faker->randomElement(['male', 'female']);
            DB::table('profiles')->insert([
                'first_name'    => $faker->firstName($gender),
                'last_name'     => $lastname2,
                'gender'        => $gender,
                'date_of_birth' => $faker->dateTimeThisDecade($max = 'now', $timezone = null),
                'date_of_death' => null,
                'location'      => $faker->city,
                'father_id'     => $father_id,
                'mother_id'     => $mother_id,
            ]);

            // Child 3
            $gender = $faker->randomElement(['male', 'female']);
            DB::table('profiles')->insert([
                'first_name'    => $faker->firstName($gender),
                'last_name'     => $lastname2,
                'gender'        => $gender,
                'date_of_birth' => $faker->dateTimeThisDecade($max = 'now', $timezone = null),
                'date_of_death' => null,
                'location'      => $faker->city,
                'father_id'     => $father_id,
                'mother_id'     => $mother_id,
            ]);

            //
        // Family Three
        /////

            // Father
            DB::table('profiles')->insert([
                'first_name'    => $faker->firstNameMale,
                'last_name'     => $lastname3,
                'gender'        => 'male',
                'date_of_birth' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'date_of_death' => null,
                'location'      => $faker->city,
            ]);
            $father_id = DB::getPdo()->lastInsertId();
            
            // Mother
            DB::table('profiles')->insert([
                'first_name'    => $faker->firstNameFemale,
                'last_name'     => $lastname3,
                'gender'        => 'female',
                'date_of_birth' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'date_of_death' => null,
                'location'      => $faker->city,
            ]);
            $mother_id = DB::getPdo()->lastInsertId();

            // Child 1
            $gender = $faker->randomElement(['male', 'female']);
            DB::table('profiles')->insert([
                'first_name'    => $faker->firstName($gender),
                'last_name'     => $lastname3,
                'gender'        => $gender,
                'date_of_birth' => $faker->dateTimeThisDecade($max = 'now', $timezone = null),
                'date_of_death' => null,
                'location'      => $faker->city,
                'father_id'     => $father_id,
                'mother_id'     => $mother_id,
            ]);
    }
}
