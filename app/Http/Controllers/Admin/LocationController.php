<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LocationController extends Controller
{
    public function index()
    {
        $locations = Location::all();
        return view('admin.locations.index', compact('locations'));
    }

    public function create()
    {
        return view('admin.locations.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'nullable|string|max:255',
            'map_embed_url' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        if (!empty($validated['map_embed_url'])) {
            $validated['map_embed_url'] = $this->convertToEmbedUrl($validated['map_embed_url']);
        }

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $validated['image_url'] = $request->file('image')->store('locations', 'public');
        }

        Location::create($validated);

        return redirect()->route('admin.locations.index')->with('success', 'Location created successfully.');
    }

    public function edit(Location $location)
    {
        return view('admin.locations.edit', compact('location'));
    }

    public function update(Request $request, Location $location)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'nullable|string|max:255',
            'map_embed_url' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        if (!empty($validated['map_embed_url'])) {
            $validated['map_embed_url'] = $this->convertToEmbedUrl($validated['map_embed_url']);
        }

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            if ($location->image_url && !str_starts_with($location->image_url, 'http')) {
                Storage::disk('public')->delete($location->image_url);
            }
            $validated['image_url'] = $request->file('image')->store('locations', 'public');
        }

        $location->update($validated);

        return redirect()->route('admin.locations.index')->with('success', 'Location updated successfully.');
    }

    private function convertToEmbedUrl(string $url): string
    {
        $url = trim($url);

        // Already a valid embed URL — pass through unchanged
        if (str_contains($url, '/maps/embed') || str_contains($url, 'output=embed')) {
            return $url;
        }

        // Resolve short URLs (maps.app.goo.gl, goo.gl, etc.) by following redirects
        if (str_contains($url, 'goo.gl')) {
            $url = $this->resolveRedirect($url);
        }

        // Extract coordinates from /@lat,lng,zoom pattern (standard Google Maps place URLs)
        if (preg_match('/@(-?\d+\.\d+),(-?\d+\.\d+)/', $url, $m)) {
            return "https://maps.google.com/maps?q={$m[1]},{$m[2]}&output=embed";
        }

        // Extract coordinates from ?q=lat,lng format
        if (preg_match('/[?&]q=(-?\d+\.\d+),(-?\d+\.\d+)/', $url, $m)) {
            return "https://maps.google.com/maps?q={$m[1]},{$m[2]}&output=embed";
        }

        // Generic google.com/maps URL — append output=embed
        if (str_contains($url, 'google.com/maps')) {
            $separator = str_contains($url, '?') ? '&' : '?';
            return $url . $separator . 'output=embed';
        }

        return $url;
    }

    private function resolveRedirect(string $url): string
    {
        if (!function_exists('curl_init')) {
            return $url;
        }

        $ch = curl_init($url);
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_NOBODY         => true,
            CURLOPT_TIMEOUT        => 5,
            CURLOPT_USERAGENT      => 'Mozilla/5.0',
        ]);
        curl_exec($ch);
        $final = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
        curl_close($ch);

        return $final ?: $url;
    }

    public function destroy(Location $location)
    {
        if ($location->image_url && !str_starts_with($location->image_url, 'http')) {
            Storage::disk('public')->delete($location->image_url);
        }
        $location->delete();

        return redirect()->route('admin.locations.index')->with('success', 'Location deleted successfully.');
    }
}

