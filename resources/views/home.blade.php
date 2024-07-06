@extends('layouts.app')


@section('content')
    @livewire('home-body', ['user' => $user])
@endsection
