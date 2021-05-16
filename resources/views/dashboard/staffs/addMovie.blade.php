@extends('layouts.staffMaster')

@section('content')
<div class="p-20">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Кино нэмэх') }}</div>
                    <div class="form">
                        <div class="mr-80 ml-16 my-4">
                            <form action="addMovie" method="post" class="space-y-4 border-1 rounded shadow-2xl py-10 px-20">

                                @csrf

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

                                <div class="grid grid-cols-2 gap-4">
                                    <label class="flex justify-end">
                                        Салбарын код<span class="req">*</span>
                                    </label>
                                    <input name="branchID" type="text" required autocomplete="off"  class="border-1 rounded shadow px-3" readonly value="{{$staffInfo->branch_id}}"></input>
                                </div>
                                
                                <div class="grid grid-cols-2 gap-4">
                                    <label class="flex justify-end">
                                        Киноны код<span class="req">*</span>
                                    </label>
                                    <select name="movie">
                                        @foreach($movies as $item)
                                            <option value="{{$item->contentID}}">{{$item->contentID}}. {{$item->mname}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="grid grid-cols-2 gap-4">
                                    <div></div>
                                    <button type="submit" class="bg-green-500 rounded-2xl w-40 py-1 text-white">Нэмэх</button>
                                </div>
                            
                            </form>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection