@extends('layouts.app')

@section('title', 'To do app')

@section('content')
    <div class="inline-flex">
        <a class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-l rounded-r" href="{{route('tasks.create')}}">+ Create</a>
    </div>
    <table class="border-collapse border border-gray-400">
        <thead>
            <tr>
                <th class="border border-gray-300">ID</th>
                <th class="border border-gray-300">Title</th>
                <th class="border border-gray-300">Status</th>
                <th class="border border-gray-300">Action</th>
            </tr>
        </thead>
        <tbody>
            @if (count($tasks) > 0)
            @foreach ($tasks as $task)
                <tr>
                    <td class="border border-gray-300">{{$task->id}}</td>
                    <td class="border border-gray-300">{{$task->title}}</td>
                    <td class="border border-gray-300">{{$task->completed==true?'COMPLETED':'UNCOMPLETED'}}</td>
                    <td class="border border-gray-300">
                        <div class="inline-flex">
                            <form action="{{route('tasks.toggle-completed', ['id'=>$task->id])}}" method="post">
                                @csrf
                                @method('put')
                                <button class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-l rounded-r" type="submit">{{$task->completed?'UNCOMPLETED':'COMPLETED'}}</button>
                            </form>
                            <a class="bg-blue-400 hover:bg-blue-800 text-white font-bold py-2 px-4 rounded-l rounded-r" href="{{route('tasks.detail', ['id'=>$task->id])}}">Detail</a>
                            <a class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-l rounded-r" href="{{route('tasks.edit', ['id'=>$task->id])}}">Edit</a>
                            <form action="{{route('tasks.delete', ['id'=>$task->id])}}" method="post">
                                @csrf
                                @method('delete')
                                <button class="bg-red-400 hover:bg-red-800 text-white font-bold py-2 px-4 rounded-l rounded-r" type="submit">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            @else
                <tr>
                    <td colspan="5">No task found</td>
                </tr>
            @endif
        </tbody>


    </table>
    @if ($tasks->count())
        <nav class="mt-4">{{$tasks->links()}}</nav>
    @endif
@endsection
