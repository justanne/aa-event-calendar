<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Days extends Model
{
    use HasFactory;

     protected $table = 'selected_days';
     protected $fillable = ['days', 'uid'];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}