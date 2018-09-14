@extends('umaster')
@section('title', 'Kontak Kami')
@section('breadcrumb')
<a href="#">Kontak Kami</a>
@endsection
@section('content')
<div class="row">
	<div class="col" style="min-height: 300px">
		<address>
		    <b>{{ $company->name }}</b><br>
		    {{ $company->address }}<br>
		    {{ $company->city->type }} {{ $company->city->name }}, {{ $company->province->name }}, {{ $company->postal_code }}<br>
		    <i class="fa fa-mobile"></i> {{ $company->phone1 }} <br>
		    <i class="fa fa-envelope"></i> <a href="mailto:{{ $company->email }}">{{ $company->email }}</a><br>
            <a href="{{ $company->facebook }}" class="mr-2 text-secondary"><i class="fa fa-facebook"></i></a>
            <a href="{{ $company->twitter }}" class="mr-2 text-secondary"><i class="fa fa-twitter"></i></a>
            <a href="{{ $company->instagram }}" class="mr-2 text-secondary"><i class="fa fa-instagram"></i></a>
            <a href="{{ $company->google }}" class="mr-2 text-secondary"><i class="fa fa-google"></i></a>
		</address>
	</div>
</div>
@endsection