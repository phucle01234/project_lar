<!DOCTYPE html>
<html>
    <head>
        @include('admin.head')   
    </head>
    <body class="hold-transition sidebar-mini">
        <div class="wrapper">
            @include('admin.left')

            @include('admin.header')

            {{--  content  --}}
            <div class="content-wrapper">
                @yield('content')
            </div>
            {{--  end content   --}}

            @include('admin.footer')
        </div>
        {{--  ./wrapper  --}}
        @include('admin.srcipt')
    </body>
</html>
