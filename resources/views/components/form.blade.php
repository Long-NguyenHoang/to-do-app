@extends('layouts.app')
@section('title', isset($task) ? 'Edit Task' : 'Create Task')
@section('style')
    .alert-danger {
        color: red;
    }
@endsection
@section('content')
    <form class="w-full max-w-sm" action="{{isset($task) ? route('tasks.update', ['id'=>$task->id]) : route('tasks.store')}}" method="post">
        @csrf
        @if (isset($task))
            @method('put')
        @endif
        <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="title">Title</label>
            </div>
            <div class="md:w-2/3">
                <input class="btn" type="text" name="title" id="title" value="{{old('title'), $task->title ?? ''}}">
            </div>
        </div>
        @error('title')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror
        <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="description">Description</label>
            </div>
            <div class="md:w-2/3">
                <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" type="text" name="description" id="description" value="{{old('description'), $task->description ?? ''}}">
            </div>
        </div>
        @error('description')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror
        <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="long_description">Long Description</label>
            </div>
            <div class="md:w-2/3">
                <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" type="text" name="long_description" id="long_description" value="{{old('long_description'), $task->long_description ?? ''}}">
            </div>
        </div>
        @error('long_description')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror
        <div class="md:flex md:items-center">
            <div class="md:w-1/3"></div>
            <div class="md:w-2/3">
              <button class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                {{isset($task) ? 'Update' : 'Create'}}
              </button>
            </div>
        </div>
    </form>
@endsection
