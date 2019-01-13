<?php

namespace App\Http\Controllers;

use App\Sugar;
use App\Insulin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = Sugar::where('user_id', Auth::user()->id);

        if (request()->has('measured_before')) {
            $query->whereDate('time', '<', Carbon::parse(request()->get('measured_before'))->toDateString());
        }

        $sugars = $query->get();

        $insulins = Insulin::orderBy('time', 'desc')->paginate(20);

        return view('home', [
            'sugars' => $sugars,
            'insulins' => $insulins,
        ]);
    }
}
