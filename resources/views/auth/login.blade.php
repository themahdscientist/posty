@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-4/12 rounded-lg bg-white p-6">
            @if (session('status'))
                <div class="mb-6 rounded-lg bg-red-500 p-3 text-center text-white">
                    {{ session('status') }}
                </div>
            @endif
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="mb-4">
                    <label for="email" class="sr-only">Email</label>
                    <input type="email" name="email" id="email" placeholder="An Email Address"
                        class="@error('email') border-red-500 @enderror w-full rounded-lg border-2 bg-gray-100 p-4"
                        value="{{ old('email') }}" required>
                    @error('email')
                        <div class="mt-2 text-sm text-red-500">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" name="password" id="password" placeholder="Choose a password"
                        class="@error('password') border-red-500 @enderror w-full rounded-lg border-2 bg-gray-100 p-4"
                        required>
                    @error('password')
                        <div class="mt-2 text-sm text-red-500">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <div class="flex items-center">
                        <input type="checkbox" name="remember" id="remember" class="mr-2">
                        <label for="remember">Remember me</label>
                        @error('remember')
                            <div class="mt-2 text-sm text-red-500">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div>
                    <button type="submit"
                        class="w-full rounded bg-green-500 px-4 py-3 font-medium text-white">Login</button>
                </div>
            </form>
        </div>
    </div>
@endsection
