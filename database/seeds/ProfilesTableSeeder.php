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
                'dob'           => $faker->date($format = 'Y-m-d', $max = 'now'),
                'dod'           => null,
                'location'      => $faker->city,
                'description'   => $faker->sentence($nbWords = 12, $variableNbWords = true),
            ]);
            $father_id = DB::getPdo()->lastInsertId();
            
            // Mother
            DB::table('profiles')->insert([
                'first_name'    => $faker->firstNameFemale,
                'last_name'     => $lastname1,
                'gender'        => 'female',
                'dob'           => $faker->date($format = 'Y-m-d', $max = 'now'),
                'dod'           => null,
                'location'      => $faker->city,
                'description'   => $faker->sentence($nbWords = 12, $variableNbWords = true),
            ]);
            $mother_id = DB::getPdo()->lastInsertId();

            // Child 1
            $gender = $faker->randomElement(['male', 'female']);
            DB::table('profiles')->insert([
                'first_name'    => $faker->firstName($gender),
                'last_name'     => $lastname1,
                'gender'        => $gender,
                'dob'           => $faker->dateTimeThisDecade($max = 'now', $timezone = null),
                'dod'           => null,
                'location'      => $faker->city,
                'father_id'     => $father_id,
                'mother_id'     => $mother_id,
                'description'   => $faker->sentence($nbWords = 12, $variableNbWords = true),
            ]);

            // Child 2
            $gender = $faker->randomElement(['male', 'female']);
            DB::table('profiles')->insert([
                'first_name'    => $faker->firstName($gender),
                'last_name'     => $lastname1,
                'gender'        => $gender,
                'dob'           => $faker->dateTimeThisDecade($max = 'now', $timezone = null),
                'dod'           => null,
                'location'      => $faker->city,
                'father_id'     => $father_id,
                'mother_id'     => $mother_id,
                'description'   => $faker->sentence($nbWords = 12, $variableNbWords = true),
            ]);

            //
        // Family Two
        /////

            // Father
            DB::table('profiles')->insert([
                'first_name'    => $faker->firstNameMale,
                'last_name'     => $lastname2,
                'gender'        => 'male',
                'dob'           => $faker->date($format = 'Y-m-d', $max = 'now'),
                'dod'           => null,
                'location'      => $faker->city,
                'description'   => $faker->sentence($nbWords = 12, $variableNbWords = true),
            ]);
            $father_id = DB::getPdo()->lastInsertId();
            
            // Mother
            DB::table('profiles')->insert([
                'first_name'    => $faker->firstNameFemale,
                'last_name'     => $lastname2,
                'gender'        => 'female',
                'dob'           => $faker->date($format = 'Y-m-d', $max = 'now'),
                'dod'           => null,
                'location'      => $faker->city,
                'description'   => $faker->sentence($nbWords = 12, $variableNbWords = true),
            ]);
            $mother_id = DB::getPdo()->lastInsertId();

            // Child 1
            $gender = $faker->randomElement(['male', 'female']);
            DB::table('profiles')->insert([
                'first_name'    => $faker->firstName($gender),
                'last_name'     => $lastname2,
                'gender'        => $gender,
                'dob'           => $faker->dateTimeThisDecade($max = 'now', $timezone = null),
                'dod'           => null,
                'location'      => $faker->city,
                'father_id'     => $father_id,
                'mother_id'     => $mother_id,
                'description'   => $faker->sentence($nbWords = 12, $variableNbWords = true),
            ]);

            // Child 2
            $gender = $faker->randomElement(['male', 'female']);
            DB::table('profiles')->insert([
                'first_name'    => $faker->firstName($gender),
                'last_name'     => $lastname2,
                'gender'        => $gender,
                'dob'           => $faker->dateTimeThisDecade($max = 'now', $timezone = null),
                'dod'           => null,
                'location'      => $faker->city,
                'father_id'     => $father_id,
                'mother_id'     => $mother_id,
                'description'   => $faker->sentence($nbWords = 12, $variableNbWords = true),
            ]);

            // Child 3
            $gender = $faker->randomElement(['male', 'female']);
            DB::table('profiles')->insert([
                'first_name'    => $faker->firstName($gender),
                'last_name'     => $lastname2,
                'gender'        => $gender,
                'dob'           => $faker->dateTimeThisDecade($max = 'now', $timezone = null),
                'dod'           => null,
                'location'      => $faker->city,
                'father_id'     => $father_id,
                'mother_id'     => $mother_id,
                'description'   => $faker->sentence($nbWords = 12, $variableNbWords = true),
            ]);

            //
        // Family Three
        /////

            // Father
            DB::table('profiles')->insert([
                'first_name'    => $faker->firstNameMale,
                'last_name'     => $lastname3,
                'gender'        => 'male',
                'dob'           => $faker->date($format = 'Y-m-d', $max = 'now'),
                'dod'           => null,
                'location'      => $faker->city,
                'description'   => $faker->sentence($nbWords = 12, $variableNbWords = true),
            ]);
            $father_id = DB::getPdo()->lastInsertId();
            
            // Mother
            DB::table('profiles')->insert([
                'first_name'    => $faker->firstNameFemale,
                'last_name'     => $lastname3,
                'gender'        => 'female',
                'dob'           => $faker->date($format = 'Y-m-d', $max = 'now'),
                'dod'           => null,
                'location'      => $faker->city,
                'description'   => $faker->sentence($nbWords = 12, $variableNbWords = true),
            ]);
            $mother_id = DB::getPdo()->lastInsertId();

            // Child 1
            $gender = $faker->randomElement(['male', 'female']);
            DB::table('profiles')->insert([
                'first_name'    => $faker->firstName($gender),
                'last_name'     => $lastname3,
                'gender'        => $gender,
                'dob'           => $faker->dateTimeThisDecade($max = 'now', $timezone = null),
                'dod'           => null,
                'location'      => $faker->city,
                'father_id'     => $father_id,
                'mother_id'     => $mother_id,
                'description'   => $faker->sentence($nbWords = 12, $variableNbWords = true),
            ]);
    }
}
