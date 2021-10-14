<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;
    protected $guarded = ['id'];


    function getDoctor($uerId) {
        $id =$uerId;
        return User::findOrFail($id);
    }
    function getUser($uerId) {
        $id =$uerId;
        return User::findOrFail($id);
    }

}
