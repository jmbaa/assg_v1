@extends('layouts.adminMaster')

@section('content')
<div class="p-20">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Хэрэглэгчид') }}</div>
                
                <div class="gap-4 w-full px-10 py-1 border rounded">
                    <table  class="table-auto border-separate w-full">
                        <tr>
                            <th>Хэрэглэгчийн код</th>
                            <th>Нэр</th>
                            <th>Утас</th>
                            <th>Цахим хаяг</th>
                        </tr>
                        @foreach($users as $user)
                            <tr>
                                <th>{{$user->id}}</th>
                                <th>{{$user->name}}</th>
                                <th>{{$user->phone}}</th>
                                <th>{{$user->email}}</th>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
