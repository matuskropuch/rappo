<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Rapper;
use Carbon\Carbon;

class RappersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rappers = Rapper::all();

        return view('rappers.index', compact('rappers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rappers.create');
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
            'first_name' => 'required',
            'last_name' => 'required',
            'nickname' => 'bail|required|unique:rappers',
            'born_at' => 'required|before:' . Carbon::now()->format('Y-m-d')
        ]);

        Rapper::create($request->all());

        return redirect()->route('rappers.index');
    }

    public function edit($nickname)
    {
        $rapper = Rapper::where('nickname', '=', $nickname)->first();

        return view('rappers.edit', compact('rapper'));
    }

    public function update(Request $request, $id)
    {
        $rapper = Rapper::find($id);
        $rapper->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'nickname' => $request->nickname,
            'born_at' => $request->born_at                    
        ]);

        return redirect()->route('rappers.show', $rapper->nickname);
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $nickname
     * @return \Illuminate\Http\Response
     */
    public function show($nickname)
    {
        $rapper = Rapper::where('nickname', '=', $nickname)->first();

        return view('rappers.show', compact('rapper'));
    }
}
