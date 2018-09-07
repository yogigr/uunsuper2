@extends('umaster')
@section('title', 'Shopping Page')
@section('breadcrumb')
<a href="#">Shopping Page</a>
@endsection
@section('content')
<div class="row">
	@include('page.product-list')
	@include('page.sidebar-cat')
</div>
@endsection