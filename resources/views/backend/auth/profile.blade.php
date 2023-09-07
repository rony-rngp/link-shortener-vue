@extends('layouts.backend.app')

@section('title', 'Profile Setting')

@section('content')

<profile-component :admin="{{ Auth::guard('admin')->user() }}"></profile-component>

@endsection
