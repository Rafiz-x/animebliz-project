@php
    $namespace = 'genre_edit';
@endphp

@extends('admin.layout')

@section('title', 'Select to Edit')

@section('name', 'admin.genre.create')

@section('content')
    <div class="select_edit_genre w-full sm:max-w-96 md:max-w-[450px] lg:max-w-[600px] xl:max-w-[800px] mx-auto text-white flex flex-col gap-5">
        <h1 class="text-center">Select a Genre to Edit</h1>
        <select name="genre_select w-full" id="genre_select">
            <option value="">--Select--</option>
            @foreach ($genres as $genre)
                <option value="{{ $genre->slug }}">{{ $genre->name }}</option>
            @endforeach
        </select>
    </div>

@endsection
