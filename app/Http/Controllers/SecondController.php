<?php

namespace App\Http\Controllers;

use App\Http\Requests\GeneralRequest;

class SecondController extends Controller
{

    /**
     * @param  \App\Http\Requests\GeneralRequest  $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(GeneralRequest $request)
    {
        if ($request->validated()) {
            list($amountPupils, $sportPupils, $percent) = $this->getAmountSportPupils($request->amount, $request->percent);
        } else {
            list($amountPupils, $sportPupils, $percent) = $this->getAmountSportPupils();
        }

        return view('task2', compact('amountPupils', 'sportPupils', 'percent'));
    }
}
