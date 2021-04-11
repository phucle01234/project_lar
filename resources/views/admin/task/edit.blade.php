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
                    <li class="breadcrumb-item"><a href="{{ route('cong-viec') }}">Công việc</a></li>
                    <li class="breadcrumb-item active">Cập nhật</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="content">
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form enctype="multipart/form-data" method="post" action="" id="form" class="form">
        @csrf
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Nội dung</h3>
                        </div>
                        {{--  <!-- /.card-header -->  --}}
                        <div class="card-body">
                            <div class="form-group">
                                <label for="auto_convert_name">Tên dự án<span class="text-red">(* Bắt buộc) </span></label>
                                <input type="text" name="name_da" value="{{ $info->name_da }}" class="form-control">
                                <span class="cus_help">Nhập tên. Tốt nhất là 60 ký tự</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Thông tin thêm</h3>
                        </div>
                        <div class="card-body ">
                            <div class="form-group">
								<label>Người phụ trách</label>
								<select class="form-control" name="nguoi_th">
                                    @foreach ($user_th as $row )
                                    <option value="{{ $row->id }}" {{ $info->user_id == $row->id?'selected':'' }}>{{ $row->fullname }}</option>
                                    @endforeach
								</select>
							</div>

                            <div class="form-group">
								<label>Status</label>
								<select class="form-control" name="status">
                                    <option value="active" {{ $info->status == 'active'?'selected':'' }}>active</option>
									<option value="unactive" {{ $info->status == 'unactive'?'selected':'' }}>unactive</option>
                                    <option value="delete" {{ $info->status == 'delete'?'selected':'' }}>delete</option>
								</select>
							</div>
                            <div class="timeline-footer">
                                <button type="submit" class="btn btn-danger">Cập nhật</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>
@endsection
