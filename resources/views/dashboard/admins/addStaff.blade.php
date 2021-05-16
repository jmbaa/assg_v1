@extends('layouts.adminMaster')

@section('content')
<div class="p-20">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                
                <div class="mr-80 ml-16 my-4">
                    <form action="#" method="post" class="space-y-4 border-1 rounded shadow-2xl py-10 px-20">
                    
                    <div class="card-header">{{ __('Ажилтан нэмэх') }}</div>
                    <div class="grid grid-cols-2 gap-4">
                        <label class="flex justify-end">
                            Нэр<span class="req">*</span>
                        </label>
                        <input type="text" required autocomplete="off" class="border-1 rounded shadow"></input>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <label class="flex justify-end">
                        Утас<span class="req">*</span>
                        </label>
                        <input type="text"required autocomplete="off" class="border-1 rounded shadow"></input>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <label class="flex justify-end">
                        Цахим хаяг<span class="req">*</span>
                        </label>
                        <input type="text"required autocomplete="off" class="border-1 rounded shadow"></input>
                    </div> 

                    <div class="grid grid-cols-2 gap-4">
                        <label class="flex justify-end">
                            Салбар<span class="req">*</span>
                        </label>
                        <input type="text" required autocomplete="off" class="border-1 rounded shadow"></input>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <label class="flex justify-end">
                            Нууц үг<span class="req">*</span>
                        </label>
                        <input type="password" required autocomplete="off" class="border-1 rounded shadow"></input>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <label class="flex justify-end">
                            Нууц үг дахин оруулах<span class="req">*</span>
                        </label>
                        <input type="password" required autocomplete="off" class="border-1 rounded shadow"></input>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div></div>
                        <button type="submit" class="bg-green-500 rounded-2xl w-40 py-1 text-white shadow">Нэмэх</button>
                    </div>
                    
                    </form>
                </div> 
            </div>
        </div>
    </div>
</div>
@endsection
