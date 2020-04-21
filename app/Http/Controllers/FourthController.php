<?php

namespace App\Http\Controllers;

class FourthController extends Controller
{

    public function index()
    {
        list($a, $b) = $this->changeVariables();
        return view('task4', compact('a', 'b'));
    }

}
