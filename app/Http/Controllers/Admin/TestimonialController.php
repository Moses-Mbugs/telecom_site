<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::orderBy('created_at', 'desc')->get();
        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        return view('admin.testimonials.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'client_name' => 'required|string|max:255',
            'content'     => 'required|string|max:1000',
            'rating'      => 'required|integer|min:1|max:5',
            'image'       => 'nullable|image|max:2048',
        ]);

        $imageUrl = null;
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $imageUrl = $request->file('image')->store('testimonials', 'public');
        }

        Testimonial::create([
            'client_name' => $validated['client_name'],
            'content'     => $validated['content'],
            'rating'      => $validated['rating'],
            'image_url'   => $imageUrl,
        ]);

        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Testimonial added successfully.');
    }

    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $validated = $request->validate([
            'client_name' => 'required|string|max:255',
            'content'     => 'required|string|max:1000',
            'rating'      => 'required|integer|min:1|max:5',
            'image'       => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $validated['image_url'] = $request->file('image')->store('testimonials', 'public');
        }

        $testimonial->update([
            'client_name' => $validated['client_name'],
            'content'     => $validated['content'],
            'rating'      => $validated['rating'],
            'image_url'   => $validated['image_url'] ?? $testimonial->image_url,
        ]);

        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Testimonial updated successfully.');
    }

    public function destroy(Testimonial $testimonial)
    {
        if ($testimonial->image_url && !str_starts_with($testimonial->image_url, 'http')) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($testimonial->image_url);
        }
        $testimonial->delete();
        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Testimonial deleted.');
    }
}
