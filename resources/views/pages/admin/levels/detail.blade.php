@extends('layouts.dash')
@section('title')
  Fun English Course | Level Detail
@endsection
@section('sub-title')
  Detail Levels - {{ $data->name }}
@endsection
@push('before-style')
    @livewireStyles()
@endpush
@push('before-script')
    @livewireScripts()
@endpush
@section('content')
  @livewire('level-table', ['data' => $data])
@endsection