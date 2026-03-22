<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomepageSetting;
use Illuminate\Http\Request;

class HomepageSettingController extends Controller
{
    public function index()
    {
        $keys = [
            'hero_title', 'hero_subtitle', 'hero_image',
            'journey_title', 'journey_text', 'journey_image',
            'plans_title', 'plans_text', 'plans_image',
            'why_us_1_title', 'why_us_1_text',
            'why_us_2_title', 'why_us_2_text',
            'why_us_3_title', 'why_us_3_text',
        ];

        $settings = HomepageSetting::whereIn('key', $keys)->pluck('value', 'key');

        return view('admin.homepage', compact('settings', 'keys'));
    }

    public function update(Request $request)
    {
        $textKeys = [
            'hero_title', 'hero_subtitle',
            'journey_title', 'journey_text',
            'plans_title', 'plans_text',
            'why_us_1_title', 'why_us_1_text',
            'why_us_2_title', 'why_us_2_text',
            'why_us_3_title', 'why_us_3_text',
        ];

        $imageKeys = ['hero_image', 'journey_image', 'plans_image'];

        $rules = [];
        foreach ($textKeys as $key) {
            $rules[$key] = 'nullable|string|max:1000';
        }
        foreach ($imageKeys as $key) {
            $rules[$key . '_file'] = 'nullable|image|max:5120';
        }

        $validated = $request->validate($rules);

        // Save text fields
        foreach ($textKeys as $key) {
            HomepageSetting::set($key, $request->input($key));
        }

        // Save image uploads
        foreach ($imageKeys as $key) {
            $fileField = $key . '_file';
            if ($request->hasFile($fileField) && $request->file($fileField)->isValid()) {
                $oldPath = HomepageSetting::get($key);
                if ($oldPath && !str_starts_with($oldPath, 'http')) {
                    \Illuminate\Support\Facades\Storage::disk('public')->delete($oldPath);
                }
                $path = $request->file($fileField)->store('homepage', 'public');
                HomepageSetting::set($key, $path);
            }
        }

        return redirect()->route('admin.homepage.index')
            ->with('success', 'Homepage settings updated successfully.');
    }
}
