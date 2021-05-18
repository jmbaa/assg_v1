@extends('layouts.adminMaster')

@section('content')
<div class="p-20">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Салбарууд') }}</div>

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
                
                <div class="grid grid-cols-2 gap-4 w-full px-10 rounded">
                
                @foreach($branches as $branch)
                    <form action="branchList" method="post" class="space-y-4 border-1 rounded shadow-2xl py-10 px-10">

                        @csrf 
                        <div class="grid grid-cols-2 gap-4">
                            <label class="flex justify-end">
                                Салбарын код<span class="req">*</span>
                            </label>
                            <input name="id" type="text" required autocomplete="off"  class="border-1 rounded shadow" value="{{$branch->branchID}}"></input>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <label class="flex justify-end">
                                Нэр<span class="req">*</span>
                            </label>
                            <input name="name"  type="text" required autocomplete="off" class="border-1 rounded  shadow" value="{{$branch->bname}}"></input>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <label class="flex justify-end">
                                Байршил<span class="req">*</span>
                            </label>
                            <input name="location"  type="text" required autocomplete="off" class="border-1 rounded shadow" value="{{$branch->location}}"></input>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="flex justify-end">
                                <button type="submit" class="bg-red-500 rounded-2xl w-40 py-1 text-white">Устгах</button>
                            </div>
                            <button type="submit" class="bg-green-500 rounded-2xl w-40 py-1 text-white">Хадгалах</button>
                        </div>
                    </form>
                @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
