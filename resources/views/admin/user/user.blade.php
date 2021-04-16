@extends('admin.layout')
@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Quản trị viên <a href="{{ route('add') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-plus"></i> Thêm mới
                    </a>
                </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Bản điều khiển</a></li>
                    <li class="breadcrumb-item active">Ban quản trị</li>
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
                        <h3 class="card-title">Danh sách admin</h3>
                        <div class="card-tools">
                            <div class="input-group input-group-sm">
                                Tổng số: <b>{{  count($user) }}</b>
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
                                    <th>Họ và tên</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Giới tính</th>
                                    <th>Avatar</th>
                                    <th>Chức vụ</th>
                                    <th>status</th>
                                    <th>Tạo lúc</th>
                                    <th>Ngày cập nhật</th>
                                    <th style="width: 120px;">Hành động </th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($user as $row )
                                <tr class="row_">
                                    <td><input type="checkbox" name="id[]" value=""></td>
                                    <td>{{ $row->id }}</td>
                                    <td><samp style="color:red">{{ $row->fullname }}</samp></td>
                                    <td>{{ $row->email }}</td>
                                    <td>{{ $row->name }}</td>
                                    <td>{{ $row->gender == 0?'Nữ':'Nam' }}</td>
                                    <td>
                                        <div class="image_thumb">
                                            <img src="{{ url('/upload/'.$row->avatar) }}" height="50">
                                            <div class="clear"></div>
                                        </div>
                                    </td>
                                    {{--  ****upload list image  --}}
                                    {{--  @php
                                        $image = DB::table('list_avarta')->where('id_user',$row->id)->get();                   
                                    @endphp   
                                    <td>
                                        @foreach ($image as $k)
                                        <div class="image_thumb">
                                            <img src="{{ url('/upload/'.$k->images) }}" height="50">
                                            <div class="clear"></div>
                                        </div>
                                        @endforeach
                                    </td>  --}}
                                    <td>{{ $row->name_cv }}</td>

                                    @if ($row->status !='active')
                                        <td><samp style="color:red">{{ $row->status }}</samp></td>
                                    @else
                                        <td>{{ $row->status }}</td>
                                    @endif    
                                       
                                    <td>{{ $row->created_at }}</td>
                                    <td>{{ $row->updated_at }}</td>
                                    <td class="option textC">
                                        <a href="{{ route('edit', ['id'=>$row->id]) }}" class="btn btn-sm btn-social-icon btn-warning" title="Chỉnh sửa"><i class="fas fa-edit"></i></a>
                                        <a href="{{ route('delete',['id'=>$row->id]) }}" class="btn btn-sm btn-social-icon btn-danger btn_del_one" title="Xóa"><i class="fas fa-trash"></i></a>
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