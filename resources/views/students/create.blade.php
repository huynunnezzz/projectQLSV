@extends('students.layouts.master')
@section('content')
@if ($errors->any())
<div class="alert alert-danger" role="alert">
    <ul>
        @foreach ($errors->all() as $error)
        <li> {{$error}} </li>
        @endforeach
    </ul>
</div>
@endif
<div class="card">
    <div class="card-header">
        Thêm sinh viên
    </div>
    <div class="card-body">
        <form action="{{route('students.store')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="StudentName">Tên sinh viên</label>
                <input type="text" class="form-control" name="StudentName" id="" aria-describedby="helpId" placeholder="" required>
            </div>
            <div class="form-group">
                <label for="StudentName">Email</label>
                <input type="email" class="form-control" name="StudentEmail" id="" aria-describedby="helpId" placeholder="" required>
            </div>
            <div class="form-group">
                <div class="form-group">
                    <label for="">Giới tính:</label>
                    <div class="form-check form-check-inline ml-3">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="StudentGender" id="StudentGender" value="0" checked>
                            <label class="form-check-label" for="male">Nam</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="StudentGender" id="StudentGender" value="1">
                            <label class="form-check-label" for="StudentGender">Nữ</label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="">Chọn lớp: </label>
                <select class="form-control" name="ClassRoomID" id="ClassRoomID">
                    @foreach ($classrooms as $value)
                    <option value=" {{$value->ClassRoomID}} ">{{$value->ClassRoomName}}</option>
                    @endforeach
                </select>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Thêm</button>
                <a name="" id="" class="btn btn-secondary" href="{{route('students.index')}}" role="button">Quay lại</a>
            </div>
        </form>

    </div>
</div>
@endsection('content')