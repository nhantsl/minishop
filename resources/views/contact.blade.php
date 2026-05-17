@extends('layouts.app')

@section('content')

<section class="mt-2 bg-white rounded py-2">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">

            <!-- Left: Form -->
            <div class="lg:col-span-7">

                <div>
                    <div class="mb-6">
                        <h2 class="text-3xl font-bold">Contact Us</h2>
                        <p class="text-gray-600 mt-2">
                            Your email address will not be published. Required fields are marked *
                        </p>
                    </div>

                    <form class="grid grid-cols-1 md:grid-cols-2 gap-4">

                        <!-- First Name -->
                        <div>
                            <label class="block text-gray-700 mb-1">First Name</label>
                            <input type="text"
                                placeholder="Enter Your First Name"
                                class="w-full border-gray-300 rounded p-2 focus:ring-orange-500">
                        </div>

                        <!-- Last Name -->
                        <div>
                            <label class="block text-gray-700 mb-1">Last Name</label>
                            <input type="text"
                                placeholder="Enter Your Last Name"
                                class="w-full border-gray-300 rounded p-2 focus:ring-orange-500">
                        </div>

                        <!-- Email -->
                        <div>
                            <label class="block text-gray-700 mb-1">Email</label>
                            <input type="email"
                                placeholder="Enter Your Email Address"
                                class="w-full border-gray-300 rounded p-2 focus:ring-orange-500">
                        </div>

                        <!-- Phone -->
                        <div>
                            <label class="block text-gray-700 mb-1">Phone</label>
                            <input type="text"
                                placeholder="Enter Your Phone Number"
                                class="w-full border-gray-300 rounded p-2 focus:ring-orange-500">
                        </div>

                        <!-- Comment -->
                        <div class="md:col-span-2">
                            <label class="block text-gray-700 mb-1">Comment</label>
                            <textarea rows="5"
                                class="w-full border-gray-300 rounded p-2 focus:ring-orange-500"></textarea>
                        </div>

                        <!-- Button -->
                        <div class="md:col-span-2">
                            <button type="submit"
                                class="bg-black text-white px-6 py-3 rounded-lg hover:bg-gray-800 transition">
                                Submit
                            </button>
                        </div>

                    </form>
                </div>

            </div>

            <!-- Right: Contact Info -->
            <div class="lg:col-span-5">

                <div>
                    <h2 class="text-3xl font-bold text-gray-900">Let's get in touch</h2>
                    <h5 class="text-gray-500 mt-2">
                        We're open for any suggestion or just to have a chat
                    </h5>

                    <!-- Address -->
                    <div class="flex items-start gap-4 mt-8">
                        <div class="text-black text-xl">
                            📍
                        </div>
                        <div>
                            <h4 class="font-semibold">Address :</h4>
                            <p class="text-gray-600">Binh Thanh, Sai Gon</p>
                        </div>
                    </div>

                    <!-- Phone -->
                    <div class="flex items-start gap-4 mt-6">
                        <div class="text-black text-xl">
                            📞
                        </div>
                        <div>
                            <h4 class="font-semibold">Phone Number :</h4>
                            <p class="text-gray-600">+84 12345678</p>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="flex items-start gap-4 mt-6">
                        <div class="text-black text-xl">
                            ✉️
                        </div>
                        <div>
                            <h4 class="font-semibold">Email Address :</h4>
                            <p class="text-gray-600">support@minishop.com</p>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>
</section>

@endsection
