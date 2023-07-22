@extends('components.app')
@section('main')
    <div class="flex justify-between items-center  mt-10">
        <h1 class="text-3xl text-white font-semibold ">User information </h1>
        <a href="/users?page=1"
            class="px-5 py-2 rounded-lg bg-[#F12B20]  items-center transition-all hover:bg-[#b12d26] text-white font-bold text-xl">
            <span class="text-2xl"> &#8249;</span> Back
        </a>
    </div>

    <div class="mt-10">
        
        <img src="{{ $user['data']['avatar'] }}" class="rounded-xl w-[100px]  h-[100px] object-cover">
        <p class="text-gray-400 text-xl mt-2">First name: {{ $user['data']['first_name'] }}</p>
        <p class="text-gray-400 text-xl mt-2">Last name: {{ $user['data']['last_name'] }}</p>
        <p class="text-gray-400 text-xl mt-2">Email: {{ $user['data']['email'] }}</p>

    </div>
@endsection
