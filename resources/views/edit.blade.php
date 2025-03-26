@extends('layouts.app')
@section('title', 'Edit Task')
@section('style')
    .alert-danger {
        color: red;
    }
@endsection
@section('content')
    <form action="{{route('tasks.update', ['id'=>$task->id])}}" method="post">
        @csrf
        @method('put')
        <label for="title">Title</label>
        <input type="text" name="title" id="title" value="{{$task->title}}">
        @error('title')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror
        <label for="description">Description</label>
        <input type="text" name="description" id="description" value="{{$task->description}}">
        @error('description')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror
        <label for="long_description">Long Description</label>
        <input type="text" name="long_description" id="long_description" value="{{$task->long_description}}">
        @error('long_description')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror
        <button type="submit">Update</button>
    </form>
@endsection
