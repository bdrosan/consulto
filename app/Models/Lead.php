<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'phone', 'email', 'country', 'subject', 'qualification', 'result', 'ielts', 'address', 'note'];
}