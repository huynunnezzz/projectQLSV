@extends('students.layouts.master')
@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success" role="alert">
    <strong>{{$message}}</strong>
</div>
@endif
@if ($message = Session::get('error'))
<div class="alert alert-danger" role="alert">
    <strong>{{$message}}</strong>
</div>
@endif
<div class="container mt-5">
    <div class="text-primary mt-3 mb-4 text-center">
        <h1><b>Quản lý sinh viên</b></h1>
    </div>
</div>
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col col-md-6">
                <a name="" id="" class="btn btn-success btn-sm fload-end" href="{{ route('students.create') }}" role="button">Thêm sinh viên mới</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Mã sinh viên</th>
                    <th>Tên sinh viên</th>
                    <th>Địa chỉ</th>
                    <th>Giới tính</th>
                    <th>Lớp</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @if (count($students)>0)
                @foreach ($students as $row)
                <tr>
                    <td scope="row"> {{$row->StudentID}} </td>
                    <td>{{$row->StudentName}}</td>
                    <td>{{$row->StudentEmail}}</td>
                    <td>@if ($row->StudentGender==0) Nam @else Nữ @endif</td>
                    <td> {{$row->Classroom->ClassRoomName}} </td>
                    <td>

                        <a name="" id="" class="btn btn-primary btn-sm" href=" {{route('students.show',$row->StudentID)}} " role="button">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye-off align-middle me-2">
                                <path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path>
                                <line x1="1" y1="1" x2="23" y2="23"></line>
                            </svg>
                        </a>
                        <a name="" id="" class="btn btn-warning btn-sm" href="{{route('students.edit',$row->StudentID)}}" role="button">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit align-middle me-2">
                                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                            </svg></a>

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger btn-sm  " data-toggle="modal" data-target="#modelId">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 align-middle me-2">
                                <polyline points="3 6 5 6 21 6"></polyline>
                                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                <line x1="10" y1="11" x2="10" y2="17"></line>
                                <line x1="14" y1="11" x2="14" y2="17"></line>
                            </svg>
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Thông báo xóa</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="container-fluid">
                                            Bạn chắc chắn xóa?
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <form action="{{route('students.destroy',$row->StudentID)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Xóa</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Không</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <script>
                            $('#exampleModal').on('show.bs.modal', event => {
                                var button = $(event.relatedTarget);
                                var modal = $(this);
                                // Use above variables to manipulate the DOM

                            });
                        </script>
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="5" class="text-center">No Data Found</td>
                </tr>
                @endif

            </tbody>
        </table>

    </div>
</div>
@endsection