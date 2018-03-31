<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $user = User::findOrFail($id);

        $picpath = public_path() . '/img/profile/' . $user->id . "/" . $user->pic;
        if (File::exists($picpath)) {
            $user->pic = 'profile/' . $user->id . "/" . $user->pic;
        } else {
            $user->pic = $user->gender . '.png';
        }

        return view('profile.index')->with(compact('user'));
    }

    public function uploadePhoto(Request $request)
    {
        $request->validate([
            'image' => 'required|mimes:jpeg,jpg,png,gif|max:10000',
        ]);

        $image = $request->file('image');

        $path = public_path() . '/img/profile/' . Auth::user()->id . "/";
        if (!File::exists($path)) {
            File::makeDirectory($path, '0777', true);
        }

        $name = Auth::user()->id . "_" . time() . "_" . $image->getClientOriginalName();
        if ($image->move($path, $name)) {
            User::where('id', Auth::user()->id)
                ->update(['pic' => $name]);
        }

        return back();
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
