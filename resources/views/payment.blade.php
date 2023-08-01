@extends('layout.master')
@section('judul') Payment Page @endsection
@section('content')
<div class="bg-grey-lighter min-h-screen flex flex-col">
    <div class="container max-w-sm mx-auto flex-1 flex flex-col items-center justify-center px-2">
        <div class="bg-white px-6 py-8 rounded shadow-md text-black w-full">
            <h1 class="mb-8 text-3xl text-center">Payment</h1>

            <form action="/payment/{{ $user->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                <h1 class="">
                    Registration Price: {{ $randomPrice }}
                </h1>

                @if(Session()->has('statusMessage'))
                    <h2 class="text-red-500 text-center">
                        {{ Session()->get('statusMessage') }}
                    </h2>
                @endif
                <input type="number" class="block border border-grey-light w-full p-3 rounded mb-4" name="amountPay"
                    placeholder="Enter Amount" required />

                <input type="hidden" name="price" value="{{ $randomPrice }}">

                <button type="submit"
                    class="w-full text-center bg-green-400 py-3 rounded-md text-white hover:bg-blue-400">
                    Pay
                </button>
            </form>


            @if(Session()->has('statusMessage') && strpos(Session::get('statusMessage'), 'Sorry') !== false)
                <div class="flex gap-5 my-5">
                    <form action="/wallet" method="post">
                        @csrf
                        <input type="hidden" value="{{ $sisa }}" name="sisa">
                        <input type="hidden" value="{{$user->id}}" name="id">

                        <button type="submit"
                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg">
                            Yes
                        </button>
                    </form>

                    <form action="/payment" method="post">
                        @csrf
                        <button type="submit"
                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg">
                            No
                        </button>
                    </form>
                </div>
            @endif
        </div>
    </div>
@endsection
