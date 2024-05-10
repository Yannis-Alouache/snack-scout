@extends('layout')

@section('content')
    @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Erreur !</strong>
            <span class="block sm:inline">{{ session('error') }}</span>
        </div>
    @endif

    <div class="container py-4 flex items-center gap-3">
        <a href="/" class="text-primary text-base">
            <i class="fa-solid fa-house"></i>
        </a>
        <span class="text-sm text-gray-400">
            <i class="fa-solid fa-chevron-right"></i>
        </span>
        <p class="text-gray-600 font-medium">Product</p>
    </div>
    <!-- ./breadcrumb -->

    <!-- product-detail -->
    <div class="container grid grid-cols-2 gap-6">
        <div>
            <img src="{{ asset('storage/uploads/'.$product->image) }}" alt="product" class="w-full">
        </div>

        <div>
            <h2 class="text-3xl font-medium uppercase mb-10">{{ $product->name }}</h2>
            <div class="space-y-2">
                <p class="text-gray-800 font-semibold space-x-2">
                    <span>Quantité disponible: </span>
                    <span class="text-green-600">{{ $product->stock }}</span>
                </p>
                <p class="space-x-2">
                    <span class="text-gray-800 font-semibold">Catégorie: </span>
                    <span class="text-gray-600">{{ $product->category }}</span>
                </p>
            </div>
            <div class="flex items-baseline mb-1 space-x-2 font-roboto mt-4">
                <p class="text-xl text-primary font-semibold">{{ number_format($product->price * (100 - $product->discount) / 100, 2, '.', ',') }}€</p>
                @if ($product->discount > 0)
                    <p class="text-base text-gray-400 line-through">{{ number_format($product->price, 2, ".", ",") }}€</p>
                @endif
            </div>

            <p class="mt-4 text-gray-600">{{ $product->description }}</p>



            <div class="custom-number-input h-10 w-32 mt-4">
                <label for="custom-input-number" class="w-full text-gray-700 text-sm font-semibold">Quantité
                </label>
                <div class="flex flex-row h-10 w-full rounded-lg relative bg-transparent mt-1">
                    <button data-action="decrement" class=" bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-l cursor-pointer outline-none">
                    <span class="m-auto text-2xl font-thin">−</span>
                    </button>
                    <input id="quantityInput" type="number" min="1" value="1" class="outline-none focus:outline-none text-center w-full bg-gray-300 font-semibold text-md hover:text-black focus:text-black  md:text-basecursor-default flex items-center text-gray-700  outline-none" name="custom-input-number"></input>
                <button data-action="increment" class="bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-r cursor-pointer">
                    <span class="m-auto text-2xl font-thin">+</span>
                </button>
            </div>
        
            <div class="w-[400px] mt-10">
                <a href="javascript:void(0);" onclick="addToCartWithQuantity()" class="mt-4 bg-primary hover:bg-secondary text-white font-bold py-2 px-4 rounded cursor-pointer">
                    Ajouter au panier
                </a>
            </div>
        </div>
    </div>
    
    <!-- ./product-detail -->

    <!-- description -->
    <div class="container pb-16 pt-10">
        <h3 class="border-b border-gray-200 font-roboto text-gray-800 pb-3 font-medium">Product details</h3>
        <div class="w-3/5 pt-6">
            <div class="text-gray-600">
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tenetur necessitatibus deleniti natus
                    dolore cum maiores suscipit optio itaque voluptatibus veritatis tempora iste facilis non aut
                    sapiente dolor quisquam, ex ab.</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum, quae accusantium voluptatem
                    blanditiis sapiente voluptatum. Autem ab, dolorum assumenda earum veniam eius illo fugiat possimus
                    illum dolor totam, ducimus excepturi.</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Error quia modi ut expedita! Iure molestiae
                    labore cumque nobis quasi fuga, quibusdam rem? Temporibus consectetur corrupti rerum veritatis
                    numquam labore amet.</p>
            </div>

            <table class="table-auto border-collapse w-full text-left text-gray-600 text-sm mt-6">
                <tr>
                    <th class="py-2 px-4 border border-gray-300 w-40 font-medium">Color</th>
                    <th class="py-2 px-4 border border-gray-300 ">Blank, Brown, Red</th>
                </tr>
                <tr>
                    <th class="py-2 px-4 border border-gray-300 w-40 font-medium">Material</th>
                    <th class="py-2 px-4 border border-gray-300 ">Latex</th>
                </tr>
                <tr>
                    <th class="py-2 px-4 border border-gray-300 w-40 font-medium">Weight</th>
                    <th class="py-2 px-4 border border-gray-300 ">55kg</th>
                </tr>
            </table>
        </div>
    </div>


    
<script>
    function addToCartWithQuantity() {
        var quantity = document.getElementById("quantityInput").value;
        var productId = "{{ $product->id }}";
        window.location.href = "{{ route('add.to.cart', ['id' => ':id', 'quantity' => ':quantity']) }}".replace(':id', productId).replace(':quantity', quantity);
    }
</script>

<script>
  function decrement(e) {
    const btn = e.target.parentNode.parentElement.querySelector(
      'button[data-action="decrement"]'
    );

    const target = btn.nextElementSibling;
    let value = Number(target.value);

    if (value > 1) {
        value--;
        target.value = value;
    }
  }

  function increment(e) {
    const btn = e.target.parentNode.parentElement.querySelector(
      'button[data-action="decrement"]'
    );
    const target = btn.nextElementSibling;
    let value = Number(target.value);
    value++;
    target.value = value;
  }

  const decrementButtons = document.querySelectorAll(
    `button[data-action="decrement"]`
  );

  const incrementButtons = document.querySelectorAll(
    `button[data-action="increment"]`
  );

  decrementButtons.forEach(btn => {
    btn.addEventListener("click", decrement);
  });

  incrementButtons.forEach(btn => {
    btn.addEventListener("click", increment);
  });
</script>
    <!-- ./description -->
@endsection