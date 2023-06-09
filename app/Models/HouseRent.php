<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HouseRent extends Model
{
    use HasFactory;

    protected $fillable = ['house_id', 'rent', 'baki', 'jama', 'date', 'dc', 'nod'];
}
