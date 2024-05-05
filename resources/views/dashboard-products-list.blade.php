@extends('dashboard-layout')

@section('content')

@if (session()->get('success') !== null)
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
        <span class="block sm:inline">{{ session()->get('success') }}</span>
    </div>
@endif

<div class="bg-white p-6">
    <div class="flex justify-between mb-4 items-start">
        <div class="font-medium">Produits</div>
        <div class="dropdown">
            <button type="button" class="dropdown-toggle text-gray-400 hover:text-gray-600"><i
                    class="ri-more-fill"></i></button>
            <ul class="dropdown-menu shadow-md shadow-black/5 z-30 py-1.5 rounded-md bg-white border border-gray-100 w-full max-w-[140px] hidden"
                data-popper-id="popper-10"
                style="position: absolute; inset: 0px 0px auto auto; margin: 0px; transform: translate(-49px, 689px);"
                data-popper-placement="bottom-end">
                <li>
                    <a href="#"
                        class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Profile</a>
                </li>
                <li>
                    <a href="#"
                        class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Settings</a>
                </li>
                <li>
                    <a href="#"
                        class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Logout</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full min-w-[460px]">
            <thead>
                <tr>
                    <th
                        class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left rounded-tl-md rounded-bl-md">
                        Image
                    </th>
                    <th
                        class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left">
                        Quantité
                    </th>
                    <th
                        class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left">
                        Prix
                    </th>
                    <th
                        class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left rounded-tr-md rounded-br-md">
                        Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td class="py-2 px-4 border-b border-b-gray-50">
                        <div class="flex items-center">
                            <img src="{{ asset('storage/uploads/'.$product->image) }}" alt="" class="w-24 rounded object-cover block">
                            <p class="text-gray-600 text-sm font-medium ml-2 truncate">
                                {{ $product->name }}
                            </p>
                        </div>
                    </td>
                    <td class="py-2 px-4 border-b border-b-gray-50">
                        <span class="text-[13px] font-medium text-gray-500">{{ $product->stock }}</span>
                    </td>
                    <td class="py-2 px-4 border-b border-b-gray-50">
                        <span class="text-[13px] font-medium text-gray-500">{{ $product->price }}€</span>
                    </td>
                    <td class="py-2 px-4 border-b border-b-gray-50">
                        <div class="dropdown">
                            <button type="button" class="dropdown-toggle text-gray-400 hover:text-gray-600 text-sm w-6 h-6 rounded flex items-center justify-center bg-gray-50"><i class="ri-more-2-fill"></i></button>
                            <ul class="dropdown-menu shadow-md shadow-black/5 z-30 py-1.5 rounded-md bg-white border border-gray-100 w-full max-w-[140px] hidden" data-popper-id="popper-7" style="position: absolute; inset: 0px 0px auto auto; margin: 0px; transform: translate(-110px, 915px);" data-popper-placement="bottom-end">
                                <li>
                                    <a href="product/modify/1" class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Modifier</a>
                                </li>
                                <li>
                                    <a href="#" class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Supprimer</a>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection