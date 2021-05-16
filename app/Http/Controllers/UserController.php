<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Content;
use App\Models\Book;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use DB;

class UserController extends Controller
{
    function index(){
        $movies = Content::all();
        return view('dashboard.users.index')->with('movies', $movies);
    }

    function profile(){
        return view('dashboard.users.profile');
    }

    function settings(){
        return view('dashboard.users.settings');
    }

    function movies(){
        return view('dashboard.users.movies');
    } 
    function myBook(){
        $myBooks = DB::table('book')
            ->join('branch_content', 'book.branch_content_id', '=', 'branch_content.branchContentID')
            ->join('branch', 'branch_content.branch_id', '=', 'branch.branchID')
            ->join('content', function ($join) {
                $join->on('branch_content.content_id', '=', 'content.ContentID')
                ->where('book.user_id', '=', Auth::id());
            })
            ->get();

        // return $myBooks;
        return view('dashboard.users.myBook')->with('myBooks', $myBooks);
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
        return view('dashboard.users.index')->with('movie', $content)->with('branch', $branch);
    }

    function saveBook(Request $req){
        $req->validate([
            'branch' => ['required'],
            'branchContentID' => ['required'],
        ]);
        
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

    function saveInformation(Request $req){
        $req->validate([
            'id' => ['required'],
            'name' => ['required'],
            'phone' => ['required'],
            'email' => ['required'],
        ]);

        $flight = User::find($req->id);

        $flight->name = $req->name;
        $flight->phone = $req->phone;
        $flight->email = $req->email;

        if($flight->save()){
            return redirect()->back()->with('success', 'Мэдээлэл хадгалагдлаа!');
        }else{
            return redirect()->back()->with('error', 'Мэдээлэл хадгалагдсангүй!');
        }
    }
}
