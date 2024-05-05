@extends('layout')

@section('content')
<div class="contain py-16">
    <div class="max-w-lg mx-auto shadow px-6 py-7 rounded overflow-hidden">
        <h2 class="text-2xl uppercase font-medium mb-6">Créer un compte</h2>

        <form action="{{url('/register')}}" method="post" autocomplete="off">
            @csrf
            <div class="space-y-2">
                <div>
                    <label for="name" class="text-gray-600 mb-2 block">Nom Prénom</label>
                    <input type="text" name="name" id="name" class="block w-full border border-gray-300 px-4 py-3 text-gray-600 text-sm rounded focus:ring-0 focus:border-primary placeholder-gray-400">
                </div>
                <div>
                    <label for="email" class="text-gray-600 mb-2 block">Email</label>
                    <input type="email" name="email" id="email" class="block w-full border border-gray-300 px-4 py-3 text-gray-600 text-sm rounded focus:ring-0 focus:border-primary placeholder-gray-400">
                </div>
                <div>
                    <label for="password" class="text-gray-600 mb-2 block">Mot de passe</label>
                    <input type="password" name="password" id="password" class="block w-full border border-gray-300 px-4 py-3 text-gray-600 text-sm rounded focus:ring-0 focus:border-primary placeholder-gray-400">
                </div>
            </div>
            <div class="mt-4">
                <button 
                    type="submit"
                    class="block w-full py-2 text-center text-white bg-primary border border-primary rounded hover:bg-transparent hover:text-primary transition uppercase font-roboto font-medium"
                >
                    Inscription
                </button>
            </div>
        </form>

        <p class="mt-4 text-center text-gray-600">Déjà un compte ? <a href="/login" class="text-primary">Connexion</a></p>
    </div>
</div>
@endsection