<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function election()
    {
        return $this->belongsTo(Election::class);
    }
    public function candidat()
    {
        return $this->belongsTo(Candidat::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
