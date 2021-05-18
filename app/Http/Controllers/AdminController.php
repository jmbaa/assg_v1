<?php

namespace App\Http\Controllers;
use App\Models\Content;
use App\Models\Book;
use App\Models\User;
use App\Models\Branch;
use App\Models\BranchContent;
use Illuminate\Support\Facades\Auth;
use DB;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class AdminController extends Controller
{
    function index(){
        $movies = Content::all();
        return view('dashboard.admins.index')->with('movies', $movies);
    }

    function getMoreInformation(Request $req){
        $content = DB::table('content')->where('contentID', $req->id)->first();

        $branch = DB::table('branch_content')
        ->join('branch', function ($join) use($req) {
            $join->on('branch_content.branch_id', '=', 'branch.branchID')
                ->where('branch_content.content_id', '=', $req->id);
        })
        ->get();
        
        // $array = json_encode($branch);
        // return $array;
        return view('dashboard.admins.index')->with('movie', $content)->with('branch', $branch);
    }

    function saveBook(Request $req){
        // $req->validate([
        //     'branch' => ['required'],
        //     'branchContentID' => ['required'],
        // ]);
        
        $book = new Book();

        $book->user_id = Auth::id();
        $book->branch_content_id = $req->branchContentID;
        $book->status = 'booked';

        if($book->save()){
            return redirect()->back()->with('success', 'Захиалга баталгаажлаа!');
        }else{
            return redirect()->back()->with('error', 'Захиалга баталгаажсангүй!');
        }
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

    function doaddUser(Request $request){

        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->role = 2;
        $user->password = \Hash::make($request->pass);

        if($user->save()){
            return redirect()->back()->with('success', 'Хэрэглэгч бүртгэгдлээ!');
        }else{
            return redirect()->back()->with('error', 'Хэрэглэгч бүртгэгдсэнгүй!');
        }
    } 

    function doaddStaff(Request $request){
        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->role = 2;
        $user->password = \Hash::make($request->pass);
        $user->branch_id = $request->branch;

        if($user->save()){
            return redirect()->back()->with('success', 'Ажилтан бүртгэгдлээ!');
        }else{
            return redirect()->back()->with('error', 'Ажилтан бүртгэгдсэнгүй!');
        }
    }

    function doaddBranch(Request $request){
        $user = new Branch();

        $user->bname = $request->name;
        $user->location = $request->location;

        if($user->save()){
            return redirect()->back()->with('success', 'Салбар бүртгэгдлээ!');
        }else{
            return redirect()->back()->with('error', 'Салбар бүртгэгдсэнгүй!');
        }
    }

    function branchList(){
        $branches = Branch::all();
        return view('dashboard.admins.branchList')->with('branches', $branches);
    }

    function reSaveBranchList(Request $req){
        $row = DB::table('branch')
                ->where('branchID', $req->id)
                ->update(['bname' => $req->name]);
                
        $row1 = DB::table('branch')
            ->where('branchID', $req->id)
            ->update(['location' => $req->location]);

        return redirect()->back()->with('success', 'Салбар засагдлаа!');
    }

    function staffList(){
        $users = DB::table('users')
                ->where('branch_id', '!=', NULL)
                ->get();

        // return $users;
        return view('dashboard.admins.staffList')->with('users', $users);
    }
    function userList(){
        $users = User::all();
        return view('dashboard.admins.userList')->with('users', $users);
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

        $content->mname = $request->name;
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
