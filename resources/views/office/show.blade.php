@extends('layout.master')

@section('title','Chi tiết phòng ban')

@section('content')
    <div class="flex flex-col gap-2">
        <p class="text-2xl">Phòng ban: {{$office->name}}</p>
        <p class="text-lg">Mô tả: {{$office->description}}</p>
        <hr/>

        <p>Danh sách nhân viên</p>
        <p>Bổ sung thêm....</p>
    </div>
@endsection
