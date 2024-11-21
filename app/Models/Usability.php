<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usability extends Model
{
    protected $guarded = [];
    
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}