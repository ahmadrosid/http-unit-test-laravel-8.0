<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Give me a Cats</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 sm:items-center py-4 sm:pt-0">

            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 text-center py-6">
                <h1 class="text-7xl font-bold text-gray-700">Get a Cat!</h1>
                <div class="flex justify-center py-8">
                    <a href="/?action=get">
                        <button class="shadow bg-green-400 py-2 px-6 text-white rounded font-semibold">Get Random Cat</button>
                    </a>
                </div>
                @if(isset($img))
                <div class="flex justify-center py-8">
                    <img src="{{ $img }}" />
                </div>
                @endif
            </div>
        </div>
    </body>
</html>
