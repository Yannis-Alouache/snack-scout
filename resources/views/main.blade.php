@extends('layout')

@section('content')
<div id="slider-1" class="relative">
  <div class="bg-cover bg-center h-auto text-white py-[260px] px-10 object-fill brightness-50" style="background-image: url(https://www.japancandystore.com/cdn/shop/files/jcs-slide_sakura-snacks-2024-1_1728x.jpg?v=1710296954)"></div>
  <div class="container">
    <div class="absolute top-1/3 text-white">
        <p class="font-bold text-sm uppercase">Services</p>
        <p class="text-3xl font-bold">SnackScout</p>
        <p class="text-2xl mb-10 leading-none">Découvrez le monde, un snack à la fois.</p>
    </div> <!-- container -->
  </div>
  <br>
</div>

    <!-- features -->
    <div class="container py-16">
        <div class="w-10/12 grid grid-cols-1 md:grid-cols-3 gap-6 mx-auto justify-center">
            <div class="border border-primary rounded-sm px-3 py-6 flex justify-center items-center gap-5">
                <img src="{{ asset('assets/images/delivery-van.svg') }}" alt="Delivery" class="w-12 h-12 object-contain">
                <div>
                    <h4 class="font-medium capitalize text-lg">Livraison gratuite</h4>
                    <p class="text-gray-500 text-sm">+200€</p>
                </div>
            </div>
            <div class="border border-primary rounded-sm px-3 py-6 flex justify-center items-center gap-5">
                <img src="{{ asset('assets/images/money-back.svg') }}" alt="Delivery" class="w-12 h-12 object-contain">
                <div>
                    <h4 class="font-medium capitalize text-lg">Remboursement</h4>
                    <p class="text-gray-500 text-sm">Remboursement 30 jours</p>
                </div>
            </div>
            <div class="border border-primary rounded-sm px-3 py-6 flex justify-center items-center gap-5">
                <img src="{{ asset('assets/images/service-hours.svg') }}" alt="Delivery" class="w-12 h-12 object-contain">
                <div>
                    <h4 class="font-medium capitalize text-lg">24/7 Support</h4>
                    <p class="text-gray-500 text-sm">Service client</p>
                </div>
            </div>
        </div>
    </div>
    <!-- ./features -->

    <div class="container py-16">
        <h2 class="text-2xl font-medium text-gray-800 uppercase mb-6">Nos produits en promo</h2>
        <div class="grid grid-cols-5 gap-3">
            @foreach ($products as $product)
                <div class="bg-white shadow rounded overflow-hidden group">
                    <div class="relative">
                        <img src="{{ asset('storage/uploads/'.$product->image) }}"  alt="product 1" class="w-full">
                        <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center 
                        justify-center gap-2 opacity-0 group-hover:opacity-100 transition">
                            <a href="{{ '/product/'.$product->id }}"
                                class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                                title="view product">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </a>
                        </div>
                    </div>
                    <div class="pt-4 pb-3 px-4">
                        <a href="#">
                            <h4 class="uppercase font-medium text-xl mb-2 text-gray-800 hover:text-primary transition line-clamp-1">
                                {{$product->name}}
                            </h4>
                        </a>
                        <div class="flex items-baseline mb-1 space-x-2">
                            @if ($product->discount > 0)
                                <p class="text-xl text-primary font-semibold">{{ number_format($product->price * (100 - $product->discount) / 100, 2, '.', ',') }}€</p>
                                <p class="text-sm text-gray-400 line-through">{{ $product->price }}€</p>
                            @else
                                <p class="text-xl text-primary font-semibold">{{ $product->price }}€</p>
                            @endif
                            
                        </div>
                    </div>
                    <a href="{{ route('add.to.cart', ['id' => $product->id, 'quantity' => 1]) }}"
                        class="block w-full py-1 text-center text-white bg-primary border border-primary rounded-b hover:bg-transparent hover:text-primary transition">
                        Ajouter au panier
                    </a>
                </div>
            @endforeach
        </div>
    </div>


<!-- categories -->
<div class="container py-16">
  <h2 class="text-2xl font-medium text-gray-800 uppercase mb-6">Catégories</h2>
  <div class="grid grid-cols-3 gap-3">
    @foreach($categories as $category)
        <div class="relative rounded-sm overflow-hidden group">
          <img src={{ $category->image }} alt="category 1" class="w-full">
          <a 
            href="/products?category={{ $category->name }}"
            class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center text-xl text-white font-roboto font-medium group-hover:bg-opacity-60 transition"
          >
            {{ $category->name }}
          </a>
        </div>
    @endforeach
  </div>
</div>
<!-- ./categories -->
@endsection