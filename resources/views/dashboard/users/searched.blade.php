@extends('layouts.userMaster')

@section('content')
<div class="p-20">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Хайлтын үр дүн') }}</div>

                @if(isset($movie))  
                    Ecchossk visauaduf
                @endif
            </div>
        </div>
    </div>
</div>
@endsection