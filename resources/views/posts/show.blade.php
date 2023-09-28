@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-10/12 rounded-lg bg-white p-6">
            <x-post :post="$post" />
        </div>
    </div>
@endsection
