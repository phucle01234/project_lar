@extends('admin.layout')
@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Phòng ban <a href="{{ route('addPhongban') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-plus"></i> Thêm mới
                    </a>
                </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Bản điều khiển</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('phong-ban') }}">Phòng ban</a></li>
                    <li class="breadcrumb-item active">Thêm</li>
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
    <form enctype="multipart/form-data" method="post" action="{{ route('postAddPhongban') }}" id="form" class="form">
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
                                <label for="auto_convert_name">Nhập tên phòng<span class="text-red">(* Bắt buộc) </span></label>
                                <input type="text" name="name_pb" value="{{ old('name_pb') }}" class="form-control">
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
								<label>Status</label>
								<select class="form-control" name="status">
									<option value="active" {{ old('status') == 'active'?'selected':'' }}>active</option>
									<option value="unactive" {{ old('status') == 'unactive'?'selected':'' }}>unactive</option>
                                    <option value="deleted" {{ old('status') == 'delete'?'selected':'' }}>delete</option>
								</select>
							</div>
                            <div class="timeline-footer">
                                <button type="submit" class="btn btn-danger">Thêm mới</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>
@endsection
