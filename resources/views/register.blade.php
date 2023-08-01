@extends('layout.master')
@section('content')
    <!-- component -->

    <script>
        function displayPhoto() {
            const image = document.querySelector('#file-upload');
            const previewed = document.querySelector('.img-preview');
            const preview = document.querySelector('#Preview');

            preview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                previewed.src = oFREvent.target.result
            }
        }
    </script>

    <div class="bg-grey-lighter min-h-screen flex flex-col">
        <div class="container max-w-sm mx-auto flex-1 flex flex-col items-center justify-center px-2">
            <div class="bg-white px-6 py-8 rounded shadow-md text-black w-full">
                <h1 class="mb-8 text-3xl text-center">Register</h1>

                <form action="/register" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="text" class="block border border-grey-light w-full p-3 rounded mb-4" name="name"
                        placeholder="Full Name" required />
                    @error('name')
                        <h1 class="text-red-500">
                            {{ $message }}
                        </h1>
                    @enderror

                    <input type="email" class="block border border-grey-light w-full p-3 rounded mb-4" name="email"
                        placeholder="Email" required />
                    @error('email')
                        <h1 class="text-red-500">
                            {{ $message }}
                        </h1>
                    @enderror

                    <input type="password" class="block border border-grey-light w-full p-3 rounded mb-4" name="password"
                        placeholder="Password" required />
                    @error('password')
                        <h1 class="text-red-500">
                            {{ $message }}
                        </h1>
                    @enderror


                    <input type="text" class="block border border-grey-light w-full p-3 rounded mb-4" name="linkedIn"
                        placeholder="LinkedIn" required />
                    @error('linkedIn')
                        <h1 class="text-red-500">
                            {{ $message }}
                        </h1>
                    @enderror

                    <input type="number" class="block border border-grey-light w-full p-3 rounded mb-4" name="phone"
                        placeholder="Phone Number" required />
                    @error('phone')
                        <h1 class="text-red-500">
                            {{ $message }}
                        </h1>
                    @enderror


                    <div class="my-4">
                        <input type="radio" name="gender" id="L" value="Male" required>
                        <label for="L">Male</label>
                        <input type="radio" name="gender" id="P" value="Female" required>
                        <label for="P">Female</label>
                    </div>
                    @error('gender')
                        <h1 class="text-red-500">
                            {{ $message }}
                        </h1>
                    @enderror

                    Select your work interest: <br>
                    <label class="dropdown-item">
                        <input type="checkbox" name="interest[]" value="1"> Business
                    </label>
                    <label class="dropdown-item">
                        <input type="checkbox" name="interest[]" value="2"> Health
                    </label>
                    <label class="dropdown-item">
                        <input type="checkbox" name="interest[]" value="3"> Nature
                    </label>
                    <label class="dropdown-item">
                        <input type="checkbox" name="interest[]" value="4"> Science
                    </label>
                    <label class="dropdown-item">
                        <input type="checkbox" name="interest[]" value="5"> Social
                    </label>
                    <label class="dropdown-item">
                        <input type="checkbox" name="interest[]" value="6"> Economy
                    </label>

                    @error('interest')
                        <h1 class="text-red-500">
                            {{ $message }}
                        </h1>
                    @enderror
                    
                    <input
                        class="block my-4 w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50"
                        id="file-upload" required onchange="displayPhoto()" type="file" name="image">

                    <p id="Preview" class="font-black hidden">Photo Preview :</p>
                    <img src="" alt="" class="img-preview mb-4 object-cover w-full">
                    @error('image')
                        <h1 class="text-red-500">
                            {{ $message }}
                        </h1>
                    @enderror

                    {{-- <h1 class="">
                        Registration Price: {{ $randomPrice }}
                    </h1>
                    <input type="hidden" name="random_price" value="{{ $randomPrice }}"> --}}

                    <button type="submit"
                        class="w-full text-center bg-green-400 py-3 rounded-md text-white hover:bg-blue-400">
                        Create Account
                    </button>
                </form>

                <div class="text-grey-dark mt-6">
                    Already have an account?
                    <a class=" no-underline border-b border-blue text-blue-500 hover:underline" href="../login/">
                        Log in
                    </a>.
                </div>
            </div>
        </div>
    @endsection
