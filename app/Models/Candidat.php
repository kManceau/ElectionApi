<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidat extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'name',
        'age',
    ];

    public function elections()
    {
        return $this->belongsToMany(Election::class);
    }

    public function votes()
    {
        return $this->hasMany(Vote::class);
    }
}
