@extends('layouts.adminMaster')

@section('content')
<div class="p-20">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Кино нэмэх') }}</div>
                
                <div class="mr-80 ml-16 my-4">
                    <form action="addNewMovie" method="POST" enctype="multipart/form-data" class="space-y-4 border-1 rounded shadow-2xl py-10 px-20">

                    @csrf

                    @if ( Session::get('success'))
                    <div class="bg-green-200 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
                        <div class="flex">
                            <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
							    {{ Session::get('success')}}
                        </div>
                    </div>
					@endif

					@if ( Session::get('error'))
                    <div class="bg-red-200 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
                        <div class="flex">
                            <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
							    {{ Session::get('error')}}
                        </div>
                    </div>
					@endif             

                    <div class="grid grid-cols-2 gap-4">
                        <label class="flex justify-end">
                            Киноны нэр<span class="req">*</span>
                        </label>
                        <input name="name" type="text" required autocomplete="off"  class="border-1 rounded shadow" value="{{ old('name') }}"></input>
                    </div>
                    
                    <div class="grid grid-cols-2 gap-4">
                        <label class="flex justify-end">
                            Зохиолч<span class="req">*</span>
                        </label>
                        <input name="author" type="text" required autocomplete="off" class="border-1 rounded shadow" value="{{ old('author') }}"></input>
                    </div>
                    
                    <div class="grid grid-cols-2 gap-4">
                        <label class="flex justify-end">
                            Продюсер<span class="req">*</span>
                        </label>
                        <input name="producer" type="text" required autocomplete="off" class="border-1 rounded shadow"  value="{{ old('producer') }}"></input>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <label class="flex justify-end">
                            Киноны төрөл<span class="req">*</span>
                        </label>
                        <select name="genre">
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
                        <label class="flex justify-end">
                            Үргэлжлэх хугацаа<span class="req">*</span>
                        </label>
                        <input name="durTime" type="text" required autocomplete="off"  class="border-1 rounded shadow"  value="{{ old('durTime') }}"></input>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <label class="flex justify-end">
                            Постер зураг<span class="req">*</span>
                        </label>
                        <input name="image" type="file" required autocomplete="off"  class="border-1 rounded shadow"></input>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <label class="flex justify-end">
                            Бүтээгдэхүүний төрөл<span class="req">*</span>
                        </label>
                        <select name="cd_type">
                            <option value="dvd">  DVD - 4500₮</option>
                            <option value="cd"> CD - 4000₮</option>
                            <option value="bd"> BD - 4200₮</option>
                        </select>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <label class="flex justify-end">
                            Трэйлер линк<span class="req">*</span>
                        </label>
                        <input name="trailer" type="text" required autocomplete="off"  class="border-1 rounded shadow"  value="{{ old('trailer') }}"></input>
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
@endsection
