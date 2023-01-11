@extends('landing.admin.template.master')

@section('konten')

@if(Session::has('success'))
<div id="flash" data-flash="{{session('success')}}"></div>
@endif

<div class="card">
	<div class="m-4">
	    <a href="{{ route('carousel.create') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus mr-2"></i>Tambah Promo untuk Ditampilkan</a>
    </div>
          
    <div class="mb-4 ml-4 mr-4">
        @livewire('search-pagination-carousel')
    </div>
 
</div>
@livewireScripts
@endsection