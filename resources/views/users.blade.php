@extends('components.app')
@section('main')
    @php
        $color_active = 'hover:bg-blue-100 hover:text-blue-700 border-gray-700 bg-gray-700 text-white';
        $color_default = 'bg-gray-800 border-gray-700 text-gray-400 hover:bg-gray-700 hover:text-white';
    @endphp
    <div class="flex justify-between items-center  mt-10">
        <h1 class="text-3xl text-white font-semibold ">Lista de usuarios</h1>
        <a href="/"
            class="px-5 py-2 rounded-lg bg-[#F12B20]  items-center transition-all hover:bg-[#b12d26] text-white font-bold text-xl">
            <span class="text-2xl"> &#8249;</span> Volver
        </a>
    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg  mt-10">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3 ">
                        Product name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        User name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        User name
                    </th>
                    <th scope="col" class="px-12 py-3 flex justify-end">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($table['data'] as $user)
                    <tr class="border-b bg-[#ffffff11] transition-all  border-gray-700  hover:bg-gray-600 cursor-default">
                        <td class="px-6 py-4">
                            <img src="{{ $user['avatar'] }}" alt="user" class="rounded-full w-[50px] h-[50px]">
                        </td>
                        <td class="px-6 py-4 text-[#cfcdcd]">
                            {{ $user['first_name'] }} {{ $user['last_name'] }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $user['email'] }}
                        </td>

                        <td class="px-6 py-4 flex justify-end">
                            <a href="/user/{{ $user['id'] }}"
                                class="px-2 py-1 rounded-lg transition-all flex justify-between bg-[#f0f0f02a] hover:bg-[#5e5e5e] text-white text-md">
                                <div>
                                    Analizar
                                </div>
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="w-[20px] h-[20px] mt-[2px] ml-1 text-[#F12B20]  stroke-[#F12B20]"
                                        viewBox="0 0 24 24" id="right-arrow">
                                        <path fill="#F12B20"
                                            d="M15.54,11.29,9.88,5.64a1,1,0,0,0-1.42,0,1,1,0,0,0,0,1.41l4.95,5L8.46,17a1,1,0,0,0,0,1.41,1,1,0,0,0,.71.3,1,1,0,0,0,.71-.3l5.66-5.65A1,1,0,0,0,15.54,11.29Z">
                                        </path>
                                    </svg>
                                </div>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-5 flex justify-center">
            <nav aria-label="Page navigation example">
                <ul class="flex items-center -space-x-px h-8 text-sm">
                    <li>
                        <a href="users?page={{ $table['page'] == 1 ? '1' : $table['page'] - 1 }}"
                            class="flex items-center justify-center px-3 h-8 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                            <span class="sr-only">Previous</span>
                            <svg class="w-2.5 h-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 1 1 5l4 4" />
                            </svg>
                        </a>
                    </li>
                    @for ($page = 1; $page <= $table['total_pages']; $page++)
                        <li>
                            <a href="users?page={{ $page }}"
                                class="flex items-center justify-center px-3 h-8 leading-tight border {{ request()->get('page') == $page ? $color_active : $color_default }}">{{ $page }}</a>
                        </li>
                    @endfor
                    <li>
                        <a href="users?page={{ $table['page'] == $table['total_pages'] ? $table['total_pages'] : $table['page'] + 1 }}"
                            class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-r-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                            <span class="sr-only">Next</span>
                            <svg class="w-2.5 h-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 9 4-4-4-4" />
                            </svg>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
@endsection
