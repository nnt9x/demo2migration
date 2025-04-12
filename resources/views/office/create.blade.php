@extends('layout.master')

@section('title','Tạo phòng ban mới')

@section('content')
    <form method="POST">
        @csrf
        @method('POST')
        <div class="flex flex-col gap-2">
            <label class="input">
                Tên phòng ban:
                <input required name="officeName" type="text" class="grow" placeholder="không để trống"/>
            </label>

            <label class="input">
                Địa chỉ:
                <input required name="officeAddress" type="text" class="grow" placeholder="không để trống"/>
            </label>

            <fieldset class="fieldset">
                <legend class="fieldset-legend">Mô tả</legend>
                <textarea name="officeDescription" class="textarea h-24" placeholder="Mô tả"></textarea>
            </fieldset>
        </div>
        <button class="btn btn-primary">Tạo phòng ban</button>
    </form>
@endsection
