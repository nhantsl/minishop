@extends('layouts.app')

@section('content')
<!-- About Us Section -->
<section class="bg-white mt-2 rounded p-2">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">

        <!-- Heading -->
        <div class="text-center mb-12">
            <p class="text-gray-600 max-w-2xl mx-auto">
                Mini Shop là nơi mang đến những sản phẩm chất lượng,
                giá hợp lý và trải nghiệm mua sắm đơn giản dành cho mọi khách hàng.
            </p>
        </div>

        <!-- Content -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

            <!-- Image -->
            <div>
                <img
                    src="../images/about.jpg"
                    alt="About Us"
                    class="rounded-2xl shadow-lg w-full object-cover h-112"
                >
            </div>

            <!-- Text -->
            <div>

                <h3 class="text-2xl font-semibold text-gray-900 mb-4">
                    Our Story
                </h3>

                <p class="text-gray-600 leading-relaxed mb-6">
                    Chúng tôi bắt đầu với mong muốn tạo ra một cửa hàng online
                    đơn giản nhưng hiện đại, giúp khách hàng dễ dàng tìm kiếm
                    và mua những sản phẩm yêu thích.
                </p>

                <p class="text-gray-600 leading-relaxed mb-6">
                    Với tiêu chí chất lượng – uy tín – trải nghiệm,
                    Mini Shop luôn cập nhật các sản phẩm mới và cải thiện
                    dịch vụ mỗi ngày.
                </p>

                <!-- Features -->
                <div class="grid grid-cols-2 gap-4 mb-8">

                    <div class="bg-gray-100 rounded-xl p-4">
                        <h4 class="font-bold text-lg text-gray-900">
                            1000+
                        </h4>
                        <p class="text-gray-600 text-sm">
                            Products
                        </p>
                    </div>

                    <div class="bg-gray-100 rounded-xl p-4">
                        <h4 class="font-bold text-lg text-gray-900">
                            500+
                        </h4>
                        <p class="text-gray-600 text-sm">
                            Happy Customers
                        </p>
                    </div>

                    <div class="bg-gray-100 rounded-xl p-4">
                        <h4 class="font-bold text-lg text-gray-900">
                            24/7
                        </h4>
                        <p class="text-gray-600 text-sm">
                            Support
                        </p>
                    </div>

                    <div class="bg-gray-100 rounded-xl p-4">
                        <h4 class="font-bold text-lg text-gray-900">
                            Fast
                        </h4>
                        <p class="text-gray-600 text-sm">
                            Delivery
                        </p>
                    </div>

                </div>

                <!-- Button -->
                <a href="/"
                    class="inline-block bg-orange-500 text-white px-6 py-3 rounded-xl hover:bg-orange-600 transition">
                    Explore Products
                </a>

            </div>
        </div>
    </div>
</section>
@endsection
