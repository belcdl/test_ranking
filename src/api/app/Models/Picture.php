<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    use HasFactory;

    private int $id;
    private String $url;
    private string $quality;

    protected $fillable = [
        'id',
        'url',
        'quality'
        
    ];
    public $timestamps = false;
}
