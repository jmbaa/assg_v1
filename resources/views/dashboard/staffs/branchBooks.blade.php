@extends('layouts.staffMaster')

@section('content')
<div class="p-20">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                
                <div class="gap-4 w-full px-10 py-1 border rounded">

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

                    <table  class="table-auto border-separate w-full gap-2">
                            <tr>
                                <th>Захиалгын дугаар</th>
                                <th>Хэрэглэгчийн нэр</th>
                                <th>Контент нэр</th>
                                <th>Төрөл</th>
                                <th>Төлөв</th>
                                <th>Үлдсэн цаг</th>
                                <th></th>
                            </tr>
                            
                            @foreach($books as $book)
                            
                            <tr>    
                                    <th class="text-right px-7">{{$book->id}}</th>
                                    <th>{{$book->name}}</th>
                                    <th>{{$book->mname}}</th>
                                    <th>
                                        @if($book->contentType == "dvd")
                                            DVD - 4500₮
                                        @elseif($book->contentType == "bd")
                                            CD - 4000₮
                                        @elseif($book->contentType == "cd")
                                            BD - 4200₮
                                        @endif
                                    </th>
                                    <th>
                                    
                                    <form action="branchBooks" method="post">
                                            @csrf 

                                        <select name="status" value="">
                                            <option value="booked"    @if($book->status == 'booked')  selected @endif > Захиалсан</option>
                                            <option value="started"   @if($book->status == 'started') selected @endif > Эхэлсэн</option>
                                            <option value="ended"     @if($book->status == 'ended')   selected @endif > Дууссан </option>
                                            <option value="ignored"   @if($book->status == 'ignored') selected @endif > Хударсан </option>
                                        </select>
                                        
                                        </th>
                                        <th>{{ date("h:m:s", strtotime(time()) - strtotime($book->bcreated_at) )}}</th>
                                        <th>
                                            <input type="hidden" name="id" value="{{$book->bookID}}">
                                            <button type="submit" class="bg-green-500 text-white hover:bg-green-200 px-2 py-1 rounded">Хадгалах</button>
                                        </form>
                                    </th>
                                </tr>
                            @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection