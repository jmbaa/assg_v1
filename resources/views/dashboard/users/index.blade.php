@extends('layouts.userMaster')

@section('content')
<div class="p-20">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('') }}</div>

                @if ( Session::get('success'))
					<div class="bg-green-200 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md">
    					{{ Session::get('success')}}
					</div>
				@endif

				@if ( Session::get('error'))
					<div class="bg-red-200 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md">
	    				{{ Session::get('error')}}
					</div>
				@endif
                
                @if(isset($movie))    
                <div class="frame-container grid grid-cols-2 gap-2">
                    <iframe width="590" height="325" class="shadow-2xl"
                    src="{{ $movie->trailerLink }}">
                    </iframe>

                    <form action="saveBook" method="post" class="space-y-4 border-1 rounded shadow-2xl py-10 px-10">

                    @csrf
                        <div class="grid grid-cols-2 gap-4">
                            <label class="flex justify-end">
                                Зохиолч:
                            </label>
                            <input type="text" required autocomplete="off"  class="border-1 rounded" value="{{$movie->author}}"></input>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <label class="flex justify-end">
                                Продюсер:
                            </label>
                            <input type="text" required autocomplete="off" class="border-1 rounded" value="{{$movie->producer}}"></input>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <label class="flex justify-end">
                                Төрөл:
                            </label>
                            <select name="genre" value="{{$movie->genre}}">
                                <option value="action">Action</option>
                                <option value="drama">Drama</option>
                                <option value="anime">Anime</option>
                                <option value="comedy">Comedy</option>
                                <option value="action">Horror</option>
                                <option value="drama">Kdrama</option>
                                <option value="serial">Serial</option>
                                <option value="adults">Adults</option>
                            </select>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <label class="flex justify-end" value="{{$movie->durTime}}">
                                Үргэлжлэх хугацаа:
                            </label>
                            <input type="text" required autocomplete="off" class="border-1 rounded" value="{{$movie->durTime}}"></input>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <label class="flex justify-end">
                                Үзэлт
                            </label>
                            <input type="text" required autocomplete="off" class="border-1 rounded" value="{{$movie->numberOfRented}}"></input>
                        </div> 
                        
                        @if(isset($branch))
                            @if($branch != "[]")
                                <div class="text-center shadow">
                                    <select name="branchContentID" id="cars" class="" >
                                        @foreach ($branch as $item)
                                            <option value="{{$item->branchContentID}}">{{$item->branchID}}. {{$item->bname}}</option>
                                        @endforeach
                                    </select>
                                </div> 
                                <div class="grid grid-cols-2 gap-4">
                                    <a href="/user/dashboard" class="rounded-2xl w-40 py-1 text-white bg-red-500 ml-20 justify-center px-14">Буцах</a>
                                    <button type="submit" class="bg-green-500 rounded-2xl w-40 py-1 text-white">Захиалах</button>
                                </div>
                            @else
                                <div class="grid grid-cols-2 gap-4">
                                    <a href="/user/dashboard" class="rounded-2xl w-40 py-1 text-white bg-red-500 ml-20 justify-center px-14">Буцах</a>
                                    <h1 class="bg-yellow-200 rounded-2xl py-1 px-3 text-gray-700 content-center">Кино одоогоор байхгүй байна.</h1>
                                </div>
                            @endif
                        @endif
                        

                        

                        </form>
                </div>
                @else
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @foreach ($movies as $item)
                        <div class="frame-container">
                            <form action="/user/dashboard" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ $item->contentID }}">
                            <button class="iframe-button bg-green-500 rounded px-4 py-2 text-white bold aligh-center">
                                Дэлгэрэнгүй харах
                            </button>
                            </form>
                            <iframe width="575" height="290"
                            src="{{ $item->trailerLink }}">
                            </iframe>
                        </div>
                        @endforeach
                    </div>       
            @endif
            </div>
        </div>
    </div>
</div>
@endsection