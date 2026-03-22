<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['category', 'brand'])->orderBy('created_at', 'desc')->paginate(15);
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        $brands     = Brand::all();
        return view('admin.products.create', compact('categories', 'brands'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'            => 'required|string|max:255',
            'description'     => 'nullable|string',
            'price'           => 'required|numeric|min:0',
            'discount_price'  => 'nullable|numeric|min:0',
            'deposit_amount'  => 'nullable|numeric|min:0',
            'monthly_payment' => 'nullable|numeric|min:0',
            'stock'           => 'required|integer|min:0',
            'category_id'     => 'nullable|exists:categories,id',
            'brand_id'        => 'nullable|exists:brands,id',
            'is_featured'     => 'boolean',
            'image'           => 'nullable|image|max:5120',
        ]);

        $imagePath = null;
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $imagePath = $request->file('image')->store('products', 'public');
        }

        Product::create([
            'name'            => $validated['name'],
            'slug'            => Str::slug($validated['name']) . '-' . Str::random(4),
            'description'     => $validated['description'] ?? null,
            'price'           => $validated['price'],
            'discount_price'  => $validated['discount_price'] ?? null,
            'deposit_amount'  => $validated['deposit_amount'] ?? null,
            'monthly_payment' => $validated['monthly_payment'] ?? null,
            'stock'           => $validated['stock'],
            'category_id'     => $validated['category_id'] ?? null,
            'brand_id'        => $validated['brand_id'] ?? null,
            'is_featured'     => $request->boolean('is_featured'),
            'image'           => $imagePath,
        ]);

        return redirect()->route('admin.products.index')
            ->with('success', 'Product created successfully.');
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        $brands     = Brand::all();
        return view('admin.products.edit', compact('product', 'categories', 'brands'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name'            => 'required|string|max:255',
            'description'     => 'nullable|string',
            'price'           => 'required|numeric|min:0',
            'discount_price'  => 'nullable|numeric|min:0',
            'deposit_amount'  => 'nullable|numeric|min:0',
            'monthly_payment' => 'nullable|numeric|min:0',
            'stock'           => 'required|integer|min:0',
            'category_id'     => 'nullable|exists:categories,id',
            'brand_id'        => 'nullable|exists:brands,id',
            'is_featured'     => 'boolean',
            'image'           => 'nullable|image|max:5120',
        ]);

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $validated['image'] = $request->file('image')->store('products', 'public');
        } else {
            unset($validated['image']);
        }

        $validated['is_featured'] = $request->boolean('is_featured');

        $product->update($validated);

        return redirect()->route('admin.products.index')
            ->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index')
            ->with('success', 'Product deleted.');
    }
}
