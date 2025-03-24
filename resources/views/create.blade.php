@extends('layouts.app')
@section('title', 'Create Task')
@section('style')
    .alert-danger {
        color: red;
    }
@endsection
@section('content')
    <form action="{{route('tasks.create')}}" method="post">
        @csrf
        <label for="title">Title</label>
        <input type="text" name="title" id="title">
        @error('title')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror
        <label for="description">Description</label>
        <input type="text" name="description" id="description">
        @error('description')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror
        <label for="long_description">Long Description</label>
        <input type="text" name="long_description" id="long_description">
        @error('long_description')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror
        <button type="submit">Create</button>
    </form>
@endsection
