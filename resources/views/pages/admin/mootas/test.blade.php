@extends('layouts.dash')
@section('title')
  Fun English Course | Test Moota
@endsection
@section('sub-title')
  Moota Tests
@endsection

@section('content')
  <div class="container">
    @foreach ($bank as $item)
        {{ $item }}
    @endforeach
  </div>
@endsection
