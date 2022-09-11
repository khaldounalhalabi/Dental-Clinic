@include('include.header')
@include('include.sidebar')

@yield('content')


@if(isset($message))
    @include('include.message')
@endif


@if(isset($server_error))
    @include('include.ServerError')
@endif


@include('include.footer')
