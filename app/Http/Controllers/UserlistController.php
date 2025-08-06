<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Userlist;
class UserlistController extends Controller
{
    function list(){
        return Userlist::all();
    }
}
