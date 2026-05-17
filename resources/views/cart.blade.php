@extends('layouts.app')

@section('content')

@if($cartCount == 0)

<div class="text-center p-6 bg-white rounded mt-2">

    <div class="flex justify-center mb-3">
        <svg xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke-width="1.5"
            stroke="gray"
            class="size-20">
            <path stroke-linecap="round"
                stroke-linejoin="round"
                d="M2.25 3h1.386c.51 0 .955.343 1.087.835L5.76 7.5m0 0L7.5
                15h9.75l1.74-7.5H5.76zm1.74 10.5a1.125 1.125 0 100 2.25 1.125
                1.125 0 000-2.25zm10.5 0a1.125 1.125 0 100 2.25 1.125 1.125 0
                000-2.25z" />
        </svg>
    </div>

    <h2 class="text-lg font-semibold text-gray-800">
        Giỏ hàng trống
    </h2>

    <p class="text-sm text-gray-500 mt-1 mb-4">
        Bạn chưa thêm sản phẩm nào vào giỏ hàng.
    </p>

    <a href="{{ route('home') }}"
        class="px-5 py-2.5 bg-orange-500 hover:bg-orange-600 text-white
        rounded-lg transition duration-200 font-medium shadow">
        Tiếp tục mua sắm
    </a>

</div>
@else

<div class="overflow-x-auto rounded-2xl shadow">
    <table class="table-fixed w-full bg-white shadow rounded-lg mt-2 ">

        <thead class="bg-gray-100 text-gray-700 text-xs lg:text-base uppercase">
            <tr>
                <th class="hidden lg:block"></th>
                <th class="">Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Item Total</th>
                <th>Delete</th>
            </tr>
        </thead>

        <tbody class="divide-y text-xs lg:text-base">
            @php
                $grandTotal = 0;
            @endphp
            @foreach ($cart as $id => $item)

                @php
                    $total = $item['price'] * $item['quantity'];
                    $grandTotal += $total;
                    $product = $products[$id];
                @endphp

            <tr class="hover:bg-gray-50 text-sm">

                {{-- IMAGE --}}
                <td class="text-center">
                    <p class="lg:hidden pt-1">{{ $item['name'] }}</p>
                    <a href="{{ route('details', \App\Models\Product::find($id)->slug) }}">

                        <img src="{{ asset('images/' . $item['image']) }}"
                            class="w-20 h-20 object-contain rounded mb-3 mx-auto">

                    </a>
                </td>

                {{-- NAME --}}
                <td class="text-center hidden lg:inline">
                    <p>{{ $item['name'] }}</p>
                </td>

                {{-- PRICE --}}
                <td class="text-center">
                    <strong>{{ number_format($item['price']) }}</strong>
                </td>

                {{-- QUANTITY --}}
                <td class="text-center">

                    <form action="/cart/update" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $id }}">
                        <input type="number"
                            name="quantity"
                            value="{{ $item['quantity'] }}"
                            min="1"
                            onchange="this.form.submit()"
                            class="w-12 lg:w-16 border rounded"
                        >
                    </form>

                </td>

                {{-- TOTAL --}}
                <td class="text-center font-semibold text-gray-600">
                    {{ number_format($item['price'] * $item['quantity']) }} VNĐ
                </td>

                {{-- ACTION --}}
                <td class="text-center">
                    <form action="{{ route('cart.remove', $id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="text-red-500 hover:text-red-700 text-lg">
                            ✕
                        </button>
                    </form>
                </td>

            </tr>

            @endforeach

        </tbody>

    </table>
</div>

<div dir="rtl" class="mt-2">
    <div class="text-xl font-bold text-orange-500">
        Total: {{ $grandTotal }} VNĐ
    </div>
    <div class="text-red-500 px-4 py-2 rounded font-bold">
        <form action="{{ route('cart.clear') }}" method="POST">

            @csrf
            @method('DELETE')

            <button type="submit" class="flex justify-end">
                Clear Cart
            </button>

        </form>
    </div>
    <a href="/checkout" class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded">
        Checkout
    </a>
</div>
@endif

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
@endsection
