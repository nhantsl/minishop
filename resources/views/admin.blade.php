@extends('layouts.base')

@section('content')
<x-app-layout class="">
    {{-- Orders --}}
    <div class="space-y-2">
        <h1 class="text-2xl font-bold mt-2">Orders</h1>

        @foreach($orders as $order)
            <div x-data="{ open: false }"
                class="bg-white shadow rounded-xl border border-gray-100">
                {{-- HEADER --}}
                <div class="p-3 flex flex-wrap justify-between items-center gap-4">

                    <div class="font-semibold">
                        Order #{{ $order->id }}
                        <div class="text-sm text-gray-500">
                            📞 {{ $order->phone }}
                            📍 {{ $order->address }}
                        </div>
                    </div>

                    <div class="text-gray-600">
                        {{ $order->user->name }}
                    </div>

                    <div class="font-medium">
                        Total:
                        <span class="text-orange-500 font-semibold">
                            {{ number_format($order->total) }} VNĐ
                        </span>
                    </div>

                    {{-- STATUS --}}
                    <details class="relative inline-block">
                        {{-- Current Status --}}
                        <summary class="
                            list-none cursor-pointer inline-flex items-center
                            px-3 py-1 rounded-full text-xs font-semibold select-none

                            @switch($order->status)
                                @case('pending'){
                                    bg-yellow-100 text-yellow-700
                                    @break

                                @case('completed')
                                    bg-green-100 text-green-700
                                    @break

                                @case('cancelled')
                                    bg-red-100 text-red-700
                                    @break
                                }
                                @default
                                    bg-gray-100 text-gray-700
                            @endswitch
                        ">
                            {{ ucfirst($order->status) }}

                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M19 9l-7 7-7-7"/>
                            </svg>
                        </summary>

                        {{-- Dropdown --}}
                        <div class="absolute bg-white w-40 rounded shadow z-10">
                            @foreach(\App\Models\Order::getStatuses() as $status)
                                <form method="POST"
                                    action="{{ route('admin.orders.updateStatus', $order->id) }}">
                                    @csrf

                                    <input type="hidden" name="status" value="{{ $status }}">

                                    <button type="submit"
                                            class="w-full hover:bg-gray-100">
                                            {{ ucfirst($status) }}

                                    </button>
                                </form>
                            @endforeach
                        </div>
                    </details>

                    {{-- ACTIONS --}}
                    <div class="flex items-center gap-3">

                        <button @click="open = !open"
                                class="text-blue-600 hover:underline text-sm">
                            <span x-show="!open">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12
                                    4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577
                                    16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>
                            </span>
                            <span x-show="open">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244
                                    19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451
                                    10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522
                                    10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65
                                    3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1
                                    0-4.243-4.243m4.242 4.242L9.88 9.88" />
                                </svg>
                            </span>
                        </button>

                        <form method="POST"
                            action="{{ route('admin.orders.delete', $order->id) }}"
                            onsubmit="return confirm('Delete this order?')">
                            @csrf
                            @method('DELETE')

                            <button class="text-red-500 hover:text-red-700 text-sm">
                               X
                            </button>
                        </form>

                    </div>
                </div>

                {{-- ITEMS --}}
                <div x-show="open" x-transition class="bg-gray-100 p-2 space-y-1">

                    @foreach($order->items as $item)
                        <div class="flex items-center justify-between bg-white p-3 rounded shadow-sm">

                            <div class="flex items-center gap-3">
                                <img src="{{ asset('images/' . $item->product->image) }}"
                                    class="w-14 h-14 object-contain rounded border">

                                <div>
                                    <div class="font-medium">
                                        {{ $item->product->name ?? 'Product' }}
                                    </div>
                                    <div class="text-sm text-gray-500">
                                        Quantity: {{ $item->quantity }}
                                    </div>
                                </div>
                            </div>

                            <div class="text-right">
                                <div class="font-semibold text-gray-700">
                                    {{ number_format($item->price) }} VNĐ
                                </div>
                            </div>

                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach

    </div>
    {{-- Users --}}
    <h1 class="text-2xl font-bold my-2">Users</h1>
    <div class="rounded bg-white">

        <table class="min-w-full text-sm">

            <thead class="bg-gray-50 text-gray-600 uppercase text-xs">
                <tr>
                    <th class="px-3 py-3 text-left md:px-6">ID</th>

                    <th class="px-3 py-3 text-left md:px-6">
                        Name
                    </th>

                    <th class="hidden px-3 py-3 text-left md:table-cell md:px-6">
                        Email
                    </th>

                    <th class="px-3 py-3 text-center md:px-6">
                        Action
                    </th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-100">

                @foreach($users as $user)

                    <tr class="transition hover:bg-gray-50">

                        <td class="px-3 py-3 text-gray-500 md:px-6">
                            #{{ $user->id }}
                        </td>

                        <td class="px-3 py-3 md:px-6">

                            <div class="font-medium text-gray-800">
                                {{ $user->name }}
                            </div>

                            {{-- email hiện dưới name trên mobile --}}
                            <div class="mt-1 text-xs text-gray-500 break-all md:hidden">
                                {{ $user->email }}
                            </div>

                        </td>

                        {{-- desktop email --}}
                        <td class="hidden px-3 py-3 text-gray-600 md:table-cell md:px-6">
                            <div class="max-w-[240px] truncate"
                                title="{{ $user->email }}">
                                {{ $user->email }}
                            </div>
                        </td>

                        <td class="px-3 py-3 text-center md:px-6">

                            <form
                                method="POST"
                                action="{{ route('admin.users.delete', $user->id) }}"
                                onsubmit="return confirm('Delete this user?')"
                                class="inline"
                            >

                                @csrf
                                @method('DELETE')

                                <button
                                    class="rounded-lg bg-red-50 px-3 py-1.5 text-xs font-medium text-red-600 transition hover:bg-red-100"
                                >
                                    Delete
                                </button>

                            </form>

                        </td>

                    </tr>

                @endforeach

            </tbody>

        </table>

    </div>
    {{-- Products --}}
    <h1 class="text-2xl font-bold mt-2">Products</h1>

    <a href="{{ route('admin.products.create') }}"
        class="inline-flex m-1
        bg-orange-500 hover:bg-orange-600
        text-white p-3 rounded-lg text-sm">
            + Create Product
    </a>

    <div class="bg-white shadow-md rounded-xl border overflow-hidden">

        <table class="w-full text-left">

            <thead class="bg-gray-100 text-gray-700 text-sm">
                <tr>
                    <th class="p-3">ID</th>
                    <th class="p-3">Product</th>
                    <th class="p-3">Price</th>
                    {{-- <th class="p-3">Stock</th> --}}
                    <th class="p-3 text-right">Action</th>
                </tr>
            </thead>

            <tbody class="divide-y">

                @foreach($products as $product)
                    <tr class="hover:bg-gray-50 transition">

                        <td class="p-3 text-gray-500">
                            #{{ $product->id }}
                        </td>

                        <td class="p-3 flex items-center gap-3">

                            <img src="{{ asset('images/' . $product->image) }}"
                                class="w-10 h-10 rounded object-contain">

                            <div class="font-medium">
                                {{ $product->name }}
                            </div>

                        </td>

                        <td class="p-3 text-green-600 font-semibold">
                            {{ number_format($product->regular_price) }} VNĐ
                        </td>

                        {{-- <td class="p-3 text-gray-600">
                            {{ $product->stock ?? 0 }}
                        </td> --}}

                        <td class="p-3 text-right space-x-3">

                            {{-- <a href="#"
                            class="text-blue-500 hover:text-blue-700 text-sm">
                                Edit
                            </a> --}}

                            <form method="POST"
                                action="{{ route('admin.products.delete', $product->id) }}"
                                onsubmit="return confirm('Delete this product?')"
                                class="inline">

                                @csrf
                                @method('DELETE')

                                <button
                                    class="rounded-lg bg-red-50 px-3 py-1.5 text-xs font-medium text-red-600 transition hover:bg-red-100"
                                >
                                    Delete
                                </button>

                            </form>

                        </td>

                    </tr>
                @endforeach
                {{-- PAGINATION --}}
                <div class=" m-2
                    [&_p]:hidden

                    [&_span]:gap-3

                    [&_*>*]:shadow-none
                    [&_*>*]:border-none
                    [&_*>*]:rounded-lg


                    [&_a]:bg-gray-100
                    [&_a]:text-orange-500
                    [&_a:hover]:bg-orange-500
                    [&_a:hover]:text-white

                    [&_.cursor-not-allowed]:bg-gray-100
                    [&_.cursor-not-allowed:hover]:bg-gray-200
                    [&_.cursor-not-allowed:hover]:text-orange-500

                    [&_[aria-current='page']>span]:bg-orange-500
                    [&_[aria-current='page']>span:hover]:bg-gray-200
                    [&_[aria-current='page']>span:hover]:text-orange-500
                    [&_[aria-current='page']>span]:text-white
                    ">
                    {{ $products->Links() }}
                </div>
            </tbody>
        </table>
    </div>

    {{-- Toast Message --}}
    @if(session('success'))

        <div id="toast"
            class="fixed top-5 right-5 z-50 flex min-w-[320px] items-start gap-3 rounded-2xl border border-green-200 bg-white px-5 py-4 shadow-2xl transition-all duration-300">

            {{-- Icon --}}
            <div class="flex h-10 w-10 items-center justify-center rounded-full bg-green-100 text-green-600">

                <svg xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="2"
                    stroke="currentColor"
                    class="h-5 w-5">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />

                </svg>

            </div>

            {{-- Content --}}
            <div class="flex-1">

                <h4 class="text-sm font-semibold text-gray-900">
                    Success
                </h4>

                <p class="mt-1 text-sm text-gray-600">
                    {{ session('success') }}
                </p>

            </div>

            {{-- Close --}}
            <button onclick="closeToast()"
                class="text-gray-400 transition hover:text-gray-600">

                <svg xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="2"
                    stroke="currentColor"
                    class="h-5 w-5">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M6 18 18 6M6 6l12 12" />

                </svg>

            </button>

        </div>

        <script>

            const toast = document.getElementById('toast');

            function closeToast()
            {
                toast.classList.add(
                    'opacity-0',
                    'translate-y-3',
                    'scale-95'
                );

                setTimeout(() => {
                    toast.remove();
                }, 300);
            }

            setTimeout(() => {
                closeToast();
            }, 3000);

        </script>

    @endif

    {{-- Error Toast --}}
    @if($errors->has('delete'))

        <div id="error-toast"
            class="fixed top-5 right-5 z-50 flex min-w-[320px] items-start gap-3 rounded-2xl border border-red-200 bg-white px-5 py-4 shadow-2xl">

            {{-- Icon --}}
            <div class="flex h-10 w-10 items-center justify-center rounded-full bg-red-100 text-red-600">

                <svg xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="2"
                    stroke="currentColor"
                    class="h-5 w-5">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M12 9v3.75m0 3.75h.008v.008H12v-.008z" />

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M12 21a9 9 0 100-18 9 9 0 000 18z" />

                </svg>

            </div>

            {{-- Content --}}
            <div class="flex-1">

                <h4 class="text-sm font-semibold text-gray-900">
                    Error
                </h4>

                <p class="mt-1 text-sm text-gray-600">
                    {{ $errors->first('delete') }}
                </p>

            </div>

            {{-- Close --}}
            <button onclick="closeErrorToast()"
                class="text-gray-400 hover:text-gray-600">

                ✕

            </button>

        </div>

        <script>

            const errorToast = document.getElementById('error-toast');

            function closeErrorToast()
            {
                errorToast.classList.add(
                    'opacity-0',
                    'translate-y-3',
                    'scale-95'
                );

                setTimeout(() => {
                    errorToast.remove();
                }, 300);
            }

            setTimeout(() => {
                closeErrorToast();
            }, 3000);

        </script>

    @endif
</x-app-layout>
@endsection
