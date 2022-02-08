<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurTeam extends Model
{
    use HasFactory;
    protected $directory="/Image/";
    protected $fillable = [
        'name',
        'Reshte',
        'description',
        'path'
    ];
    public function getpathAttribute($value)
    {
        return $this->directory.$value;
    }
}
