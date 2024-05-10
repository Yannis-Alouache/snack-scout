@extends('layout')

@section('content')
@if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Succès!</strong>
        <span class="block sm:inline">{{ session('success') }}</span>
    </div>
@endif

@error('card-number')
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Erreur !</strong>
        <span class="block sm:inline">Format carte bancaire invalide !</span>
    </div>
@enderror
@error('cvv')
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Erreur!</strong>
        <span class="block sm:inline">Format Cvv invalide</span>
    </div>
@enderror
@error('date')
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Erreur!</strong>
        <span class="block sm:inline">Format date invalide !</span>
    </div>
@enderror


<div class="max-w-sm mx-auto mt-10 mb-10 bg-white rounded-md shadow-md overflow-hidden">
    <div class="px-6 py-4 bg-gray-900 text-white">
        <h1 class="text-lg font-bold">Carte Bleu</h1>
    </div>
    <div class="px-6 py-4">
        <form action="{{ route('checkout.process') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="card-number">
                    Numéro de carte
                </label>
                <input
                    name="card-number"
                    class="appearance-none border border-gray-400 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="card-number" type="text" placeholder="**** **** **** ****">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="expiration-date">
                    Date d'expiration
                </label>
                <input
                    name="date"
                    class="appearance-none border border-gray-400 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="expiration-date" type="text" placeholder="MM/YYYY">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="cvv">
                    CVV
                </label>
                <input
                    name="cvv"
                    class="appearance-none border border-gray-400 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="cvv" type="text" placeholder="***">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="cvv">
                    Nom
                </label>
                <input
                    name="name"
                    class="appearance-none border border-gray-400 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    type="text" placeholder="Nom complet">
            </div>

            <button type="submit" class="bg-rose-500 hover:bg-blue-600 text-white font-bold py-2 mt-3 px-4 rounded-full">
                Payer
            </button>
        </form>
    </div>
</div>
@endsection