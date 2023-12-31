<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\Status;

class Mikrotik extends Model
{
    use HasFactory;

    protected $casts = [
        'status' => Status::class,
    ];  
}
