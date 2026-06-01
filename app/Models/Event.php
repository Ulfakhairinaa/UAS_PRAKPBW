<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [

        'title',
        'description',
        'event_date',
        'location',
        'poster',
        'status',
        'prodi_code'
    ];

    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }
}