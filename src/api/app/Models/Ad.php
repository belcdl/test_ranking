<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    use HasFactory;

        public $id;
        public $typology;
        public $description;
        public  $pictures = [];
        public $house_size;
        public $garden_size = null;
        public $score = null;
        public $irrelevant_since = null;
        public $updated_at;

        protected $fillable = [
            'typology',
            'description',
            'pictures',
            'house_size',
            'garden_size',
            'score',
            'irrelevant_since'
        ];
        protected $casts = [
            'pictures' => 'array',
            'irrelevant_since' => 'datetime',
            'updated_at' => 'datetime',
        ];
        public $timestamps = false;
}
