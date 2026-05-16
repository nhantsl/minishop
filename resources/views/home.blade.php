@extends('layouts.base')

@section('content')
<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-wrap items-center justify-between gap-4 px-4">

            {{-- FILTERS --}}
            <form
                method="GET"
                action="{{ route('home') }}"
                class="flex flex-wrap items-center gap-3"
            >

                {{-- FILTER ICON --}}
                <div class="flex items-center gap-2 text-gray-600">
                    {{-- Heroicon --}}
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-5 h-5"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2l-7 7v5l-4 2v-7L3 6V4z"/>
                    </svg>

                    <span class="text-sm font-medium">
                        Filters
                    </span>
                </div>

                {{-- BRAND --}}
                <select
                    name="brands[]"
                    class="px-6 py-2 border rounded-lg text-sm lg:hidden"
                    onchange="this.form.submit()"
                >
                    <option value="">Brands</option>

                    @foreach ($brands as $brand)
                        <option
                            value="{{ $brand->id }}"
                            @selected(in_array($brand->id, $q_brands))
                        >
                            {{ $brand->name }}
                        </option>
                    @endforeach
                </select>

                {{-- CATEGORY --}}
                <select
                    name="categories[]"
                    class="px-4 py-2 border rounded-lg text-sm lg:hidden"
                    onchange="this.form.submit()"
                >
                    <option value="">Category</option>

                    @foreach ($categories as $category)
                        <option
                            value="{{ $category->id }}"
                            @selected(in_array($category->id, $q_categories))
                        >
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>

            </form>

            {{-- SORT --}}
            <form
                method="GET"
                action="{{ route('home') }}"
            >
                {{-- giữ filter khi sort --}}
                @foreach(request('brands', []) as $brand)
                    <input type="hidden" name="brands[]" value="{{ $brand }}">
                @endforeach

                @foreach(request('categories', []) as $category)
                    <input type="hidden" name="categories[]" value="{{ $category }}">
                @endforeach

                <select
                    name="sort"
                    class="px-4 py-2 border rounded-lg text-sm"
                    onchange="this.form.submit()"
                >
                    <option value="">Sort By</option>

                    <option value="price_asc"
                        @selected(request('sort') == 'price_asc')>
                        Price ASC
                    </option>

                    <option value="price_desc"
                        @selected(request('sort') == 'price_desc')>
                        Price DESC
                    </option>

                    <option value="newest"
                        @selected(request('sort') == 'newest')>
                        Newest
                    </option>
                </select>
            </form>

        </div>
    </x-slot>


    <div class="flex">
        <!-- Sidebar -->
        <aside class="w-1/4 p-4 bg-white hidden lg:block">

            <div class="bg-white p-4 rounded-xl shadow">

                {{-- BRAND --}}
                <h3 class="font-semibold mb-3">Brand</h3>
                <form action="{{ route('home') }}">
                    <div class="space-y-2 mb-6">
                        @foreach ($brands as $brand)
                            <label class="flex items-center justify-between text-sm">
                                <div>
                                    <input type="checkbox"
                                        name="brands[]"
                                        value="{{ $brand->id }}"
                                        class="mr-2"
                                        {{ in_array($brand->id, $q_brands) ? 'checked' : '' }}
                                        onchange="this.form.submit()">
                                    {{ $brand->name }}
                                </div>
                                <span class="text-gray-400">
                                    ({{ $brand->products->count() }})
                                </span>
                            </label>
                        @endforeach
                    </div>
                </form>

                {{-- CATEGORY --}}
                <h3 class="font-semibold mb-3">Category</h3>
                <form action="{{ route('home') }}">
                    <div class="space-y-2 mb-6">
                        @foreach ($categories as $category)
                            <label class="flex items-center justify-between text-sm">
                                <div>
                                    <input type="checkbox"
                                        name="categories[]"
                                        value="{{ $category->id }}"
                                        class="mr-2"
                                        {{ in_array($category->id, $q_categories) ? 'checked' : '' }}
                                        onchange="this.form.submit()">
                                    {{ $category->name }}
                                </div>
                                <span class="text-gray-400">
                                    ({{ $category->products->count() }})
                                </span>
                            </label>
                        @endforeach
                    </div>
                </form>

                {{-- PRICE --}}
                <h3 class="font-semibold mb-3">Price</h3>

                <form action="{{ route('home') }}">
                        <div class="flex gap-2">
                        <input type="number" id="min"
                            name="min"
                            value="{{ request('min') }}"
                            placeholder="Min"
                            class="w-1/2 rounded"
                            >
                        <input type="number" id="max"
                            name="max"
                            value="{{ request('max') }}"
                            placeholder="Max"
                            class="w-1/2 rounded"
                            >
                        </div>
                        <button class="bg-orange-500 text-white px-3 py-1 rounded w-full mt-2">
                            Apply
                        </button>
                </form>

            </div>
        </aside>

        <!-- Content -->
        <div class="flex-1 min-w-0">

            <div class="max-w-7xl mx-auto px-4 py-6">

                {{-- PRODUCTS --}}
                <div class="lg:col-span-3">
                    {{-- PRODUCT GRID --}}
                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

                        @foreach ($products as $product)
                            <div class="bg-white rounded-xl shadow hover:shadow-lg transition p-3">

                                <a>
                                    <img src="{{ asset('images/'.$product->image) }}"
                                        class="w-full h-48 object-contain rounded mb-3">
                                </a>

                                <h5 class="font-semibold text-sm mb-1">
                                    {{ $product->name }}
                                </h5>

                                <p class="text-gray-400 text-xs mb-1">
                                    {{ $product->category->name }}
                                </p>

                                <p class="text-orange-500 font-bold mb-2">
                                    {{ number_format($product->regular_price) }} VNĐ
                                </p>

                                {{-- ACTION --}}
                                <div class="flex gap-2 w-full">
                                    <a  class="flex-1 bg-orange-500 text-white text-sm py-1 rounded hover:bg-orange-600 text-center"
                                     href="{{ route('details', $product->slug) }}" >
                                        <button>
                                            Buy now
                                        </button>
                                    </a>
                                    <button
                                        onclick="document.getElementById('addtocart-{{ $product->id }}').submit()"
                                        class="flex-2 bg-orange-500 text-white text-sm p-1 rounded hover:bg-orange-600">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke-width="1.5"
                                            stroke="currentColor"
                                            class="w-6 h-6">
                                            <path stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M2.25 3h1.386c.51 0 .955.343 1.087.835L5.76 7.5m0 0L7.5
                                                15h9.75l1.74-7.5H5.76zm1.74 10.5a1.125 1.125 0 100 2.25 1.125
                                                1.125 0 000-2.25zm10.5 0a1.125 1.125 0 100 2.25 1.125 1.125 0
                                                000-2.25z" />
                                        </svg>
                                    </button>

                                </div>

                                <form id="addtocart-{{ $product->id }}" method="POST"
                                    action="{{ route('cart.add') }}" class="hidden">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $product->id }}">
                                    <input type="hidden" name="quantity" value="1">
                                </form>
                                </a>

                            </div>
                        @endforeach

                    </div>

                    {{-- PAGINATION --}}
                    <div class="
                        mt-6 flex justify-center

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

                </div>

            </div>
        </div>
        </div>
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
</x-app-layout>


@endsection
