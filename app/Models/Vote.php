<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;

    protected $fillable = [
        'voter_id', // Tambahkan voter_id
        'candidate_id', // Tambahkan candidate_id jika diperlukan
    ];
}
