@extends('dashboard-layout')

@section('content')
<div class="bg-white p-6">
    <div class="flex justify-between mb-4 items-start">
        <div class="font-medium">Commandes</div>
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
                        Réference</th>
                    <th
                        class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left">
                        Statut</th>
                    <th
                        class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left rounded-tr-md rounded-br-md">
                        Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="py-2 px-4 border-b border-b-gray-50">
                        <div class="flex items-center">
                            <a href="#" class="text-gray-600 text-sm font-medium hover:text-blue-500 ml-2 truncate">
                                order.id
                            </a>
                        </div>
                    </td>
                    <td class="py-2 px-4 border-b border-b-gray-50">
                        <span class="inline-block p-1 rounded bg-rose-500/10 text-rose-500 font-medium text-[12px] leading-none">En attente</span>
                    </td>
                    <td class="py-2 px-4 border-b border-b-gray-50">
                        <div class="dropdown">
                            <button type="button" class="dropdown-toggle text-gray-400 hover:text-gray-600 text-sm w-6 h-6 rounded flex items-center justify-center bg-gray-50"><i class="ri-more-2-fill"></i></button>
                            <ul class="dropdown-menu shadow-md shadow-black/5 z-30 py-1.5 rounded-md bg-white border border-gray-100 w-full max-w-[180px] hidden" data-popper-id="popper-7" style="position: absolute; inset: 0px 0px auto auto; margin: 0px; transform: translate(-110px, 915px);" data-popper-placement="bottom-end">
                                <li>
                                    <a href="product/modify/1" class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Marquer comme traiter</a>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection