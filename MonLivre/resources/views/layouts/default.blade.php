<!doctype html>
<html>

<head>
    @include('includes.head')
</head>

<body class="bg-gray-100 font-family-karla flex">
    @include('includes.aside')
    <div class="relative w-full flex flex-col h-screen overflow-y-hidden">
        @include('includes.header')
        <div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
            <main class="w-full flex-grow p-6">
                @yield('content')
            </main>
            @include('includes.footer')
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"
        integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
</body>

</html>
