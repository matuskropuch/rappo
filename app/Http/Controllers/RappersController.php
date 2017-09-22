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

        // $relative_path = "rappers_images/rapper-{$request->nickname}."
        //                  . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        // $image_location = public_path() . "/" . $relative_path;

        // move_uploaded_file($_FILES["image"]["tmp_name"], $image_location);

        $filename = "rapper-{$request->nickname}." . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        $relative_path = "images/rappers/" . $filename;
        $path = $request->file('image')->storeAs(
            'public/images/rappers',
            $filename
        );

        auth()->user()->rappers()->create([
            'nickname' => $request->nickname,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'born_at' => $request->born_at,
            'image' => $relative_path,
            'bio' => $request->bio
        ]);

        return redirect()->route('rappers.index');
    }

    public function edit($nickname)
    {
        $rapper = Rapper::findByNickname($nickname);

        return view('rappers.edit', compact('rapper'));
    }

    public function update(Request $request, $id)
    {
        $rapper = Rapper::find($id);
        $rapper->update(
            $request->only('first_name', 'last_name', 'nickname', 'born_at', 'bio')
        );

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
        $rapper = Rapper::findByNickname($nickname);

        return view('rappers.show', compact('rapper'));
    }
}
