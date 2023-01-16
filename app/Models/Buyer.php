<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buyer extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    // public function setDateAttribute($value)
    //     {
    //         $this->attributes['date'] = Carbon::createFromFormat('m/d/Y', $value)->format('Y-m-d');
    //     }

}
