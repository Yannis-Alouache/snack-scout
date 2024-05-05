@extends('layout')

@section('content')
<!-- breadcrumb -->
<div class="container py-4 flex items-center gap-3">
    <a href="../index.html" class="text-primary text-base">
        <i class="fa-solid fa-house"></i>
    </a>
    <span class="text-sm text-gray-400">
        <i class="fa-solid fa-chevron-right"></i>
    </span>
    <p class="text-gray-600 font-medium">Profile</p>
</div>
<!-- ./breadcrumb -->

<!-- wrapper -->
<div class="container grid grid-cols-12 items-start gap-6 pt-4 pb-16">

    <!-- sidebar -->
    <div class="col-span-3">
        <div class="px-4 py-3 shadow flex items-center gap-4">
            <div class="flex-shrink-0">
                <img src="../assets/images/avatar.png" alt="profile" class="rounded-full w-14 h-14 border border-gray-200 p-1 object-cover">
            </div>
            <div class="flex-grow">
                <p class="text-gray-600">Hello,</p>
                <h4 class="text-gray-800 font-medium">John Doe</h4>
            </div>
        </div>

        <div class="mt-6 bg-white shadow rounded p-4 divide-y divide-gray-200 space-y-4 text-gray-600">
            <div class="space-y-1 pl-8">
                <a href="#" class="relative text-primary block font-medium capitalize transition">
                    <span class="absolute -left-8 top-0 text-base">
                        <i class="fa-solid fa-box-archive"></i>
                    </span>
                    My order history
                </a>
            </div>
        </div>
    </div>
    <!-- ./sidebar -->

    <!-- wishlist -->
    <div class="col-span-9 space-y-4">
        <h3>Commande n°232235235</h3>
        <div class="border border-rose-600 p-6">
            <div class="flex items-center justify-between border gap-6 p-4 border-gray-200 rounded">
                <div class="w-28">
                    <img src="../assets/images/products/product6.jpg" alt="product 6" class="w-full">
                </div>
                <div class="w-1/3">
                    <h2 class="text-gray-800 text-xl font-medium uppercase">Italian L shape</h2>
                    <p class="text-gray-500 text-sm">Availability: <span class="text-green-600">In Stock</span></p>
                </div>
                <div class="text-primary text-lg font-semibold">$320.00</div>
            </div>

            <div class="flex items-center justify-between border gap-6 p-4 border-gray-200 rounded">
                <div class="w-28">
                    <img src="../assets/images/products/product5.jpg" alt="product 6" class="w-full">
                </div>
                <div class="w-1/3">
                    <h2 class="text-gray-800 text-xl font-medium uppercase">Dining Table</h2>
                    <p class="text-gray-500 text-sm">Availability: <span class="text-green-600">In Stock</span></p>
                </div>
                <div class="text-primary text-lg font-semibold">$320.00</div>
            </div>
        </div>

        <h3>Commande n°232235245</h3>
        <div class="border border-rose-600 p-6">
            <div class="flex items-center justify-between border gap-6 p-4 border-gray-200 rounded">
                <div class="w-28">
                    <img src="../assets/images/products/product6.jpg" alt="product 6" class="w-full">
                </div>
                <div class="w-1/3">
                    <h2 class="text-gray-800 text-xl font-medium uppercase">Italian L shape</h2>
                    <p class="text-gray-500 text-sm">Availability: <span class="text-green-600">In Stock</span></p>
                </div>
                <div class="text-primary text-lg font-semibold">$320.00</div>
            </div>

            <div class="flex items-center justify-between border gap-6 p-4 border-gray-200 rounded">
                <div class="w-28">
                    <img src="../assets/images/products/product5.jpg" alt="product 6" class="w-full">
                </div>
                <div class="w-1/3">
                    <h2 class="text-gray-800 text-xl font-medium uppercase">Dining Table</h2>
                    <p class="text-gray-500 text-sm">Availability: <span class="text-green-600">In Stock</span></p>
                </div>
                <div class="text-primary text-lg font-semibold">$320.00</div>
            </div>
        </div>
    </div>
    <!-- ./wishlist -->

</div>
@endsection