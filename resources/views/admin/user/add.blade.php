@extends('admin.layout')
@section('content')
<script src="{{asset('public/ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('public/ckfinder/ckfinder.js')}}"></script>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Quản trị viên<a href="" class="btn btn-primary btn-sm">
                        <i class="fas fa-plus"></i> Thêm mới
                    </a></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Bản điều khiển</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('user') }}">Quản trị viên</a></li>
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
    <form enctype="multipart/form-data" method="post" action="{{ route('postAdd') }}" id="form" class="form">
        @csrf
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Nội dung</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="form-group">
                                <label for="auto_convert_name">Email<span class="text-red">(* Bắt buộc) </span></label>
                                <input type="email" name="email" value="{{ old('email') }}" class="form-control" id="auto_convert_name">
                                <span class="cus_help">Nhập đúng định dạng email.</span>
                            </div>

                            <div class="form-group">
                                <label for="auto_convert_name">Họ và tên<span class="text-red">(* Bắt buộc) </span></label>
                                <input type="text" name="fullname" value="{{ old('fullname') }}" class="form-control" id="auto_convert_name">
                                <span class="cus_help">Nhập tên. Tốt nhất là 60 ký tự</span>
                            </div>

                            <div class="form-group">
                                <label for="upload" class="cus_tool">Avatar</label>
                                <div class="">
                                    <input type="file" class="form-control" name="upload" id="upload" size="25">
                                    {{--  <input type="file" class="form-control" name="upload[]" multiple  size="25">  --}}
                                    <div class="clear error" name="image_error"></div>
                                </div>
                                <span class="cus_help">Chọn ảnh kèm theo. Kích thước 600 x 400px</span>
                            </div>
                            
                            <div class="form-group">
                                <label>Password <span class="text-red">(* Bắt buộc) </span></label>
                                <input type="password" name="password" value="" class="form-control" placeholder="Nhập password">
                            </div>
                            <div class="form-group">
                                <label>Nhập lại password <span class="text-red">(* Bắt buộc) </span></label>
                                <input type="password" name="password_confirmation" value="" class="form-control" placeholder="Nhập lại password">
                            </div>
                        </div>
                    </div>
                </div>
                {{-- {{ dd($data) }} --}}
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Thông tin thêm</h3>
                        </div>
                        <div class="card-body ">
                            <div class="form-group">
                                <label for="param_cat">Vai trò</label>
                                <div class="">
                                    <select class="form-control" name="role">
                                        @foreach ($role as $row )
                                        <option value="{{ $row->id }}" {{ old('role') == $row->id?'selected':'' }}>{{ $row->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
								<label>Chức vụ</label>
								<select class="form-control" name="cv">
                                    @foreach ($cv as $row )
                                    <option value="{{  $row->id }}" {{ old('cv') == $row->id?'selected':'' }}>{{  $row->name_cv }}</option>
                                    @endforeach
								</select>
							</div>

                            <div class="form-group">
								<label>Giới tính</label>
								<select class="form-control" name="gender">
									<option value="1" {{ old('gender') == 1?'selected':'' }}>Nam</option>
									<option value="0" {{ old('role') == 0?'selected':'' }}>Nữ</option>
								</select>
							</div>

                            <div class="form-group">
								<label>Status</label>
								<select class="form-control" name="status">
									<option value="active" {{ old('status') == 'active'?'selected':'' }}>active</option>
									<option value="unactive" {{ old('status') == 'unactive'?'selected':'' }}>unactive</option>
                                    <option value="deleted" {{ old('status') == 'delete'?'selected':'' }}>delete</option>
								</select>
							</div>
                            <textarea rows="10" name="description" placeholder='Description' id="description"class='form-control'> </textarea>
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

<script>
    CKEDITOR.replace('description', {
    filebrowserBrowseUrl: "{{asset('public/ckfinder/ckfinder.html')}}",
    filebrowserUploadUrl: "{{asset('public/ckfinder/core/connector/php/connector.php?command=QuickUpload&amp;type=Files')}}"});
</script>
@endsection
