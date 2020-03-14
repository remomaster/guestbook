<?php

namespace App\Http\Controllers;

use App\Blogeintrag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogeintragController extends Controller
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
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valiBlog = $request->validate([
            'titel' => ['required', 'min:3', 'max:50'],
            'inhalt' => ['required', 'min:5', 'max:500']
        ]);
        $new_blog = Blogeintrag::make($valiBlog);
        Auth::user()->blogeintraege()->save($new_blog);
        return redirect('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blogeintrag  $blogeintrag
     * @return \Illuminate\Http\Response
     */
    public function show(Blogeintrag $blogeintrag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blogeintrag  $blogeintrag
     * @return \Illuminate\Http\Response
     */
    public function edit(Blogeintrag $blogeintrag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blogeintrag  $blogeintrag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blogeintrag $blogeintrag)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blogeintrag  $blogeintrag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blogeintrag $blogeintrag)
    {
        //
    }
}
