@extends('umaster')
@section('title', 'Tentang Kami')
@section('breadcrumb')
<a href="#">Tentang Kami</a>
@endsection
@section('content')
<div class="row">
	<div class="col" style="min-height: 300px">
		<h3 class="text-heading">Tentang {{ $company->name }}</h3>
		<p class="sample-text">{{ $company->description }}</p>
	</div>
</div>
@endsection