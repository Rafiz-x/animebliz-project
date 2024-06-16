@php
    $namespace = 'dashboard';
@endphp

@extends('admin.layout')

@section('title', 'Dashboard')

@section('name', 'admin.dashboard')

@section('content')

    <div class="dashboard">
        <div class="total flex items-center justify-center gap-3 flex-wrap font-semibold md:text-lg xl:text-xl text-white">
            <div class="drop-shadow-md genres px-4 py-6 rounded-xl bg-indigo-600 text-white">
                <span>Total Genre : {{ $totalGenre }} </span>
            </div>
            <div class="drop-shadow-md categories px-4 py-6 rounded-xl bg-purple-700 text-white">
                <span>Total Category : {{ $totalCategory }} </span>
            </div>
            <div class="drop-shadow-md posts px-4 py-6 rounded-xl bg-emerald-700 text-white">
                <span>Total Post : {{ $totalPost }} </span>
            </div>
        </div>
    </div>

@endsection
