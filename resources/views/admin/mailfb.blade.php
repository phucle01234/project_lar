@php
    $user_info=DB::table('user')->orderby('id','DESC')->first();
@endphp
<p>Chào Admin chúng tối đã đã thêm {{ $user_info->fullname }} với vai trò quản trị viên. Hệ thống sẽ lưu lại quyên của user này. Thank!</p>