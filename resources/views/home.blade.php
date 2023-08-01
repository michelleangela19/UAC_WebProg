@extends('layout.master')
@section('judul') Job Friends @endsection
@section('content')
<div class="container mx-24 mt-10">
<div class="grid grid-cols-3">
    @foreach ($users as $user)
        <form action="/user/thumb" method="post">
            @csrf
            <input type="hidden" value="{{ $user->id }}" name="liked_id">
            <input type="hidden" value="{{auth()->user()->id}}" name="user_id">

            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow my-5">
                <a href="">
                    <img class="rounded-t-lg" src="{{ asset('storage/' . $user->image) }}" alt="" />
                </a>
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
