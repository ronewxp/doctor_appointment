<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Appointment extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function doctor()
    {
        return $this->belongsTo(User::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    function getDoctor($uerId) {
        $id =$uerId;
        return User::findOrFail($id)->name;
    }
    function getUser($uerId) {
        $id =$uerId;
        return User::findOrFail($id)->name;
    }


}
