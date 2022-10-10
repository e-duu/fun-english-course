@extends('layouts.dash')
@section('title')
  Fun English Course | User Pages
@endsection
@section('sub-title')
    List Users
@endsection
@push('before-style')
    @livewireStyles()
@endpush
@push('before-script')
    @livewireScripts()
@endpush
@section('content')
	@livewire('user-table')
@endsection