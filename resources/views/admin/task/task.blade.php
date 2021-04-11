@extends('admin.layout')
@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Công việc <a href="{{ route('addTask') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-plus"></i> Thêm mới
                    </a>
                </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Bản điều khiển</a></li>
                    <li class="breadcrumb-item active">Công viêc</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Danh sách thực hiện công việc</h3>
                        <div class="card-tools">
                            <div class="input-group input-group-sm">
                                Tổng số: <b>{{  count($task) }}</b>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr class="hed" role="row">
                                    <th style="width:21px;"></th>
                                    <th>id</th>
                                    <th>Tên Công việc</th>
                                    <th>Người phụ trách</th>
                                    <th>status</th>          
                                    <th>Tạo lúc</th>
                                    <th>Ngày cập nhật</th>
                                    <th style="width: 120px;">Hành động </th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($task as $row )
                                <tr class="row_">
                                    <td><input type="checkbox" name="id[]" value=""></td>
                                    <td>{{ $row->id }}</td>
                                    <td>{{ $row->name_da }}</td>                                               
                                    <td>{{ $row->fullname }}</td>
                                    <td>{{ $row->status }}</td>
                                    <td>{{ $row->created_at }}</td>
                                    <td>{{ $row->updated_at }}</td>
                                    <td class="option textC">
                                        <a href="{{ route('editTack', ['id'=>$row->id]) }}" class="btn btn-sm btn-social-icon btn-warning" title="Chỉnh sửa"><i class="fas fa-edit"></i></a>
                                        <a href="{{ route('deleteTask', ['id'=>$row->id]) }}" class="btn btn-sm btn-social-icon btn-danger btn_del_one" title="Xóa"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <div class="card-header">
                            <button type="button" class="btn btn-sm btn-danger btn_del_all" url="">Xóa hết</button>
                            <ul class="pagination pagination-sm m-0 float-right">
                                <li class="page-item"><a class="page-link" href="#">«</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">»</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection