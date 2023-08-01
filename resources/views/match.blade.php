@extends('layout.master')
@section('content')
<div class="container mx-24 mt-10">
    <div class="grid grid-cols-4">
        @if (!$listLikes)
            <h2>
                No Data Available!
            </h2>
        @else
            @foreach ($listLikes as $listlike)
                <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow my-5 p-8">
                    <img class="rounded-t-lg object-cover w-full h-64" src="{{ asset('storage/storage/'.$listlike->image)}}" alt="" />
                    <div class="">
                        <h1 class="text-2xl">
                            {{$listlike->name}}
                        </h1>
                        <h1 class="text-2xl">
                            {{$listlike->email}}
                        </h1>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>
@endsection
