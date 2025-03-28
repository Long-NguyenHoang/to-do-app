<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    {{-- <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script> --}}
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @yield('style')
        .alert-success {
            color: green;
        }
    </style>
    <style type="text/tailwindcss">
        .btn {
            @apply bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500
        }
    </style>
</head>
<body>
    <h1>@yield('title')</h1>
    @if (session()->has('success'))
        <div class="alert alert-success">{{session()->get('success')}}</div>
    @endif
    @yield('content')
</body>
</html>
