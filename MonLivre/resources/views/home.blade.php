<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tailwind CSS Demo</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<style>
    .card:hover::after {
        bottom: 0;
        opacity: 1;
    }

    .card:active {
        transform: scale(0.98);
    }

    .card:active::after {
        content: "Added !";
        height: 50px;
    }

    .card::after {
        content: "Emprunter";
        padding-top: 1.25em;
        padding-left: 1.25em;
        position: absolute;
        left: 0;
        bottom: -60px;
        background: #00AC7C;
        color: #fff;
        height: 2.5em;
        width: 90%;
        transition: all 80ms;
        font-weight: 600;
        text-transform: uppercase;
        opacity: 0;
    }
</style>

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
                    <button class="bg-blue-400 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded"
                        type="submit">Logout</button>
                </form>
            </div>
        </div>
    </nav>
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold">Welcome, {{ Auth::user()->name }}</h1>
    </div>
    <div class="container mx-auto p-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($books as $book)
            <div class="card relative w-full h-auto shadow-lg cursor-pointer transition-all duration-120 flex flex-col items-center justify-center bg-white p-4 group">
                <span class="text-4xl">{{ $book->title }}</span>
                <span class="absolute left-2 bottom-10 font-sans text-sm font-normal text-black">{{ $book->id }}</span>
                <span class="absolute left-2 bottom-4 font-impact text-sm text-black">${{ $book->price }}</span>
                <span class="absolute left-2 top-2 font-sans text-sm font-normal text-gray-700">
                    By: {{ $book->author->name ?? 'Unknown Author' }}
                </span>
                <span class="card-after absolute left-0 bottom-[-20px] bg-[#00AC7C] text-white h-10 w-4/5 transition-all duration-80 font-semibold uppercase opacity-0 group-hover:bottom-0 group-hover:opacity-100 pt-2 pl-2">
                    Loan
                </span>
                <span class="absolute top-2 right-2 {{ $book->status ? 'bg-green-500' : 'bg-red-500' }} text-white h-6 w-6 flex items-center justify-center rounded-full">
                    {{ $book->available ? '✔' : '✖' }}
                </span>
            </div>
        @endforeach
    </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
</body>

</html>
