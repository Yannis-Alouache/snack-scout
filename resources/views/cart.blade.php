@extends('layout')

@section('content')

@php
    $total = 0;
@endphp
@if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Succès!</strong>
        <span class="block sm:inline">{{ session('success') }}</span>
    </div>
@endif

@if(session('error'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Erreur!</strong>
        <span class="block sm:inline">{{ session('error') }}</span>
    </div>
@endif

<section class="py-24 relative">
    <div class="w-full max-w-7xl px-4 md:px-5 lg-6 mx-auto">

        <h2 class="title font-manrope font-bold text-4xl leading-10 mb-8 text-center text-black">
            Panier
        </h2>
        <div class="hidden lg:grid grid-cols-2 py-6">
            <div class="font-normal text-xl leading-8 text-gray-500">Produit</div>
            <p class="font-normal text-xl leading-8 text-gray-500 flex items-center justify-between">
                <span class="w-full max-w-[260px] text-center">Quantité</span>
                <span class="w-full max-w-[200px] text-center">Total</span>
            </p>
        </div>

        @if(session('cart'))
            @foreach(session('cart') as $id => $product)
            <div class="grid grid-cols-1 lg:grid-cols-2 min-[550px]:gap-6 border-t border-gray-200 py-6">
                <div
                    class="flex items-center flex-col min-[550px]:flex-row gap-3 min-[550px]:gap-6 w-full max-xl:justify-center max-xl:max-w-xl max-xl:mx-auto">
                    <div class="img-box"><img src="{{ asset('storage/uploads/'.$product["image"]) }}"
                            alt="perfume bottle image" class="xl:w-[140px]"></div>
                    <div class="pro-data w-full max-w-sm ">
                        <h5 class="font-semibold text-xl leading-8 text-black max-[550px]:text-center">
                            {{ $product['name'] }}
                        </h5>
                        <p
                            class="font-normal text-lg leading-8 text-gray-500 my-2 min-[550px]:my-3 max-[550px]:text-center">
                            {{ $product['category'] }}
                        </p>
                        <h6 class="font-medium text-lg leading-8 text-indigo-600  max-[550px]:text-center">
                            {{ number_format($product["price"] * (100 - $product["discount"]) / 100, 2, '.', ',') }}€
                        </h6>
                    </div>
                </div>

                <div class="flex items-center flex-col min-[550px]:flex-row w-full max-xl:max-w-xl max-xl:mx-auto gap-2">
                    <div class="flex items-center w-full mx-auto justify-center">
                        <a href="{{ route('cart.decrease', $id) }}" class="px-4 py-2 text-black border rounded">-</a>
                        <input type="text" value="{{ $product['quantity'] }}" readonly class="text-center w-12 px-4 py-2 text-black border rounded">
                        <a href="{{ route('cart.increase', $id) }}" class="px-4 py-2 text-black border rounded">+</a>
                    </div>
                    <h6 class="text-indigo-600 font-manrope font-bold text-2xl leading-9 w-full max-w-[176px] text-center">
                        {{ number_format($product["price"] * (100 - $product["discount"]) / 100 * $product['quantity'], 2, '.', ',') }}€
                    </h6>
                </div>
            </div>

            @php
                $subTotal = $product["price"] * (100 - $product["discount"]) / 100 * $product['quantity'];
                $total += $subTotal;
            @endphp

            @endforeach
        @else
            <h2 class="text-center text-xl py-6">Aucun article dans votre panier</h2>
        @endif

        <form action="{{ route('coupon.apply') }}" method="POST" class="mb-6">
            @csrf
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input type="text" name="coupon" id="coupon"
                    class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Coupon de réduction" required />
                <button type="submit"
                    class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Appliquer</button>
            </div>
        </form>

        <div class="bg-gray-50 rounded-xl p-6 w-full mb-8 max-lg:max-w-xl max-lg:mx-auto">
            <div class="flex items-center justify-between w-full mb-6">
                <p class="font-normal text-xl leading-8 text-gray-400">Sub Total</p>
                <h6 class="font-semibold text-xl leading-8 text-gray-900">{{ $total }}€</h6>
            </div>
            @if(session('reduction'))
                <div class="flex items-center justify-between w-full mb-6">
                    <p class="font-normal text-xl leading-8 text-gray-400">Réduction</p>
                    <h6 class="font-semibold text-xl leading-8 text-green-700">{{ session('reduction') }}%</h6>
                </div>
                <div class="flex items-center justify-between w-full py-6">
                    <p class="font-manrope font-medium text-2xl leading-9 text-gray-900">Total</p>
                    <h6 class="font-manrope font-medium text-2xl leading-9 text-indigo-500">{{ $total - (($total * session('reduction')) / 100) }}€</h6>
                </div>
            @else
                <div class="flex items-center justify-between w-full py-6">
                    <p class="font-manrope font-medium text-2xl leading-9 text-gray-900">Total</p>
                    <h6 class="font-manrope font-medium text-2xl leading-9 text-indigo-500">{{ $total }}€</h6>
                </div>
            @endif
        </div>
        <div class="flex items-center flex-col sm:flex-row justify-center gap-3 mt-8">
            <a href="/checkout"
                class="rounded-full w-full max-w-[280px] py-4 text-center justify-center items-center bg-indigo-600 font-semibold text-lg text-white flex transition-all duration-500 hover:bg-indigo-700">Continue
                to Payment
                <svg class="ml-2" xmlns="http://www.w3.org/2000/svg" width="23" height="22" viewBox="0 0 23 22"
                    fill="none">
                    <path d="M8.75324 5.49609L14.2535 10.9963L8.75 16.4998" stroke="white" stroke-width="1.6"
                        stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </a>
        </div>
    </div>
</section>



@endsection