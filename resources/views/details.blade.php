@extends('layouts.app')

@section('content')
    <main class="max-w-7xl mx-auto px-4 py-10">

        {{-- Product Details --}}
        <section class="grid grid-cols-1 lg:grid-cols-3 gap-12 mb-16">

            {{-- Product Images --}}
            <div class="bg-white rounded-3xl mx-auto w-full h-112 px-6 flex items-center justify-center overflow-hidden">
                <img
                    src="{{ asset('images/' . $product->image) }}"
                    id="mainImage"
                    alt="{{ $product->name }}"
                    class="max-h-full object-contain"
                    loading="lazy"
                >
            </div>

            {{-- Product Info --}}
            <div class="col-span-2 flex flex-col justify-center bg-white rounded-3xl p-3">

                {{-- Category --}}
                <span class="text-sm uppercase tracking-widest text-gray-500 mb-3">
                    {{ $product->category->name }}
                </span>

                {{-- Product Name --}}
                <h1 class="text-4xl font-bold text-gray-900 mb-4 leading-tight">
                    {{ $product->name }}
                </h1>

                {{-- Price --}}
                <div class="flex items-center gap-4 mb-6">

                    <span class="text-4xl font-bold text-red-500">
                        {{ number_format($product->regular_price) }} VNĐ
                    </span>

                </div>

                {{-- Description --}}
                <p class="text-gray-600 leading-8 mb-8">
                    {{ $product->description }}
                </p>


                {{-- Buttons --}}
                <div class="flex flex-col sm:flex-row gap-4">

                    {{-- Add To Cart --}}
                    <form id="addtocart"
                        method="POST"
                        action="{{ route('cart.add') }}">

                        @csrf

                        <input type="hidden" name="id" value="{{ $product->id }}">
                        {{-- Quantity --}}
                        <div class="mb-8">

                            <h6 class="text-sm font-semibold uppercase tracking-wide text-gray-700 mb-4">
                                Quantity
                            </h6>

                            {{-- Input --}}
                            <input type="number"
                                id="quantity"
                                name="quantity"
                                value="1"
                                min="1"
                                class="w-20 text-center font-semibold rounded border border-gray-200">
                        </div>

                        <button type="submit"
                            id="addCartBtn"
                            class="inline-flex items-center justify-center gap-3 bg-orange-500 text-white
                             hover:bg-orange-600 px-8 py-4 rounded-2xl font-semibold transition duration-300">

                            <i class="fa fa-shopping-cart"></i>

                            <span>
                                Add To Cart
                            </span>

                        </button>
                    </form>

                </div>

            </div>
        </section>

        {{-- Description --}}
        <section class="bg-white border border-gray-100 rounded-3xl p-8 shadow-sm mb-16">

            <h2 class="text-3xl font-bold text-gray-900 mb-6">
                Product Description
            </h2>

            <div class="space-y-5 text-gray-600 leading-8">

                <p>
                    Nước ngọt thơm ngon với hương vị mát lạnh, giúp giải khát nhanh chóng và mang lại cảm giác sảng khoái suốt cả ngày.
                    Phù hợp sử dụng trong các buổi tiệc, gặp gỡ bạn bè hoặc dùng hằng ngày.
                </p>

                <p>
                    Với hương vị đậm đà cùng cảm giác tươi mát, sản phẩm mang đến trải nghiệm giải khát tuyệt vời, thích hợp
                    cho mọi hoạt động hằng ngày.
                </p>

                <p>
                    Thiết kế tiện lợi, dễ dàng mang theo khi đi học,
                    đi làm hoặc dã ngoại. Thưởng thức ngon hơn khi uống lạnh.
                </p>

            </div>

        </section>

        {{-- Other Products --}}
        <section>

            {{-- Section Title --}}
            <div class="flex items-center justify-between mb-10">

                <h2 class="text-3xl font-bold text-gray-900">
                    Customers Also Bought
                </h2>

                <a href="/"
                    class="text-sm font-semibold hover:underline">
                    View All
                </a>

            </div>

            {{-- Product Grid --}}
            <div class="overflow-x-auto scrollbar-hide scroll-smooth">

                <div class="flex gap-6 w-max px-1">

                    @foreach($randomProducts as $product)

                        <div
                            class="w-70 shrink-0 bg-white rounded-3xl overflow-hidden
                            shadow-sm hover:shadow-2xl hover:-translate-y-1 transition duration-300 group">

                            {{-- Image --}}
                            <div class="relative overflow-hidden">

                                <a href="{{ route('details', $product->slug) }}">
                                    <img src="{{ asset('images/'.$product->image) }}"
                                        class="w-full h-72 object-contain group-hover:scale-105 transition duration-300"
                                        alt="{{ $product->name }}">
                                </a>

                            </div>

                            {{-- Info --}}
                            <div class="p-5">
                                <a href="{{ route('details', $product->slug) }}">
                                    <h5
                                        class="text-lg font-semibold text-gray-900 hover:text-black transition mb-3 line-clamp-2">

                                        {{ $product->name }}

                                    </h5>
                                </a>

                                {{-- Price --}}
                                <div class="flex items-center justify-between">

                                    <span class="text-2xl font-bold text-red-500">
                                        {{ number_format($product->regular_price) }} VNĐ
                                    </span>

                                    <button class="bg-orange-500 hover:bg-orange-600 px-4 py-2 rounded-xl transition text-white">
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

                            </div>

                        </div>

                    @endforeach

                </div>

            </div>

        </section>

    </main>
@endsection
