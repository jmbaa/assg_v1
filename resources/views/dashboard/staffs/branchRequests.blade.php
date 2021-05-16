@extends('layouts.staffMaster')

@section('content')
<div class="p-20">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                
                <div class="gap-4 w-full px-10 py-1 border rounded">
                    <table  class="table-auto border-separate w-full">
                        <tr>
                            <th>Захиалгын дугаар</th>
                            <th>Хэрэглэгчийн нэр</th>
                            <th>Контент нэр</th>
                            <th>Төрөл</th>
                            <th>Төлбөр</th>
                            <th>Төлөв</th>
                            <th>Үлдсэн цаг</th>
                            <th></th>
                        </tr>
                        <tr>
                            <th>1</th>
                            <th>Batbold</th>
                            <th>Усанд шумба</th>
                            <th>DVD</th>
                            <th>5500₮</th>
                            <th>
                                <select name="books" id="book">
                                    <option value="booked">Захиалсан</option>
                                    <option value="ignored">Хударсан</option>
                                    <option value="started">Эхэлсэн</option>
                                    <option value="ended">Дууссан</option>
                                </select>
                            </th>
                            <th>12:09:12</th>
                            <th>
                                <form action="#">
                                    <button type="submit" class="bg-green-500 text-white hover:bg-green-200 px-2 py-1 rounded">Сунгах</button>
                                </form>
                            </th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection