<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;
    // definisco i dati da utilizzare

    protected $fillable = ['name', 'surname', 'email', 'contact'];
}
