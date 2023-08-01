@extends('layout.master')
@section('judul') Job Friends @endsection
@section('content')
<div class="container mx-24 mt-10">
<div class="grid grid-cols-4">
    @foreach ($users as $user)
        <form action="/user/thumb" method="post">
            @csrf

            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow my-5">
                <img class="rounded-t-lg" src="{{ asset('storage/' . $user->image) }}" alt="" />

                <div class="p-5">
                    <h1 class="text-2xl">
                        {{ $user->name }}
                    </h1>
                    <h1 class="text-2xl">
                        {{ $user->gender }}
                    </h1>

                    <button type="submit"
                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg">
                        Thumb
                    </button>
                </div>
            </div>
        </form>
    @endforeach
</div>
</div>

@endsection
