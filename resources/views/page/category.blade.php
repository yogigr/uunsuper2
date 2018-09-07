@extends('umaster')
@section('title', $category->name)
@section('breadcrumb')
<a href="{{ url('shop') }}">Shopping Page<i class="fa fa-caret-right" aria-hidden="true"></i></a>
<a href="#">{{ $category->name }}</a>
@endsection
@section('content')
<div class="row">
	@include('page.product-list')
	@include('page.sidebar-cat')
</div>
@endsection