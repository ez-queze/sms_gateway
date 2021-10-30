<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KpController extends Controller
{
    public function personal() {
        return view('personal');
    }
}
