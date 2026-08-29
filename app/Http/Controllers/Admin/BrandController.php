<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::orderBy('name')->get();
        return view('admin.brands.index', compact('brands'));
    }

    public function create()
    {
        return view('admin.brands.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:brands,slug',
            'logo' => 'nullable|image|max:2048',
        ]);

        $slug = $validated['slug'] ?? Str::slug($validated['name']);
        if (Brand::where('slug', $slug)->exists()) {
            $slug = $slug . '-' . Str::random(4);
        }

        $logoPath = null;
        if ($request->hasFile('logo') && $request->file('logo')->isValid()) {
            $this->assertAllowedMimeType($request->file('logo'), self::ALLOWED_IMAGE_MIMES, 'logo');
            $logoPath = $request->file('logo')->store('brands', 'public');
        }

        Brand::create([
            'name' => $validated['name'],
            'slug' => $slug,
            'logo' => $logoPath,
        ]);

        return redirect()->route('admin.brands.index')->with('success', 'Brand created successfully.');
    }

    public function edit(Brand $brand)
    {
        return view('admin.brands.edit', compact('brand'));
    }

    public function update(Request $request, Brand $brand)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:brands,slug,' . $brand->id,
            'logo' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('logo') && $request->file('logo')->isValid()) {
            $this->assertAllowedMimeType($request->file('logo'), self::ALLOWED_IMAGE_MIMES, 'logo');
            if ($brand->logo && !str_starts_with($brand->logo, 'http')) {
                Storage::disk('public')->delete($brand->logo);
            }
            $validated['logo'] = $request->file('logo')->store('brands', 'public');
        } else {
            unset($validated['logo']);
        }

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['name']);
            if (Brand::where('slug', $validated['slug'])->where('id', '!=', $brand->id)->exists()) {
                $validated['slug'] = $validated['slug'] . '-' . Str::random(4);
            }
        }

        $brand->update($validated);

        return redirect()->route('admin.brands.index')->with('success', 'Brand updated successfully.');
    }

    public function destroy(Brand $brand)
    {
        if ($brand->logo && !str_starts_with($brand->logo, 'http')) {
            Storage::disk('public')->delete($brand->logo);
        }
        $brand->delete();

        return redirect()->route('admin.brands.index')->with('success', 'Brand deleted successfully.');
    }
}

