<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PartnerController extends Controller
{
    public function index()
    {
        $partners = Partner::latest()->get();
        return view('admin.partners.index', compact('partners'));
    }

    public function create()
    {
        return view('admin.partners.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'required|mimes:jpg,jpeg,png,gif,webp,svg|max:2048',
        ]);

        $logoPath = $request->file('logo')->store('partners', 'public');

        Partner::create([
            'name'      => $request->name,
            'logo'      => $logoPath,
            'is_active' => $request->boolean('is_active', true),
        ]);

        return redirect()->route('admin.partners.index')
            ->with('success', 'Partner added successfully.');
    }

    public function edit(Partner $partner)
    {
        return view('admin.partners.edit', compact('partner'));
    }

    public function update(Request $request, Partner $partner)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|mimes:jpg,jpeg,png,gif,webp,svg|max:2048',
        ]);

        $data = [
            'name'      => $request->name,
            'is_active' => $request->boolean('is_active'),
        ];

        if ($request->hasFile('logo')) {
            Storage::disk('public')->delete($partner->logo);
            $data['logo'] = $request->file('logo')->store('partners', 'public');
        }

        $partner->update($data);

        return redirect()->route('admin.partners.index')
            ->with('success', 'Partner updated successfully.');
    }

    public function destroy(Partner $partner)
    {
        Storage::disk('public')->delete($partner->logo);
        $partner->delete();
        return redirect()->route('admin.partners.index')
            ->with('success', 'Partner removed.');
    }
}
