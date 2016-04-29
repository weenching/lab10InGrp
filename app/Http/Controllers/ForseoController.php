<?php

namespace App\Http\Controllers;

use App\forseo;
use Illuminate\Http\Request;
use App\Http\Requests;

class ForseoController extends Controller
{
    protected $forseos;
    public function index() {
        $alert = "";
        return view('mostiA');
    }
    public function store(Request $request) {
        $success = 1;
        $this->validate($request, [
            'staffid' => 'required|unique:forseos',
            'authornames' => 'required',
            'forarea' => 'required'
        ]);

        $forseo = new Forseo;
        $forseo->staffid = $request->staffid;
        $forseo->authornames = $request->authornames;
        $forseo->forarea = $request->forarea;
        $forseo->seo = $request->seo;
        $forseo->comments = $request->comments;
        $forseo->save();
        $alert = "Your response has been successfully captured! Thanks";
        return view('mostiA', compact('success'));
    }
    public function all() {
        $forseos = Forseo::all();
        return $forseos;
    }
    public function tryPassValue() {
        $data = [];
        $data['first'] = 'hi';
        $data['last'] = 'bye';
        return view('test', $data);
    }
    public function tryPassValue2() {
        $first = 'hi2';
        $last = 'bye2';
        return view('test', compact('first', 'last'));
    }
}
