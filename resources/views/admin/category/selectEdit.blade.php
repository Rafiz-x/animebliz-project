@php
    $namespace = 'category_edit';
@endphp

@extends('admin.layout')

@section('title', 'Select to Edit')

@section('name', 'admin.category.create')

@section('content')
    <div class="select_edit_category w-full sm:max-w-96 md:max-w-[450px] lg:max-w-[600px] xl:max-w-[800px] mx-auto text-white flex flex-col gap-5">
        <h1 class="text-center">Select a Category to Edit</h1>
        <select name="category_select w-full" id="category_select">
            <option value="">--Select--</option>
            @foreach ($categories as $category)
                <option value="{{ $category->slug }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>

@endsection
