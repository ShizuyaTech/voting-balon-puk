<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    use HasFactory;

    protected $fillable = ['name', 'votes'];
}
