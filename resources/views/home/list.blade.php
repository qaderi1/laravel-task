@extends('layout.layout')
@section('main')
<h1>لیست مشتریان</h1>

<div class="container mt-5">
    <table class="table table-hover">
        <thead>
            <td>نام و نام خانوادگی</td>
            <td>شماره تماس مشتری</td>
            <td>شماره تماس گرفته شده توسط مشنری</td>
            <td>تاریخ آخرین تماس</td>
        </thead>

        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{$user->getFullName()}}</td>
                <td>{{$user->user_phone}}</td>
                <td>{{$user->getEndCall()->employee_phone ?? 'تماس نگرفته'}}</td>
                <td>{{$user->getEndCall()->created_at ?? 'تماس نگرفته'}}</td>
            </tr>
            @endforeach

        </tbody>


    </table>
</div>
@endsection