<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Userlist extends Model
{
    public $timestamps = true;
    protected $table = 'userlist'; // Specify the table name if it differs from the default
    protected $fillable = ['firstname', 'lastname', 'address', 'email']; // Specify the fillable fields for mass assignment
}
