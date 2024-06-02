@extends('students.layouts.master')
@section('content')
<div class="container">
<h1 class="text-center text-uppercase text-success"><b>Thông tin sinh viên chi tiết</b></h1>
</div>
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col col-md-2">
                <a name="" id="" class="btn btn-primary btn-sm fload-end" href="{{ route('students.index') }}" role="button">Xem tất cả danh sách</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row mb-3">
            <label for="" class="col-sm-2 col-label-form"><b>Tên sinh viên: </b></label>
            <div class="col-sm-10">{{$student->StudentName}}</div>
        </div>
        <div class="row mb-3">
            <label for="" class="col-sm-2 col-label-form"><b>Email:</b></label>
            <div class="col-sm-10">{{$student->StudentEmail}}</div>
        </div>
        <div class="row mb-3">
            <label for="" class="col-sm-2 col-label-form"><b>Giới tính:</b></label>
            <div class="col-sm-10">@if ($student->StudentGender==0) Nam @else Nữ
            @endif</div>
        </div>
        <div class="row mb-3">
            <label for="" class="col-sm-2 col-label-form"><b>Lớp học: </b></label>
            <div class="col-sm-10">{{$student->Classroom->ClassRoomName}}</div>
        </div>
        <a name="" id="" class="btn btn-secondary" href="{{route('students.index')}}" role="button">Quay lại</a>

    </div>
</div>
@endsection