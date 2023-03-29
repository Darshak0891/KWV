<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Society extends Model
{
    use HasFactory;

    protected $fillable = ['society_name'];

   /*  public function house()
    {
        return $this->hasOne(House::class);
    } */
}
