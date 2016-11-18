<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CampusController extends Controller
{
    public function lista()
    {
        $campus = \App\Campus::pluck('campus');
    }
}
