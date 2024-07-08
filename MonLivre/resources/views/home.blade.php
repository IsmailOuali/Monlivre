<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tailwind CSS Demo</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
    <nav class="bg-gray-200 p-4">
        <div class="container mx-auto flex justify-between items-center">
            <a class="text-xl font-bold" href="#">Navbar</a>
            <div class="block lg:hidden">
                <button class="text-gray-700 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
            </div>
            <div class="hidden lg:flex lg:items-center lg:w-auto w-full">
                <ul class="flex flex-col lg:flex-row list-none lg:ml-auto">
                    <li class="nav-item">
                        <a class="px-3 py-2 flex items-center text-sm uppercase font-bold leading-snug text-gray-700 hover:opacity-75"
                            href="#">Home</a>
                    </li>
                </ul>
                <form action="{{ route('logout') }}" method="POST" class="ml-auto">
                    @csrf
                    @method('DELETE')
                    <button class="bg-red-500 text-white font-bold py-2 px-4 rounded" type="submit">Logout</button>
                </form>
            </div>
        </div>
    </nav>
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold"> Welcome, {{ Auth::user()->name }}</h1>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
</body>

</html>
