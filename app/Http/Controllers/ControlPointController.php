<?php

namespace App\Http\Controllers;

use App\Models\ControlPoint;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ControlPointController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $today = date('Y-m-d');
        $controlPoints = ControlPoint::where('UserId', Auth::user()->id)->get();
        $controlPointToday = ControlPoint::where('UserId', Auth::user()->id)->where('DtHr', date('Y-m-d'))->first();
        return view('control-point.control')->with('controlPoints', $controlPoints)->with('controlPointToday', $controlPointToday)->with('today', $today);
    }

    public function register(Request $request): RedirectResponse
    {
        $user = Auth::user();

        // verificar se existe o ponto de controle na base de dados
        $controlPoint = ControlPoint::where([['UserId', $user->id], ['DtHr', date('Y-m-d')]])->first();

        if ($controlPoint) {
            $controlPoint->update($request->all());
        } else {
            $controlPoint = new ControlPoint($request->all());
            $controlPoint->UserId = $user->id;
            $controlPoint->DtHr = date('Y-m-d');
            $controlPoint->save();
        }

        return Redirect::route('control-point');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ControlPoint $controlPoint)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ControlPoint $controlPoint)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ControlPoint $controlPoint)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ControlPoint $controlPoint)
    {
        //
    }
}
