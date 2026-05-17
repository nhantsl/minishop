@extends('layouts.app')

@section('content')
    <div class="grid lg:grid-cols-3 gap-2 mt-2">
        <div class="p-6 lg:col-span-2 bg-white shadow-lg rounded border">

            <h2 class="text-xl font-bold text-gray-800 mb-4">
                Checkout Information
            </h2>

            <form method="POST" action="/checkout" class="space-y-4">
                @csrf

                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">
                        Phone
                    </label>
                    <input
                        class="w-full border-gray-300 p-3 rounded focus:ring-orange-400"
                        name="phone"
                        placeholder="Enter your phone"
                    >
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">
                        Address
                    </label>
                    <input
                        class="w-full border-gray-300 p-3 rounded focus:ring-orange-400"
                        name="address"
                        placeholder="Enter your address"
                    >
                </div>

                <button
                    class="w-full bg-orange-500 hover:bg-orange-600 text-white font-semibold py-3 rounded-lg transition duration-200 shadow">
                    Place Order
                </button>

            </form>

        </div>

        {{-- ORDER ITEMS --}}
        <div class="">

            @php
                $grandTotal = 0;
            @endphp

            @foreach ($cart as $item)

                @php
                    $total = $item['price'] * $item['quantity'];
                    $grandTotal += $total;
                @endphp

                <div class="grid grid-cols-3 items-center gap-4 bg-white p-4 rounded shadow">

                     <div class="flex justify-center">
                        <img src="{{ asset('images/' . $item['image']) }}"
                            class="w-20 h-20 object-contain rounded">
                    </div>

                    <div class="flex items-center">
                        Quantity: {{ $item['quantity'] }}
                    </div>

                    <div class="flex items-center text-gray-600 font-semibold">
                        {{ number_format($total) }} VNĐ
                    </div>

                </div>

            @endforeach
            {{-- GRAND TOTAL --}}
            <div class="flex justify-end mt-6">

                <div class="bg-white shadow rounded px-6 py-4">

                    <h2 class="text-2xl font-bold">
                        Total:
                        <span class="text-orange-500">
                            {{ number_format($grandTotal) }} VNĐ
                        </span>
                    </h2>

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
@endsection
