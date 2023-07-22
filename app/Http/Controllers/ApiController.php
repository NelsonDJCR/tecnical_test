<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Http;


class ApiController extends Controller
{
    public function getUser($id): View
    {
        $user = $this->fetchGetCharacters($id);
        return view('user', compact('user'));
    }

    function getUsers(): View
    {
        $page =  request()->get('page') ?? 1;
        $table = $this->fetchGetCharacter($page);

        return view('users', compact('table'));
    }

    function fetchGetCharacters($id): Array
    {
        $user = Http::get("https://reqres.in/api/users/$id");
        return $user->json();
    }
    function fetchGetCharacter($page): Array
    {
        $table = Http::get("https://reqres.in/api/users?page=$page");
        return $table->json();
    }
}
