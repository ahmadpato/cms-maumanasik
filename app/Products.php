<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = "users";

    protected $fillable = [
        'ic',
		'user_name',
		'gender',
		'join_date',
		'group',
		'remark',
		'image'
    ];
}
