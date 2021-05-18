<?php

namespace App\Http\Controllers;
use App\Models\Content;
use App\Models\Book;
use App\Models\User;
use App\Models\BranchContent;
use Illuminate\Support\Facades\Auth;
use DB;

use Illuminate\Http\Request;

class StaffController extends Controller
{
    //
    function index(){
        $movies = Content::all();
        return view('dashboard.staffs.index')->with('movies', $movies);
    }

    function profile(){
        return view('dashboard.staffs.profile');
    }

    function settings(){
        return view('dashboard.staffs.settings');
    }

    function addMovie(){
        $flight = User::find(Auth::id());
        $movies = Content::all();
        return view('dashboard.staffs.addMovie')->with('staffInfo', $flight)->with('movies', $movies);
    }

    function branchBooks(){

        $staffBranch = Auth::user()->branch_id;

        $books = DB::table('book')
            ->join('branch_content', 'branch_content.branchContentID', '=', 'book.branch_content_id')
            ->join('users', 'users.id', '=', 'book.user_id')
            ->join('content', function ($join) use($staffBranch){
                $join->on('content.contentID', '=', 'branch_content.content_id')
                    ->where('branch_content.branch_id', '=', $staffBranch);
            })
        ->get();

        // return $books;
        return view('dashboard.staffs.branchBooks')->with('books', $books);
    }

    function branchRequests(){
        return view('dashboard.staffs.branchRequests');
    }

    function branchMovies(){
        $movies = DB::table('content')
        ->join('branch_content', function ($join) {
            $join->on('content.contentID', '=', 'branch_content.content_id')
                ->where('branch_content.branch_id', '=', Auth::user()->branch_id);
        })
        ->get();

        return view('dashboard.staffs.branchMovies')->with('movies', $movies);
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
        return view('dashboard.staffs.index')->with('movie', $content)->with('branch', $branch);
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

    function addBranchMovie(Request $req){
        $req->validate([
            'branchID' => ['required'],
            'movie' => ['required'],
        ]);
        
        $branch_content = new BranchContent();

        $branch_content->content_id = $req->movie;
        $branch_content->branch_id = $req->branchID;

        if($branch_content->save()){
            return redirect()->back()->with('success', 'Салбарт уг кино нэмэгдлээ!');
        }else{
            return redirect()->back()->with('error', 'Салбарт уг кино нэмэгдсэнгүй!');
        }
    }

    function reSaveBook(Request $req){

        $row = DB::table('book')
                ->where('bookID', $req->id)
                ->update(['status' => $req->status]);

        // return $req;

        if($row){
            return redirect()->back()->with('success', 'Мэдээлэл хадгалагдлаа!');
        }else{
            return redirect()->back()->with('error', 'Мэдээлэл хадгалагдсангүй!');
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
