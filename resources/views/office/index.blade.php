@extends('layout.master')

@section('title','Phòng ban')

@section('content')
    <div class="flex flex-col gap-2" x-data="{officeId: '', officeName: '', officeAddress: '', officeDescription: ''}">
        <h1 class="text-2xl font-semibold">Danh sách phòng ban</h1>

        <a class="btn w-fit" href="{{route('office-create')}}">+ Thêm phòng ban</a>


        <dialog id="edit_modal" class="modal">
            <div class="modal-box">
                <button type="button" onclick="edit_modal.close()"
                        class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕
                </button>

                <form method="POST">
                    @csrf
                    @method('PUT')
                    <h3 class="text-lg font-bold my-3">Cập nhật phòng ban</h3>
                    <div class="flex-col flex gap-2">
                        <label class="input w-full">
                            <b>Mã phòng ban:</b>
                            <input readonly name="officeId" x-model="officeId" type="text" class="grow"
                                   placeholder="không để trống"/>
                        </label>

                        <label class="input w-full">
                            <b>Tên phòng ban:</b>
                            <input name="officeName" x-model="officeName" type="text" class="grow"
                                   placeholder="không để trống"/>
                        </label>

                        <label class="input w-full">
                            <b>Địa chỉ:</b>
                            <input name="officeAddress" x-model="officeAddress" type="text" class="grow"
                                   placeholder="không để trống"/>
                        </label>

                        <fieldset class="fieldset w-full">
                            <legend class="fieldset-legend"><b>Mô tả</b></legend>
                            <textarea name="officeDescription" x-model="officeDescription" class="textarea h-24 w-full"
                                      placeholder="Mô tả"></textarea>
                        </fieldset>

                        <div class="flex justify-between">
                            <button type="button" x-on:click="officeName='';officeAddress='';officeDescription=''" class="btn btn-error">Đặt lại</button>
                            <button class="btn btn-primary" type="submit">Cập nhật</button>
                        </div>
                    </div>
                </form>

            </div>
        </dialog>

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
                            <button class="btn btn-warning"
                                    x-on:click="officeId='{{$row->id}}';officeName='{{$row->name}}';officeAddress='{{$row->address}}';officeDescription='{{$row->description}}';edit_modal.showModal()">
                                Sửa
                            </button>
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
