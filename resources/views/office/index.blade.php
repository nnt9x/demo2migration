@extends('layout.master')

@section('title','Phòng ban')

@section('content')
    <div class="flex flex-col gap-2">
        <h1 class="text-2xl font-semibold">Danh sách phòng ban</h1>


        <a class="btn w-fit" href="{{route('office-create')}}">+ Thêm phòng ban</a>

        <table class="table border border-gray-300 table-zebra">
            <tr class="text-center bg-base-300">
                <th>STT</th>
                <th>Mã phòng</th>
                <th>Tên phòng ban</th>
                <th>Địa chỉ</th>
                <th>Mô tả</th>
                <th>Hành động</th>
            </tr>
            @forelse($offices as $row)
                <tr class="text-center">
                    <td>{{$loop->iteration}}</td>
                    <td>{{$row->id}}</td>
                    <td>
                        <a class="link link-primary" href="{{route('office-show',['id' => $row->id])}}">
                            {{$row->name}}
                        </a>
                    </td>
                    <td>{{$row->address}}</td>
                    <td>{{$row->description}}</td>
                    <td>
                        <div class="flex flex-row gap-2 justify-center">
                            <button class="btn btn-warning">Sửa</button>
                            <form onsubmit="return confirm('Bạn có chắc chắn muốn xoá?')" method="POST"
                                  action="/offices/delete">
                                @method("delete")
                                @csrf
                                <input name="id" hidden readonly value="{{$row->id}}">
                                <button type="submit" class="btn btn-error">Xoá</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Không có dữ liệu</td>
                </tr>
            @endforelse

        </table>
    </div>
@endsection
