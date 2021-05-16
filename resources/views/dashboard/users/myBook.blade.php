@extends('layouts.userMaster')

@section('content')
<div class="p-20">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header border-1 rounded border-green-700">{{ __('Миний захиалгууд') }}</div>
                
                <div class="">
                    <table  class="table-auto border-separate w-full">
                        <tr>
                            <th>Захиалгын дугаар</th>
                            <th>Салбарын нэр</th>
                            <th>Салбарын байршил</th>
                            <th>Контент нэр</th>
                            <th>Төрөл</th>
                            <th>Статус</th>
                            <th>Үлдсэн цаг</th>
                            <th></th>
                        </tr>

                        <hr>
                        
                        @foreach ($myBooks as $item)
                            <tr>
                                <th>{{$item->bookID}}</th>
                                <th>{{$item->bname}}</th>
                                <th>{{$item->location}}</th>
                                <th>{{$item->mname}}</th>
                                <th>
                                    @if($item->contentType == "dvd")
                                        DVD - 4500₮
                                    @elseif($item->contentType == "bd")
                                        CD - 4000₮
                                    @elseif($item->contentType == "cd")
                                        BD - 4200₮
                                    @endif
                                </th>
                                <th>{{$item->status}}</th>
                                <th>{{ date("h:m:s", strtotime(time()) - strtotime($item->bcreated_at) )}}</th>
                            </tr>
                        @endforeach
                        </table>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection