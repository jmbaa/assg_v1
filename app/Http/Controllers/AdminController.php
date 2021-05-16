<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class AdminController extends Controller
{
    function index(){
        return view('dashboard.admins.index');
    }

    function profile(){
        return view('dashboard.admins.profile');
    }

    function settings(){
        return view('dashboard.admins.settings');
    }

    // my functions
    function addBranch(){
        return view('dashboard.admins.addBranch');
    }
    function addMovieBranch(){
        return view('dashboard.admins.addMovieBranch');
    }
    function addStaff(){
        return view('dashboard.admins.addStaff');
    }
    function addUser(){
        return view('dashboard.admins.addUser');
    }
    function branchList(){
        return view('dashboard.admins.branchList');
    }
    function staffList(){
        return view('dashboard.admins.staffList');
    }
    function userList(){
        return view('dashboard.admins.userList');
    }
    function addNewMovie(){
        return view('dashboard.admins.addNewMovie');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    function doaddNewMovie(Request $request){
        $input = $request->all();
        $this->validate($request, [
            'name'=>'required',
            'author'=>'required', 
            'producer'=>'required',
            'genre'=>'required', 
            'durTime'=>'required',
            'image'=>'required',
            'cd_type'=>'required',
            'trailer'=>'required'
        ]);

        $path = $request->file('image')->store('public/storage/images');

        $content = new Content();

        $content->name = $request->name;
        $content->author = $request->author;
        $content->producer = $request->producer;
        $content->genre = $request->genre;
        $content->durTime = $request->durTime;
        $content->poster = $path;
        $content->contentType = $request->cd_type;
        $content->trailerLink = $request->trailer;
        $content->numberOfRented = 0;

        if($content->save()){
            return redirect()->back()->with('success', 'Кино бүртгэгдлээ!');
        }else{
            return redirect()->back()->with('error', 'Кино бүртгэгдсэнгүй!');
        }
    }
}
