<?php

namespace App\Http\Controllers;

use App\Http\Requests\GeneralRequest;

class ThirdController extends Controller
{

    public function index(GeneralRequest $request)
    {
        if ($request->validated()) {
            list($digits, $str) = $this->getDigitsFromString($request->string);
        } else {
            list($digits, $str) = $this->getDigitsFromString();
        }

        return view('task3', compact('digits', 'str'));
    }
}
