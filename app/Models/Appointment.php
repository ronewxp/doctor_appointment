<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Appointment extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    function getDoctor($uerId) {
        $id =$uerId;
        return User::findOrFail($id)->name;
    }
    function getUser($uerId) {
        $id =$uerId;
        return User::findOrFail($id)->name;
    }



}
