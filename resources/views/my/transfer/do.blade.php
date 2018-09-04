@extends('my.main')

@section('header')
  @parent
@endsection

@section('navbar')
  @parent
@endsection

@section('content')
  @include('my.transfer.transfer_form')
@endsection

@section('footer')
  @parent
@endsection