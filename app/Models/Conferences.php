<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conferences extends Model {
    use HasFactory;

    protected $table = 'conferences';
    
    public $timestamps = true;

    protected $casts = [
        'roomId' => 'string'
    ];

    protected $fillable = [
        'fullname',
        'username',
        'created_at',
        'email',
        'roomId',
        //'password'
    ];
}
