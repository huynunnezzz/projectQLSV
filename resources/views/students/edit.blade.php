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
    <div class="card-header text-center text-uppercase text-success">
        Sửa sinh viên
    </div>
    <div class="card-body">
        <form action="{{route('students.update',$student->StudentID)}}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="StudentName">Mã sinh viên</label>
                <input type="text" class="form-control" name="StudentName" id="" aria-describedby="helpId" placeholder="" value="{{$student->StudentID}}" disabled>
            </div>
            <div class="form-group">
                <label for="StudentName">Tên sinh viên</label>
                <input type="text" class="form-control" name="StudentName" id="" aria-describedby="helpId" placeholder="" value="{{$student->StudentName}}" required>
            </div>
            <div class="form-group">
                <label for="StudentName">Email</label>
                <input type="email" class="form-control" name="StudentEmail" id="" aria-describedby="helpId" placeholder="" value="{{$student->StudentEmail}}" required>
            </div>
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
            <div class="form-group">
                <label for="">Chọn lớp: </label>
                <select class="form-control" name="ClassRoomID" id="ClassRoomID">
                    @foreach ($classrooms as $value)
                    <option value=" {{$value->ClassRoomID}} ">{{$value->ClassRoomName}}</option>
                    @endforeach
                </select>
            </div>
            <div class="text-center">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modelId">Cập nhật</button>
                <a name="" id="" class="btn btn-secondary" href="{{route('students.index')}}" role="button">Quay lại</a>

                <!-- Modal -->
                <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Thông báo sửa</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="container-fluid">
                                    Bạn chắc chắn đồng ý sửa?
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Cập nhật</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Quay lại</button>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    $('#exampleModal').on('show.bs.modal', event => {
                        var button = $(event.relatedTarget);
                        var modal = $(this);
                    });
                </script>

            </div>
        </form>

    </div>
</div>
@endsection('content')