@extends('layouts.frontend.app')

@section('title', 'Home')

@push('css')

@endpush

@section('content')



        <home-component :user="{{ Auth::check() ? Auth::user() : 'null' }}" :app_settings="{{ $app_settings }}"></home-component>


@endsection
