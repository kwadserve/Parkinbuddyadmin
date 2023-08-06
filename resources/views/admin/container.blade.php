@extends('admin')
@section('container')
<div class="content">
    <input type="hidden" id="mainUrl" value="<?php echo url('/'); ?>" />
    @yield('content')
</div>
@endsection