<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function getAge()
    {
        // Get DOB and current date and convert to 'datetime' format
        $dob = date_create_from_format('Y-m-d', $this->dob);
        $now = date_create_from_format('Y-m-d', date('Y-m-d'));
        
        // Compare the user's date of birth with today's date and format to string 'Y'.
        $age = date_diff($dob, $now)->format('%y');

        return $age;
    }
    
    public function hasParents() {
            return ($this->father_id || $this->mother_id) ? true : false;
    }

    public function getParents()
    {
        // Try to find parents profiles
        $father = Profile::find($this->father_id);
        $mother = Profile::find($this->mother_id);

        // Return 'Name' and 'ID' if exists, otherwise NULL.
        return ['father_id'     => isset($father) ? $father->id : null ,
                'father_name'   => isset($father) ? $father->name : null,
                'mother_id'     => isset($mother) ? $mother->id : null,
                'mother_name'   => isset($mother) ? $mother->name : null,
            ];
    }
    
}
