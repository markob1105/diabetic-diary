<?php

namespace App\Http\Controllers;

use App\Sugar;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SugarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('sugars.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'value' => 'required|numeric|between:0.1,35',
            'time' => 'required|date'
        ]);

        $sugar = Sugar::create([
            'value' => request('value'),
            'time' => request('time'),
            'user_id' => Auth::user()->id
        ]);

        return redirect()->action(
            'SugarsController@show'
        );
    }

    /**
     * Display the specified resource.
     *
     * @param Sugar $sugar
     * @param Sugar $avgStar
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $query = Sugar::where('user_id', Auth::user()->id);

        if (request()->has('measured_before')) {
            $query->whereDate('time', '<', Carbon::parse(request()->get('measured_before'))->toDateString());
        }

        $sugars = $query->get();
        $avgSugar = $query->avg('value');

        return view('sugars.show', [
            'sugars' => $sugars,
            'avgSugar' => $avgSugar
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sugar  $sugars
     * @return \Illuminate\Http\Response
     */
    public function edit(Sugar $sugar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sugar  $sugars
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sugar $sugar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sugar  $sugars
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sugar $sugars)
    {
        //
    }
}
