<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    use HasFactory;

    protected $fillable = [
        'house_no','society_id','mobile_no','box_no','rent','credit','debit','is_active', 'is_deleted'];

    /* public function society()
    {
        return $this->belongsTo(Society::class,'society_id');
    } */
}
