@extends('layouts.app')

@section('content')
    <h2 class="text-2xl font-bold text-gray-800 my-2">Create Product</h2>

    <div class="bg-white shadow rounded p-2">
        <p class="text-sm text-gray-500">Fill in the information below to add a new product</p>

        <form method="POST" action="{{ route('admin.products.store') }}" class="space-y-2">
            @csrf

            {{-- Product Name --}}
            <div>
                <label class="block text-sm font-semibold text-gray-700 ">
                    Product Name
                    <span class="text-red-500">*</span>
                </label>
                <input name="name"
                        class="w-full border-gray-300 rounded  focus:ring-orange-500 focus:border-orange-500"
                        placeholder="Enter product name">
            </div>

            {{-- Price --}}
            <div>
                <label class="block text-sm font-semibold text-gray-700 ">
                    Regular Price
                    <span class="text-red-500">*</span>
                </label>
                <input name="regular_price"
                        type="number"
                        class="w-full border-gray-300 rounded focus:ring-orange-500 focus:border-orange-500"
                        placeholder="0.00">
            </div>

            {{-- Description --}}
            <div>
                <label class="block text-sm font-semibold text-gray-700 ">
                    Description
                </label>
                <textarea name="description"
                            rows="4"
                            class="w-full border-gray-300 rounded focus:ring-orange-500 focus:border-orange-500"
                            placeholder="Product description..."></textarea>
            </div>

            {{-- Image Upload --}}
            <div>

                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Product Image
                </label>

                <input type="file"
                    name="image"
                    accept="images/*"
                    class="block w-full text-sm text-gray-700
                        {{-- file:mr-4 --}}
                        file:rounded-lg
                        file:border-0
                        file:bg-orange-500
                        file:px-4
                        file:py-2
                        file:text-white
                        hover:file:bg-orange-600
                        cursor-pointer">

            </div>

            {{-- Category & Brand --}}
            <div class="flex gap-5">

                {{-- CATEGORY --}}
                <div>
                    <label
                        for="category_id"
                        class="mb-2 block text-sm font-semibold text-gray-700"
                    >
                        Category
                        <span class="text-red-500">*</span>
                    </label>

                    <div class="relative">

                        <select
                            id="category_id"
                            name="category_id"
                            class="
                                w-full
                                appearance-none
                                rounded-xl
                                border border-gray-300
                                bg-white
                                px-4 py-3
                                pr-10
                                text-sm
                                text-gray-700
                                shadow-sm
                                transition

                                focus:border-orange-500
                                focus:outline-none
                                focus:ring-orange-100
                            "
                        >

                            <option disabled selected>
                                Select category
                            </option>

                            @foreach($categories as $category)

                                <option value="{{ $category->id }}">
                                    {{ $category->name }}
                                </option>

                            @endforeach

                        </select>

                    </div>
                </div>

                {{-- BRAND --}}
                <div>
                    <label
                        for="brand_id"
                        class="mb-2 block text-sm font-semibold text-gray-700"
                    >
                        Brand
                        <span class="text-red-500">*</span>
                    </label>

                    <div class="relative">

                        <select
                            id="brand_id"
                            name="brand_id"
                            class="
                                w-full
                                appearance-none
                                rounded-xl
                                border border-gray-300
                                bg-white
                                px-4 py-3
                                pr-10
                                text-sm
                                text-gray-700
                                shadow-sm
                                transition

                                focus:border-orange-500
                                focus:outline-none
                                focus:ring-orange-100
                            "
                        >

                            <option disabled selected>
                                Select brand
                            </option>

                            @foreach($brands as $brand)

                                <option value="{{ $brand->id }}">
                                    {{ $brand->name }}
                                </option>

                            @endforeach

                        </select>

                    </div>

                </div>

            </div>

            {{-- Button --}}
            <div class="flex justify-end pt-4">
                <button class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-2 rounded-lg transition">
                    Save Product
                </button>
            </div>

        </form>
    </div>
@endsection
