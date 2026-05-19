<footer class="mt-2 bg-white rounded p-4">
    {{-- GRID --}}
    <div class=" grid grid-cols-2 gap-8 sm:grid-cols-2 lg:grid-cols-4">

        {{-- BRAND --}}
        <div class="col-span-2 lg:col-span-1">
            <h2 class=" text-xl sm:text-2xl font-bold text-gray-900">
                MiniShop
            </h2>

            <p class="mt-3 text-sm leading-6 text-gray-600">
                Cửa hàng nước giải khát hiện đại,
                giao hàng nhanh chóng.
            </p>

            {{-- SOCIAL --}}
            <div class=" flex items-center gap-2 mt-4">

                <a href="#"
                    class="
                        flex h-9 w-9 items-center justify-center
                        rounded-full
                        bg-white
                        text-sm
                        shadow-sm
                        hover:text-orange-500
                        hover:border-orange-400
                        transition
                    ">
                    🌐
                </a>

                <a href="#"
                    class="
                        flex h-9 w-9 items-center justify-center
                        rounded-full
                        bg-white
                        text-sm
                        shadow-sm
                        hover:text-orange-500
                        hover:border-orange-400
                        transition
                    ">
                    📘
                </a>

                <a href="#"
                    class="
                        flex h-9 w-9 items-center justify-center
                        rounded-full
                        bg-white
                        text-sm
                        shadow-sm
                        hover:text-orange-500
                        hover:border-orange-400
                        transition
                    ">
                    📸
                </a>

            </div>

        </div>

        {{-- LINKS --}}
        <div>
            <h3 class=" text-base font-semibold text-gray-900 mb-3 ">
                Liên kết
            </h3>

            <ul class=" space-y-2 text-sm ">
                <li>
                    <a href="/"
                        class="text-gray-600 hover:text-orange-500 transition">
                        Trang chủ
                    </a>
                </li>

                <li>
                    <a href="/"
                        class="text-gray-600 hover:text-orange-500 transition">
                        Sản phẩm
                    </a>
                </li>

                <li>
                    <a href="about"
                        class="text-gray-600 hover:text-orange-500 transition
                        ">
                        Giới thiệu
                    </a>
                </li>

                <li>
                    <a href="contact"
                        class="text-gray-600 hover:text-orange-500 transition">
                        Liên hệ
                    </a>
                </li>

            </ul>

        </div>

        {{-- SUPPORT --}}
        <div>
            <h3 class="text-base font-semibold  text-gray-900 mb-3
            ">
                Hỗ trợ
            </h3>

            <ul class="space-y-2 text-sm  text-gray-600 ">
                <li>📧 support@minishop.com</li>
                <li>📞 0123 456 789</li>
                <li>🕒 8AM - 9PM</li>
            </ul>
        </div>

        {{-- NEWSLETTER --}}
        <div class="col-span-2 lg:col-span-1">

            <h3 class="text-base font-semibold text-gray-900 mb-3 ">
                Nhận tin mới
            </h3>

            <form class="flex flex-col gap-2">
                <input type="email" placeholder="Nhập email..."
                    class=" flex-1 rounded-xl border border-gray-300 px-4
                        py-2.5 text-sm focus:border-orange-500 focus:outline-orange-500
                    ">
                <button
                    class="rounded-xl bg-orange-500 px-5 py-2.5 text-sm
                    font-semibold text-white transition hover:bg-orange-600
                    ">
                    Đăng ký
                </button>
            </form>

        </div>

    </div>

    {{-- BOTTOM --}}
    <div class=" mt-8 border-t border-gray-200 pt-5 flex flex-col gap-3 text-center text-xs
        text-gray-500 sm:flex-row sm:items-center sm:justify-between
    ">
        <p>
            © 2026 MiniShop. All rights reserved.
        </p>

        <div class=" flex justify-center gap-4
        ">
            <a href="#" class="hover:text-orange-500 transition">
                Privacy
            </a>
            <a href="#" class="hover:text-orange-500 transition">
                Terms
            </a>
        </div>
    </div>

</footer>
