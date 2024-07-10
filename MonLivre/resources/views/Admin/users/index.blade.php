@extends('layouts.default')
@section('content')

<div class="container mx-auto py-8">
    <h1 class="text-2xl font-bold mb-4">Loans</h1>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
            <thead class="bg-gray-200 text-gray-700 uppercase text-sm leading-normal">
                <tr>
                    <th class="py-3 px-6 text-left">User</th>
                    <th class="py-3 px-6 text-left">Book</th>
                    <th class="py-3 px-6 text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                @foreach ($loans as $loan)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6 text-left whitespace-nowrap">{{ $loan->user->name }}</td>
                        <td class="py-3 px-6 text-left">{{ $loan->book->name }}</td>
                        <td class="py-3 px-6 text-center">
                            <form action="{{ route('admin.users.returnBook', ['loanId' => $loan->id]) }}"
                                method="POST">
                                @csrf
                                <button type="submit"
                                    class="bg-blue-500 hover:bg-blue-700 text-white py-1 px-4 rounded">
                                    Return
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop