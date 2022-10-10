@extends('layouts.dash')
@section('title')
  Fun English Course | Program Detail
@endsection
@section('sub-title')
  Detail Students
@endsection
@push('before-style')
    @livewireStyles()
@endpush
@push('before-script')
    @livewireScripts()
@endpush
@section('content')
{{-- {{ dd($data) }} --}}
  @livewire('student-table', ['data' => $data])
@endsection
