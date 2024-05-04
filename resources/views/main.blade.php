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


<!-- categories -->
<div class="container py-16">
  <h2 class="text-2xl font-medium text-gray-800 uppercase mb-6">shop by category</h2>
  <div class="grid grid-cols-3 gap-3">
    <div class="relative rounded-sm overflow-hidden group">
      <img src="https://picsum.photos/200/" alt="category 1" class="w-full">
      <a href="#" class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center text-xl text-white font-roboto font-medium group-hover:bg-opacity-60 transition">Bedroom</a>
    </div>
    <div class="relative rounded-sm overflow-hidden group">
      <img src="https://picsum.photos/200/" alt="category 1" class="w-full">
      <a href="#" class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center text-xl text-white font-roboto font-medium group-hover:bg-opacity-60 transition">Mattrass</a>
    </div>
    <div class="relative rounded-sm overflow-hidden group">
      <img src="https://picsum.photos/200/" alt="category 1" class="w-full">
      <a href="#" class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center text-xl text-white font-roboto font-medium group-hover:bg-opacity-60 transition">Outdoor
      </a>
    </div>
    <div class="relative rounded-sm overflow-hidden group">
      <img src="https://picsum.photos/200/" alt="category 1" class="w-full">
      <a href="#" class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center text-xl text-white font-roboto font-medium group-hover:bg-opacity-60 transition">Sofa</a>
    </div>
    <div class="relative rounded-sm overflow-hidden group">
      <img src="https://picsum.photos/200/" alt="category 1" class="w-full">
      <a href="#" class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center text-xl text-white font-roboto font-medium group-hover:bg-opacity-60 transition">Living
        Room</a>
    </div>
    <div class="relative rounded-sm overflow-hidden group">
      <img src="https://picsum.photos/200/" alt="category 1" class="w-full">
      <a href="#" class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center text-xl text-white font-roboto font-medium group-hover:bg-opacity-60 transition">Kitchen</a>
    </div>
  </div>
</div>
<!-- ./categories -->
@endsection