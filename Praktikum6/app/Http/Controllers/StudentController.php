<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        return view('student.index');
    }

    public function lingkaran($r)
    {
        $luas = pi() * pow($r, 2);
        $keliling = 2 * pi() * $r;

        return view('lingkaran', compact('r', 'luas', 'keliling'));
    }
}
