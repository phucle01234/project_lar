@php
    $user_info=DB::table('user')->orderby('id','DESC')->first();
@endphp
test demo
{{ $user_info->fullname }}