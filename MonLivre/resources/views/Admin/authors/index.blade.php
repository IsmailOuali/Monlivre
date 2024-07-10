@extends('layouts.default')
@section('content')
    <h1 class="text-3xl text-black pb-6">I am the Autors dashboard</h1>


    <div>
        <div class="flex items-center justify-center p-12">
            <div class="mx-auto w-full max-w-[550px] bg-white">
                <form action="{{ route('admin.authors.store') }}" method="POST">

                    @csrf
                    <div class="-mx-3 flex flex-wrap">
                        <div class="w-full px-3 sm:w-1/2">
                            <div class="mb-5">
                                <label for="aName" class="mb-3 block text-base font-medium text-[#07074D]">
                                    Nom de auteur
                                </label>
                                <input type="text" name="name" id="aName" placeholder="Nom d'auteur"
                                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                            </div>
                        </div>
                    </div>
                    <div>
                        <button type="submit"
                            class="hover:shadow-form bg-blue-300 rounded-md  py-3 px-8 text-center text-base font-semibold text-white outline-none">
                            Submit
                        </button>
                    </div>
                </form>

                <table class="table w-1/2">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach ($authors as $author)
                            <tr>
                                <td>{{ $author->id }}</td>
                                <td>{{ $author->name }}</td>
                                <td>{{ $author->created_at }}</td>
                                <td>
                                    <form action="{{ route('admin.authors.destroy', $author->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn bg-red-700 underline">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@stop
