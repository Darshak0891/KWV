<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin_log extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','type_id','action_type_id','request_id','message','edit_old_data',
                            'edit_new_data'];
}
