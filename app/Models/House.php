<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    use HasFactory;

    protected $fillable = [
        'house_no', 'name', 'society_id', 'mobile_no', 'box_no', 'rent', 'is_active', 'is_deleted'
    ];
}
