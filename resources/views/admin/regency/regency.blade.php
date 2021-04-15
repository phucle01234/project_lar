@extends('admin.layout')
@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Chức vụ <a href="{{ route('addChucvu') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-plus"></i> Thêm mới
                    </a>
                </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Bản điều khiển</a></li>
                    <li class="breadcrumb-item active">Chức vụ</li>
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
                        <h3 class="card-title">Danh sách chức vụ</h3>
                        <div class="card-tools">
                            <div class="input-group input-group-sm">
                                Tổng số: <b>{{  count($regency) }}</b>
                            </div>
                        </div>
                    </div>
                     {{--  /.card-header   --}}
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr class="hed" role="row">
                                    <th style="width:21px;"></th>
                                    <th>id</th>
                                    <th>Tên chức vụ</th>
                                    <th>Phòng ban</th>
                                    <th>status</th>
                                    <th>Tạo lúc</th>
                                    <th>Ngày cập nhật</th>
                                    <th style="width: 120px;">Hành động </th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($regency as $row )
                                <tr class="row_">
                                    <td><input type="checkbox" name="id[]" value=""></td>
                                    <td>{{ $row->id }}</td>
                                    <td>{{ $row->name_cv }}</td>                                  
                                    <td>{{ $row->name_pb }}</td>                  
                                    <td>{{ $row->status }}</td>
                                    <td>{{ $row->created_at }}</td>
                                    <td>{{ $row->updated_at }}</td>
                                    <td class="option textC">
                                        <a href="{{ route('editChucvu', ['id'=>$row->id]) }}" class="btn btn-sm btn-social-icon btn-warning" title="Chỉnh sửa"><i class="fas fa-edit"></i></a>
                                        <a href="{{ route('deleteChucvu', ['id'=>$row->id]) }}" class="btn btn-sm btn-social-icon btn-danger btn_del_one" title="Xóa"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <div class="card-header">
                            <button type="button" class="btn btn-sm btn-danger btn_del_all" url="">Xóa hết</button>
                            {{ $regency->links('admin.paginate') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection()