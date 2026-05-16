<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{

    public function run(): void
    {
        $products = [
            [
                'name' => 'Cocacola',
                'description' => 'Hương vị đặc trưng, giúp giải khát nhanh,
                kích thích vị giác và tăng thêm hứng khởi trong từng khoảnh khắc.',
                'regular_price' => 10600,
                'image' => '1.jpg',
                'category' => 'Soda',
                'brand' => 'Cocacola',
            ],

            [
                'name' => 'Soya',
                'description' => 'Sản phẩm sữa hạt thơm ngon, với protein từ đậu nành
                 duy trì năng lượng cho cơ thể chắc khỏe mỗi ngày.',
                'regular_price' => 9300,
                'image' => '2.jpg',
                'category' => 'Milk',
                'brand' => 'Number1',
            ],

            [
                'name' => '0 Độ',
                'description' => 'Chiết xuất từ những lá trà tươi ngon của vùng đất Thái Nguyên,
                nơi thiên nhiên ưu ái với khí hậu, thổ nhưỡng gia hòa, tạo ra những cánh đồng trà xanh chất lượng cao. ',
                'regular_price' => 10300,
                'image' => '3.jpg',
                'category' => 'Tea',
                'brand' => 'Number1',
            ],

            [
                'name' => 'Revive',
                'description' => 'Bù khoáng, giảm mất nước,
                hỗ trợ cung cấp năng lượng và thuận tiện mang theo bên mình cho mọi chuyến đi',
                'regular_price' => 11800,
                'image' => '4.jpg',
                'category' => 'Soda',
                'brand' => 'Pepsico',
            ],

            [
                'name' => 'Sprite',
                'description' => 'Hương vị cổ điển, mát lạnh của chanh tươi,
                hoàn toàn không chứa caffeine, với 100% hương chanh tự nhiên.',
                'regular_price' => 9800,
                'image' => '5.jpg',
                'category' => 'Soda',
                'brand' => 'Cocacola',
            ],

            [
                'name' => 'Sting',
                'description' => 'Vị dâu ngon đặc trưng, công thức chứa hồng sâm 4 năm tuổi và vitamin nhóm B,
                mang đến nguồn năng lượng bùng nổ sảng khoái. Sting, Bật năng lượng sống bứt phá!',
                'regular_price' => 11600,
                'image' => '6.jpg',
                'category' => 'Energy',
                'brand' => 'Pepsico',
            ],

            [
                'name' => 'Fanta',
                'description' => 'Nổi tiếng giúp giải khát sau khi hoạt động ngoài trời,
                giải tỏa căng thẳng, mệt mỏi khi học tập, làm việc.',
                'regular_price' => 9800,
                'image' => '7.jpg',
                'category' => 'Juice',
                'brand' => 'Fanta',
            ],

            [
                'name' => 'Fanta Kem',
                'description' => 'Sản phẩm nước ngọt giải khát từ thương hiệu nước ngọt Fanta
                nổi tiếng được nhiều người ưa chuộng với hương vị độc đáo hấp dẫn.',
                'regular_price' => 11800,
                'image' => '8.jpg',
                'category' => 'Juice',
                'brand' => 'Fanta',
            ],

            [
                'name' => 'Fanta Nho',
                'description' => 'Sản phẩm nước ngọt có ga thơm ngon hấp dẫn đến từ
                thương hiệu nước ngọt Fanta nổi tiếng trên thế giới.',
                'regular_price' => 9800,
                'image' => '9.jpg',
                'category' => 'Juice',
                'brand' => 'Fanta',
            ],

            [
                'name' => 'Tea Plus',
                'description' => 'Với hương vị ngọt nhẹ thanh mát, mùi thơm đặc trưng của trà
                 ô long cùng hoạt chất OTTP giúp hạn chế hấp thu chất béo.',
                'regular_price' => 10800,
                'image' => '10.jpg',
                'category' => 'Tea',
                'brand' => 'Pepsico',
            ],

            [
                'name' => 'Nutri Cam',
                'description' => 'Nutri Boost với vị cam dễ uống thơm ngon, bổ dưỡng. Giúp bù đắp nước,
                bổ sung năng lượng, vitamin, Canxi và Kẽm có lợi cho cơ thể, xua tan cơn khát và mệt mỏi',
                'regular_price' => 11210,
                'image' => '11.jpg',
                'category' => 'Milk',
                'brand' => 'Nutri',
            ],

            [
                'name' => 'Nutri Dâu',
                'description' => 'Sữa vị dâu giúp bổ sung canxi cho hệ xương khớp chắc khỏe,
                các vitamin được bổ sung, tăng cường hệ miễn dịch, bảo vệ đôi mắt sáng khỏe.',
                'regular_price' => 11210,
                'image' => '12.jpg',
                'category' => 'Milk',
                'brand' => 'Nutri',
            ],

            [
                'name' => 'Nutri Kem',
                'description' => 'Sữa trái cây hương vị mới lạ độc đáo nổi tiếng
                với là sự kết hợp hoàn hảo từ sữa và nước ép táo cùng hương bánh quy kem thơm thơm hấp dẫn. ',
                'regular_price' => 11210,
                'image' => '13.jpg',
                'category' => 'Milk',
                'brand' => 'Nutri',
            ],

            [
                'name' => 'Schweppes Ginger',
                'description' => 'Schweppes Ginger Ale là loại nước giải khát có ga hương gừng,
                nổi tiếng với vị cay nhẹ, ngọt dịu và sảng khoái.',
                'regular_price' => 7400,
                'image' => '14.jpg',
                'category' => 'Soda',
                'brand' => 'Cocacola',
            ],

            [
                'name' => 'Dr Thanh',
                'description' => 'Trà thảo mộc Dr. Thanh là thức uống giải khát, chiết xuất từ 9 loại thảo mộc tự nhiên
                (kim ngân hoa, la hán quả, cam thảo...) giúp thanh nhiệt, giải độc và giảm nóng trong người. ',
                'regular_price' => 8600,
                'image' => '15.jpg',
                'category' => 'Tea',
                'brand' => 'Number1',
            ],

            [
                'name' => 'Fuze',
                'description' => 'Trà được làm từ trà xanh tươi mát, quả chanh chua ngọt sảng khoái và hương sả thơm thư giãn,
                thơm ngon, lạ miệng mà vô cùng tốt cho sức khỏe.',
                'regular_price' => 11300,
                'image' => '16.jpg',
                'category' => 'Tea',
                'brand' => 'Cocacola',
            ],

            [
                'name' => 'Number1',
                'description' => 'Sản phẩm nước tăng lực chất lượng thơm ngon của thương hiệu nước tăng lực Number 1.
                Caffein giúp người sử dụng nạp nhanh năng lượng đồng thời duy trì sự tỉnh táo để chinh phục mọi thử thách.',
                'regular_price' => 11300,
                'image' => '17.jpg',
                'category' => 'Energy',
                'brand' => 'Number1',
            ],

            [
                'name' => 'Schweppes Soda',
                'description' => 'Sản phẩm nổi bật với vị thanh mát, không đường (loại Soda Water truyền thống)
                hoặc vị nhẹ dịu, chuyên dùng để uống trực tiếp, pha chế cocktail/mocktail',
                'regular_price' => 7400,
                'image' => '18.jpg',
                'category' => 'Soda',
                'brand' => 'Cocacola',
            ],

            [
                'name' => 'Sting Gold',
                'description' => 'Thành phần tự nhiên kết hợp với hương vị nhân sâm tạo nên sự kết hợp độc đáo
                với mùi vị thơm ngon, sảng khoái. Cho bạn cảm giác cuộn trào hứng khởi',
                'regular_price' => 11500,
                'image' => '19.jpg',
                'category' => 'Energy',
                'brand' => 'Pepsico',
            ],

            [
                'name' => 'Rockstar',
                'description' => 'Nước tăng lực đến từ Mỹ, với công thức Pro-Power chứa gấp 9
                lần Taurin, gấp 3 lần Vitamin B3, B6 và Nhân sâm, chắc sức bền chẳng ngại ngày dài!',
                'regular_price' => 10900,
                'image' => '20.jpg',
                'category' => 'Energy',
                'brand' => 'Pepsico',
            ],
        ];

        foreach ($products as $item) {

            $category = Category::where('name', $item['category'])->first();

            $brand = Brand::where('name', $item['brand'])->first();

            Product::create([
                'name' => $item['name'],
                'slug' => Str::slug($item['name']),
                'description' => $item['description'],
                'regular_price' => $item['regular_price'],
                'image' => $item['image'],
                'category_id' => $category->id,
                'brand_id' => $brand->id,
            ]);
        }
    }
}
