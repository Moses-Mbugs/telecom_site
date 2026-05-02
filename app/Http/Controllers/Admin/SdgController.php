<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SdgItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SdgController extends Controller
{
    public function index()
    {
        $sdgItems = SdgItem::orderBy('sdg_number')->get();
        return view('admin.sdg.index', compact('sdgItems'));
    }

    public function create()
    {
        return view('admin.sdg.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'sdg_number'           => 'required|integer|min:1|max:17',
            'title'                => 'required|string|max:255',
            'description'          => 'required|string',
            'company_contribution' => 'required|string',
            'image'                => 'nullable|image|max:4096',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('sdg', 'public');
        }

        SdgItem::create([
            'sdg_number'           => $request->sdg_number,
            'title'                => $request->title,
            'description'          => $request->description,
            'company_contribution' => $request->company_contribution,
            'image'                => $imagePath,
        ]);

        return redirect()->route('admin.sdg.index')
            ->with('success', 'SDG item added successfully.');
    }

    public function edit(SdgItem $sdg)
    {
        return view('admin.sdg.edit', compact('sdg'));
    }

    public function update(Request $request, SdgItem $sdg)
    {
        $request->validate([
            'sdg_number'           => 'required|integer|min:1|max:17',
            'title'                => 'required|string|max:255',
            'description'          => 'required|string',
            'company_contribution' => 'required|string',
            'image'                => 'nullable|image|max:4096',
        ]);

        $data = [
            'sdg_number'           => $request->sdg_number,
            'title'                => $request->title,
            'description'          => $request->description,
            'company_contribution' => $request->company_contribution,
        ];

        if ($request->hasFile('image')) {
            if ($sdg->image) {
                Storage::disk('public')->delete($sdg->image);
            }
            $data['image'] = $request->file('image')->store('sdg', 'public');
        }

        $sdg->update($data);

        return redirect()->route('admin.sdg.index')
            ->with('success', 'SDG item updated successfully.');
    }

    public function destroy(SdgItem $sdg)
    {
        if ($sdg->image) {
            Storage::disk('public')->delete($sdg->image);
        }
        $sdg->delete();
        return redirect()->route('admin.sdg.index')
            ->with('success', 'SDG item deleted.');
    }
}
