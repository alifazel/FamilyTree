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

        // $gender = $faker->randomElement(['Male', 'Female']);

        //
        // Family One
        /////

            // Father
            DB::table('profiles')->insert([
                'name'          => $faker->firstNameMale . ' ' . $lastname1,
                'gender'        => 'Male',
                'dob'           => $faker->date($format = 'Y-m-d', $max = 'now'),
                'dod'           => null,
                'location'      => $faker->city,
                'description'   => $faker->sentence($nbWords = 12, $variableNbWords = true),
                'email'         => $faker->freeEmail,
                'contact_number'=> $faker->e164PhoneNumber,
                'marital_status'=> 'Married',
                'facebook_url'  => 'facebook.com/' . $faker->firstNameMale,
            ]);
            $father_id = DB::getPdo()->lastInsertId();
            
            // Mother
            DB::table('profiles')->insert([
                'name'          => $faker->firstNameFemale . ' ' . $lastname1,
                'gender'        => 'Female',
                'dob'           => $faker->date($format = 'Y-m-d', $max = 'now'),
                'dod'           => null,
                'location'      => $faker->city,
                'description'   => $faker->sentence($nbWords = 12, $variableNbWords = true),
                'email'         => $faker->freeEmail,
                'contact_number'=> $faker->e164PhoneNumber,
                'marital_status'=> 'Married',
                'facebook_url'  => 'facebook.com/' . $faker->firstNameMale,
            ]);
            $mother_id = DB::getPdo()->lastInsertId();

            // Child 1
            $gender = $faker->randomElement(['Male', 'Female']);
            DB::table('profiles')->insert([
                'name'          => $faker->firstName($gender) . ' ' . $lastname1,
                'gender'        => $gender,
                'dob'           => $faker->dateTimeThisDecade($max = 'now', $timezone = null),
                'dod'           => null,
                'location'      => $faker->city,
                'father_id'     => $father_id,
                'mother_id'     => $mother_id,
                'description'   => $faker->sentence($nbWords = 12, $variableNbWords = true),
                'email'         => $faker->freeEmail,
                'contact_number'=> $faker->e164PhoneNumber,
                'marital_status'=> 'Single',
                'facebook_url'  => 'facebook.com/' . $faker->firstNameMale,
            ]);

            // Child 2
            $gender = $faker->randomElement(['Male', 'Female']);
            DB::table('profiles')->insert([
                'name'          => $faker->firstName($gender) . ' ' . $lastname1,
                'gender'        => $gender,
                'dob'           => $faker->dateTimeThisDecade($max = 'now', $timezone = null),
                'dod'           => null,
                'location'      => $faker->city,
                'father_id'     => $father_id,
                'mother_id'     => $mother_id,
                'description'   => $faker->sentence($nbWords = 12, $variableNbWords = true),
                'email'         => $faker->freeEmail,
                'contact_number'=> $faker->e164PhoneNumber,
                'marital_status'=> 'Single',
                'facebook_url'  => 'facebook.com/' . $faker->firstNameMale,
            ]);

            //
        // Family Two
        /////

            // Father
            DB::table('profiles')->insert([
                'name'          => $faker->firstNameMale . ' ' . $lastname2,
                'gender'        => 'Male',
                'dob'           => $faker->date($format = 'Y-m-d', $max = 'now'),
                'dod'           => null,
                'location'      => $faker->city,
                'description'   => $faker->sentence($nbWords = 12, $variableNbWords = true),
                'email'         => $faker->freeEmail,
                'contact_number'=> $faker->e164PhoneNumber,
                'marital_status'=> 'Married',
                'facebook_url'  => 'facebook.com/' . $faker->firstNameMale,
            ]);
            $father_id = DB::getPdo()->lastInsertId();
            
            // Mother
            DB::table('profiles')->insert([
                'name'          => $faker->firstNameFemale . ' ' . $lastname2,
                'gender'        => 'Female',
                'dob'           => $faker->date($format = 'Y-m-d', $max = 'now'),
                'dod'           => null,
                'location'      => $faker->city,
                'description'   => $faker->sentence($nbWords = 12, $variableNbWords = true),
                'email'         => $faker->freeEmail,
                'contact_number'=> $faker->e164PhoneNumber,
                'marital_status'=> 'Married',
                'facebook_url'  => 'facebook.com/' . $faker->firstNameMale,
            ]);
            $mother_id = DB::getPdo()->lastInsertId();

            // Child 1
            $gender = $faker->randomElement(['Male', 'Female']);
            DB::table('profiles')->insert([
                'name'          => $faker->firstName($gender) . ' ' . $lastname2,
                'gender'        => $gender,
                'dob'           => $faker->dateTimeThisDecade($max = 'now', $timezone = null),
                'dod'           => null,
                'location'      => $faker->city,
                'father_id'     => $father_id,
                'mother_id'     => $mother_id,
                'description'   => $faker->sentence($nbWords = 12, $variableNbWords = true),
                'email'         => $faker->freeEmail,
                'contact_number'=> $faker->e164PhoneNumber,
                'marital_status'=> 'Single',
                'facebook_url'  => 'facebook.com/' . $faker->firstNameMale,
            ]);

            // Child 2
            $gender = $faker->randomElement(['Male', 'Female']);
            DB::table('profiles')->insert([
                'name'          => $faker->firstName($gender) . ' ' . $lastname2,
                'gender'        => $gender,
                'dob'           => $faker->dateTimeThisDecade($max = 'now', $timezone = null),
                'dod'           => null,
                'location'      => $faker->city,
                'father_id'     => $father_id,
                'mother_id'     => $mother_id,
                'description'   => $faker->sentence($nbWords = 12, $variableNbWords = true),
                'email'         => $faker->freeEmail,
                'contact_number'=> $faker->e164PhoneNumber,
                'marital_status'=> 'Single',
                'facebook_url'  => 'facebook.com/' . $faker->firstNameMale,
            ]);

            // Child 3
            $gender = $faker->randomElement(['Male', 'Female']);
            DB::table('profiles')->insert([
                'name'          => $faker->firstName($gender) . ' ' . $lastname2,
                'gender'        => $gender,
                'dob'           => $faker->dateTimeThisDecade($max = 'now', $timezone = null),
                'dod'           => null,
                'location'      => $faker->city,
                'father_id'     => $father_id,
                'mother_id'     => $mother_id,
                'description'   => $faker->sentence($nbWords = 12, $variableNbWords = true),
                'email'         => $faker->freeEmail,
                'contact_number'=> $faker->e164PhoneNumber,
                'marital_status'=> 'Single',
                'facebook_url'  => 'facebook.com/' . $faker->firstNameMale,
            ]);

            //
        // Family Three
        /////

            // Father
            DB::table('profiles')->insert([
                'name'          => $faker->firstNameMale . ' ' . $lastname3,
                'gender'        => 'Male',
                'dob'           => $faker->date($format = 'Y-m-d', $max = 'now'),
                'dod'           => null,
                'location'      => $faker->city,
                'description'   => $faker->sentence($nbWords = 12, $variableNbWords = true),
                'email'         => $faker->freeEmail,
                'contact_number'=> $faker->e164PhoneNumber,
                'marital_status'=> 'Married',
                'facebook_url'  => 'facebook.com/' . $faker->firstNameMale,
            ]);
            $father_id = DB::getPdo()->lastInsertId();
            
            // Mother
            DB::table('profiles')->insert([
                'name'          => $faker->firstNameFemale . ' ' . $lastname3,
                'gender'        => 'Female',
                'dob'           => $faker->date($format = 'Y-m-d', $max = 'now'),
                'dod'           => null,
                'location'      => $faker->city,
                'description'   => $faker->sentence($nbWords = 12, $variableNbWords = true),
                'email'         => $faker->freeEmail,
                'contact_number'=> $faker->e164PhoneNumber,
                'marital_status'=> 'Married',
                'facebook_url'  => 'facebook.com/' . $faker->firstNameMale,
            ]);
            $mother_id = DB::getPdo()->lastInsertId();

            // Child 1
            $gender = $faker->randomElement(['Male', 'Female']);
            DB::table('profiles')->insert([
                'name'          => $faker->firstName($gender) . ' ' . $lastname3,
                'gender'        => $gender,
                'dob'           => $faker->dateTimeThisDecade($max = 'now', $timezone = null),
                'dod'           => null,
                'location'      => $faker->city,
                'father_id'     => $father_id,
                'mother_id'     => $mother_id,
                'description'   => $faker->sentence($nbWords = 12, $variableNbWords = true),
                'email'         => $faker->freeEmail,
                'contact_number'=> $faker->e164PhoneNumber,
                'marital_status'=> 'Single',
                'facebook_url'  => 'facebook.com/' . $faker->firstNameMale,
            ]);
    }
}
