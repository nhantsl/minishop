@extends('layouts.app')

@section('content')
@if($orders->count() == 0)
<div class="bg-white rounded shadow-sm border p-10 text-center">

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

    <h2 class="text-xl font-semibold">
        Chưa có đơn hàng nào
    </h2>

    <p class="text-gray-500 mt-2 mb-6">
        Bạn chưa tạo đơn hàng nào. Hãy bắt đầu mua sắm ngay.
    </p>

    <a href="/"
       class="inline-flex items-center px-5 py-3 rounded-xl bg-orange-500 text-white hover:bg-orange-600 transition">
        Khám phá sản phẩm
    </a>
</div>
@else
    <div class="mt-2 space-y-1">

        @foreach($orders as $order)
            <div
                x-data="{ open: false }"
                class="p-2 bg-white shadow rounded"
            >
                <div class="
                    flex
                    flex-row items-center
                    justify-between gap-4 p-2
                ">

                    <div>
                        <h3 class="text-lg font-semibold">
                            Order #{{ $order->id }}
                        </h3>

                        <p class="text-sm text-gray-500">
                            {{ $order->created_at->format('d M Y') }}
                        </p>
                        <div class="inline-block md:hidden
                            items-center
                            rounded-full
                            px-3 py-1
                            text-xs
                            font-medium

                            @if($order->status == 'pending'){
                                bg-yellow-100 text-yellow-700
                            @elseif($order->status == 'completed')
                                bg-green-100 text-green-700
                            @else
                                bg-gray-100 text-gray-700}
                            @endif
                        ">
                            {{ ucfirst($order->status) }}
                        </div>
                    </div>
                    <div class="hidden md:inline-block
                            items-center
                            rounded-full
                            px-3 py-1
                            text-xs
                            font-medium

                            @if($order->status == 'pending'){
                                bg-yellow-100 text-yellow-700
                            @elseif($order->status == 'completed')
                                bg-green-100 text-green-700
                            @else
                                bg-gray-100 text-gray-700}
                            @endif
                        ">
                            {{ ucfirst($order->status) }}
                    </div>
                    <div class="text-right">
                        <p class="text-sm text-gray-500">
                            Total
                        </p>

                        <p class="text-lg font-bold text-orange-500">
                            {{ number_format($order->total) }} VNĐ
                        </p>

                        <button
                            @click="open = !open"
                            class="
                                text-end gap-2
                                text-sm
                                font-medium
                                text-orange-500
                            "
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="size-6 transition-transform" :class="{ 'rotate-180': open }">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12
                                4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577
                                16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>

                        </button>
                    </div>
                </div>

                <!-- Items (hidden by default) -->
                <div x-show="open" x-transition class="mt-3">
                    @foreach($order->items as $item)
                        <div class="
                            flex
                            items-center
                            gap-4
                            py-4
                            border-t
                        ">
                            <div>
                                <img src="{{ asset('images/' . $item->product->image) }}"
                                class="w-20 h-20 object-contain rounded mb-3 border">
                            </div>
                            <div class="flex-1">

                                <h4 class="font-medium">
                                    {{ $item->product->name }}
                                </h4>

                                <p class="text-sm text-gray-500 mt-1">
                                    Quantity: {{ $item->quantity }}
                                </p>

                            </div>
                            <div class="
                                font-semibold
                                text-orange-300
                            ">
                                {{ number_format($item->price) }} VNĐ
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        @endforeach

    </div>
@endif

@endsection
