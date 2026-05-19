@extends('layouts.app')

@section('content')
    <h2 class="text-2xl font-bold text-gray-800 my-2">Create Product</h2>

    <div class="bg-white shadow rounded p-4">
        <p class="text-sm text-gray-500">Fill in the information below to add a new product</p>

        <form method="POST" action="{{ route('admin.products.store') }}" >
            @csrf

            <div class="grid lg:grid-cols-2 gap-2">
                {{-- Information Product --}}
                <div>
                    {{-- Product Name --}}
                    <div class="p-2">
                        <label class="block text-sm font-semibold text-gray-700 ">
                            Product Name
                            <span class="text-red-500">*</span>
                        </label>
                        <input name="name"
                                class="w-full border border-gray-100 rounded p-1
                                focus:outline-orange-500 focus:border-orange-500"
                                placeholder="Enter product name">
                    </div>

                    {{-- Price --}}
                    <div class="p-2">
                        <label class="block text-sm font-semibold text-gray-700 ">
                            Regular Price
                            <span class="text-red-500">*</span>
                        </label>
                        <input name="regular_price"
                                type="number"
                                class="w-full border border-gray-100 rounded p-1
                                focus:outline-orange-500 focus:border-orange-500"
                                placeholder="0.00">
                    </div>

                    {{-- Description --}}
                    <div class="p-2">
                        <label class="block text-sm font-semibold text-gray-700 ">
                            Description
                        </label>
                        <textarea name="description"
                                    rows="4"
                                    class="w-full border border-gray-100 rounded p-1
                                    focus:outline-orange-500 focus:border-orange-500"
                                    placeholder="Product description..."></textarea>
                    </div>

                    {{-- Category & Brand --}}
                    <div class="col-span-2 flex gap-5">

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
                </div>

                {{-- Image Upload --}}
                <div x-data="{ preview: null }">

                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Product Image
                    </label>

                    <label
                        class="relative flex flex-col items-center justify-center w-full h-80 border-2 border-dashed
                        border-orange-300 rounded-2xl cursor-pointer bg-orange-50 hover:bg-orange-100 transition overflow-hidden">

                        <!-- Preview Image -->
                        <template x-if="preview">
                            <img :src="preview"
                                class="flex items-center w-40 md:w-70 h-50 object-contain">
                        </template>

                        <!-- Overlay -->
                        <div class="relative z-10 flex flex-col items-center justify-center text-center bg-white/70 px-4 py-3 rounded-xl backdrop-blur-sm"
                            x-show="!preview">

                            <svg class="w-10 h-10 mb-3 text-orange-500"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M7 16V4m0 0L3 8m4-4l4 4m6 8v-8m0 8l-4-4m4 4l4-4">
                                </path>
                            </svg>

                            <p class="mb-1 text-sm text-gray-700">
                                <span class="font-semibold">Click to upload</span>
                                or drag and drop
                            </p>

                            <p class="text-xs text-gray-500">
                                PNG, JPG, WEBP
                            </p>
                        </div>

                        <!-- Change Button -->
                        <div x-show="preview"
                            class="absolute bottom-3 right-3 z-20">

                            <span
                                class="bg-black/60 text-white text-xs px-3 py-1.5 rounded-lg backdrop-blur-sm">
                                Change Image
                            </span>
                        </div>

                        <input type="file"
                            name="image"
                            accept="image/*"
                            class="hidden"
                            @change="
                                const file = $event.target.files[0];
                                if (file) {
                                    preview = URL.createObjectURL(file);
                                }
                            ">
                    </label>

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
