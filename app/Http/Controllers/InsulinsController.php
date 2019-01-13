<?php

namespace App\Http\Controllers;

use App\Insulin;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class InsulinsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'dose' => 'required|numeric|between:0.1,25',
            'time' => 'required|date'
        ]);

        /*$insulin = new Insulin();
        $insulin->dose = request('dose');
        $insulin->time = request('time');
        $insulin->user_id = Auth::user()->id;
        $insulin->save();*/

        //dd(request('time'), Carbon::parse(request('time')));

        $insulin = Insulin::create([
            'dose' => request('dose'),
            'time' => request('time'),
            'user_id' => Auth::user()->id
        ]);

        return redirect()->action(
            'InsulinsController@show'
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Insulin  $insulins
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $insulins = Insulin::orderBy('time', 'desc')->paginate(20);

        return view('insulins.show', [
            'insulins' => $insulins,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Insulin  $insulins
     * @return \Illuminate\Http\Response
     */
    public function edit(Insulin $insulin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Insulin  $insulins
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Insulin $insulin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Insulin  $insulins
     * @return \Illuminate\Http\Response
     */
    public function destroy(Insulin $insulins)
    {
        //
    }
}
