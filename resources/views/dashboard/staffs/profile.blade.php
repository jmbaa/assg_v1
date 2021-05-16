@extends('layouts.staffMaster')

@section('content')
<div class="p-20">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Ажилтаны мэдээлэл') }}</div>

                <div class="m-auto my-4">
                    <form action="#" method="post" class="space-y-4 border-1 rounded shadow-2xl py-10 px-20">

                        <div class="grid grid-cols-2 gap-4">
                            <label class="flex justify-end">
                                Ажилтаны код<span class="req">*</span>
                            </label>
                            <input type="text" required autocomplete="off"  class="border-1 rounded shadow"></input>
                        </div>
                        
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
                            Салбарын код<span class="req">*</span>
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
                            <div></div>
                            <button type="submit" class="bg-green-500 rounded-2xl w-40 py-1 text-white">Хадгалах</button>
                        </div>
                    
                    </form>
                </div> 
            </div>
        </div>
    </div>
</div>
@endsection