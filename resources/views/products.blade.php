@extends('layout')

@section('content')
     <!-- breadcrumb -->
     <div class="container py-4 flex items-center gap-3">
        <a href="/" class="text-primary text-base">
            <i class="fa-solid fa-house"></i>
        </a>
        <span class="text-sm text-gray-400">
            <i class="fa-solid fa-chevron-right"></i>
        </span>
        <p class="text-gray-600 font-medium">Shop</p>
    </div>
    <!-- ./breadcrumb -->

    <!-- shop wrapper -->
    <div class="container grid md:grid-cols-4 grid-cols-2 gap-6 pt-4 pb-16 items-start">
        <!-- sidebar -->
        <!-- drawer init and toggle -->
        <div class="text-center md:hidden" >
            <button
                class="text-white hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 block md:hidden"
                type="button" data-drawer-target="drawer-example" data-drawer-show="drawer-example"
                aria-controls="drawer-example">
                <ion-icon name="grid-outline"></ion-icon>
            </button>
        </div>

  <!-- drawer component -->
<div id="drawer-example" class="fixed top-0 left-0 z-40 h-screen p-4 overflow-y-auto transition-transform -translate-x-full bg-white w-80 dark:bg-gray-800" tabindex="-1" aria-labelledby="drawer-label">
    <h5 id="drawer-label" class="inline-flex items-center mb-4 text-base font-semibold text-gray-500 dark:text-gray-400"><svg class="w-5 h-5 mr-2" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>Info</h5>
    <button type="button" data-drawer-hide="drawer-example" aria-controls="drawer-example" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" >
       <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
       <span class="sr-only">Close menu</span>
    </button>
    <div class="divide-y divide-gray-200 space-y-5">
        <div>
            <h3 class="text-xl text-gray-800 mb-3 uppercase font-medium">Categories</h3>
            <div class="space-y-2">
                @foreach($categories as $category)
                    <div class="flex items-center">
                        <input type="checkbox" name="cat-1" id="cat-1"
                            class="text-primary focus:ring-0 rounded-sm cursor-pointer"
                            @if(request()->has('category') && request()->category == $category->name) checked @endif
                        >
                        <label for="cat-1" class="text-gray-600 ml-3 cusror-pointer">{{ $category->name }}</label>
                        <div class="ml-auto text-gray-600 text-sm">(15)</div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="pt-4">
            <h3 class="text-xl text-gray-800 mb-3 uppercase font-medium">Price</h3>
            <form action="{{ url()->current() }}" method="GET">
                <div class="mt-4 flex items-center">
                    <input type="text" name="min" id="min"
                        class="w-full border-gray-300 focus:border-primary rounded focus:ring-0 px-3 py-1 text-gray-600 shadow-sm"
                        placeholder="min" value="{{ request('min') }}">
                    <span class="mx-3 text-gray-500">-</span>
                    <input type="text" name="max" id="max"
                        class="w-full border-gray-300 focus:border-primary rounded focus:ring-0 px-3 py-1 text-gray-600 shadow-sm"
                        placeholder="max" value="{{ request('max') }}">
                </div>
                <button class="mt-4 w-full bg-primary text-white px-8 rounded-md py-2" type="submit">Filtrer</button>
            </form>
        </div>
    </div>
    <div class="grid grid-cols-2 gap-4">
       <a href="#" class="px-4 py-2 text-sm font-medium text-center text-gray-900 bg-white border border-gray-200 rounded-lg focus:outline-none hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Learn more</a>
       <a href="#" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Get access <svg class="w-4 h-4 ml-2" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg></a>
    </div>
 </div>

        <!-- ./sidebar -->
        <div class="col-span-1 bg-white px-4 pb-6 shadow rounded overflow-hiddenb hidden md:block">
            <div class="divide-y divide-gray-200 space-y-5">
                <div>
                    <h3 class="text-xl text-gray-800 mb-3 uppercase font-medium">Categories</h3>
                    <div class="space-y-2">
                        @foreach($categories as $category)
                            <div class="flex items-center">
                                <input type="checkbox" name="cat-1" id="cat-1"
                                    class="text-primary focus:ring-0 rounded-sm cursor-pointer"
                                    @if(request()->has('category') && request()->category == $category->name) checked @endif
                                    onclick="updateUrl('{{ $category->name }}')"
                                >
                                <label for="cat-1" class="text-gray-600 ml-3 cusror-pointer">{{ $category->name }}</label>
                                <!-- <div class="ml-auto text-gray-600 text-sm">(15)</div> -->
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="pt-4">
                    <h3 class="text-xl text-gray-800 mb-3 uppercase font-medium">Price</h3>
                    <form action="{{ url()->current() }}" method="GET">
                        <div class="mt-4 flex items-center">
                            <input type="text" name="min" id="min"
                                class="w-full border-gray-300 focus:border-primary rounded focus:ring-0 px-3 py-1 text-gray-600 shadow-sm"
                                placeholder="min" value="{{ request('min') }}">
                            <span class="mx-3 text-gray-500">-</span>
                            <input type="text" name="max" id="max"
                                class="w-full border-gray-300 focus:border-primary rounded focus:ring-0 px-3 py-1 text-gray-600 shadow-sm"
                                placeholder="max" value="{{ request('max') }}">
                        </div>
                        <button class="mt-4 w-full bg-primary text-white px-8 rounded-md py-2" type="submit">Filtrer</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- products -->
        <div class="col-span-3">
            <div class="grid md:grid-cols-3 grid-cols-2 gap-6">
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

        <!-- ./products -->
    </div>
    <!-- ./shop wrapper -->


    <script>
    function updateUrl(category) {
        const urlParams = new URLSearchParams(window.location.search);
        const currentCategory = urlParams.get('category');
        
        if (currentCategory === category) {
            // Désélectionne la catégorie si elle est déjà sélectionnée
            urlParams.delete('category');
        } else {
            // Remplace la catégorie actuellement sélectionnée par la nouvelle catégorie
            urlParams.set('category', category);
        }
        
        window.location.search = urlParams.toString();
    }
</script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
    <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>

@endsection