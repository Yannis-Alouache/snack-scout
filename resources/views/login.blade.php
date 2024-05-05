@extends('layout')

@section('content')
@if ($errors->has('email'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <span class="block sm:inline">{{ $errors->first('email') }}</span>
    </div>
@endif
<div class="contain py-16">
    <div class="max-w-lg mx-auto shadow px-6 py-7 rounded overflow-hidden">
        <h2 class="text-2xl uppercase font-medium mb-1">Connexion</h2>
        <p class="text-gray-600 mb-6 text-sm">
            C'est bon de vous revoir !
        </p>
        <form action="/signin" method="post" autocomplete="on">
            @csrf
            <div class="space-y-2">
                <div>
                    <label for="email" class="text-gray-600 mb-2 block">Email</label>
                    <input type="email" name="email" id="email" class="block w-full border border-gray-300 px-4 py-3 text-gray-600 text-sm rounded focus:ring-0 focus:border-primary placeholder-gray-400" placeholder="youremail.@domain.com">
                </div>
                <div>
                    <label for="password" class="text-gray-600 mb-2 block">Mot de passe</label>
                    <input type="password" name="password" id="password" class="block w-full border border-gray-300 px-4 py-3 text-gray-600 text-sm rounded focus:ring-0 focus:border-primary placeholder-gray-400" placeholder="*******">
                </div>
            </div>
            <div class="mt-6">
                <button type="submit" class="block w-full py-2 text-center text-white bg-primary border border-primary rounded hover:bg-transparent hover:text-primary transition uppercase font-roboto font-medium">Connexion</button>
            </div>
        </form>

        <p class="mt-4 text-center text-gray-600">
            Pas encore de compte ?
            <a href="/register" class="text-primary">
                Inscription
            </a>
        <p>
    </div>
</div>
@endsection