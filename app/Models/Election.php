<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Election extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'name',
        'start_date',
        'end_date',
    ];

    public function candidats()
    {
        return $this->belongsToMany(Candidat::class);
    }

    public function votes()
    {
        return $this->hasMany(Vote::class);
    }

}
