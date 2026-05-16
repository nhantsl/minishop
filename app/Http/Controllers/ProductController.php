<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index(Request $request){
        $query = Product::query();

        // SEARCH
        if ($request->filled('keyword')) {
            $keyword = $request->keyword;

            $query->where(function ($q) use ($keyword) {
                $q->where('name', 'like', '%' . $keyword . '%');
            });
        }

        // FILTER: brand
        $q_brands = $request->input('brands', []);
        $brands = Brand::all();

        // $query->when($q_brands, function ($q) use ($q_brands) {
        //     $q->whereIn('brand_id', $q_brands);
        // });

        // FILTER: category
        $q_categories = $request->input('categories', []);
        $categories = Category::all();

        // $query->when($q_categories, function ($q) use ($q_categories) {
        //     $q->whereIn('category_id', $q_categories);
        // });

        $query->where(function ($q) use ($q_brands, $q_categories) {

            if (!empty($q_brands)) {
                $q->whereIn('brand_id', $q_brands);
            }

            if (!empty($q_categories)) {

                // nếu đã có brand -> OR
                if (!empty($q_brands)) {
                    $q->orWhereIn('category_id', $q_categories);
                }

                // nếu chỉ có category
                else {
                    $q->whereIn('category_id', $q_categories);
                }
            }
        });
        // FILTER: price range
        $min = $request->min ?? 0;
        $max = $request->max ?? 999999;

        $query->whereBetween('regular_price', [$min, $max]);

        // SORT
        switch ($request->sort) {
            case 'price_asc':
                $query->orderBy('regular_price', 'asc');
                break;

            case 'price_desc':
                $query->orderBy('regular_price', 'desc');
                break;

            case 'newest':
                $query->orderBy('created_at', 'desc');
                break;

            default:
                $query->orderBy('id', 'desc');
        }

        $products = $query->Paginate(8);

        return view('home', compact('products', 'brands', 'q_brands', 'categories', 'q_categories'));
    }

   public function details(string $slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();

        // Các sản phẩm khác
        $other = Product::where('id', '!=', $product->id)
            ->paginate(8);

        // Random 5 sản phẩm
        $randomProducts = Product::where('id', '!=', $product->id)
            ->inRandomOrder()
            ->take(5)
            ->get();

        return view('details', compact(
            'product',
            'other',
            'randomProducts'
        ));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'regular_price' => 'required|numeric',
            'description' => 'nullable|string',
            'image' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
        ]);

        $data['slug'] = Str::slug($data['name']). '-' . time();

        Product::create($data);

        return redirect()->route('admin.index')
        ->with('success', 'Tạo sản phẩm thành công');
    }

    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('create', compact( 'brands', 'categories'));
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        if ($product->orderItems()->exists()) {
            return back()->withErrors('Product already used in orders');
        }

        $product->delete();

        return back()->with('success', 'Deleted!');
    }

}
