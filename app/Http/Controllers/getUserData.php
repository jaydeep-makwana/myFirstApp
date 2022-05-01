<?php

namespace App\Http\Controllers;

use App\Rules\email;
use Illuminate\Http\Request;

class getUserData extends Controller
{
    function user_data(Request $records)
    {
        $records->validate([
            "firstName" => "required | min:3 | max:10 | alpha",
            "lastName" => "required | min:3 | max:10 | alpha",
            "age" => "required | regex:/^[0-9]/",                     # regex 
            "gender" => "required",
            "department" => "required",
            "date_of_join" => "required",
            "salary" => "required | numeric",
            "email" => ["required", new email],               # Custom Validation Rule using Rule Objects
            "Password" => ["required", function ($attribute, $value, $fail) {
                if (!preg_match('/[A-Z]/', $value) || !preg_match('/[a-z]/', $value) || !preg_match('/[\d]/', $value) || !preg_match('/[!@#$%&*]/', $value)) {
                    $fail("the $attribute must contain one uppercase,lowercase,digit and following character : !@#$%&*");
                }
            }],                                             # Custom Validation Rule using Closures
            "confirm_password" => "required | same:Password",
            "hobby" => "required"
        ]);
        return $records;
    }
}
