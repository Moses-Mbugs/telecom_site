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
            'hero_title', 'hero_subtitle', 'hero_image', 'hero_video',
            'journey_title', 'journey_text', 'journey_image',
            'plans_title', 'plans_text', 'plans_image', 'plans_video',
            'why_us_1_title', 'why_us_1_text',
            'why_us_2_title', 'why_us_2_text',
            'why_us_3_title', 'why_us_3_text',
            'shop_video', 'shop_video_title', 'shop_video_text',
            'ad_active', 'ad_title', 'ad_subtitle', 'ad_link', 'ad_cta', 'ad_bg',
            'promo_active', 'promo_image', 'promo_video',
            'promo_title', 'promo_text', 'promo_cta', 'promo_link',
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
            'shop_video_title', 'shop_video_text',
            'ad_title', 'ad_subtitle', 'ad_link', 'ad_cta', 'ad_bg',
            'promo_title', 'promo_text', 'promo_cta', 'promo_link',
        ];

        $imageKeys = ['hero_image', 'journey_image', 'plans_image', 'promo_image'];
        $videoKeys = ['hero_video', 'plans_video', 'shop_video', 'promo_video'];

        $rules = [];
        foreach ($textKeys as $key) {
            $rules[$key] = 'nullable|string|max:1000';
        }
        foreach ($imageKeys as $key) {
            $rules[$key . '_file'] = 'nullable|image|max:5120';
        }
        foreach ($videoKeys as $key) {
            $rules[$key . '_file'] = 'nullable|mimes:mp4,mov,avi,wmv|max:51200'; // 50MB max
        }

        $request->validate($rules);

        // Save text fields
        foreach ($textKeys as $key) {
            HomepageSetting::set($key, $request->input($key));
        }

        $allFileKeys = array_merge($imageKeys, $videoKeys);

        // Save file uploads
        foreach ($allFileKeys as $key) {
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

        // Checkbox toggles (absent when unchecked)
        HomepageSetting::set('ad_active',    $request->has('ad_active')    ? '1' : '0');
        HomepageSetting::set('promo_active', $request->has('promo_active') ? '1' : '0');

        // Handle deletions for videos
        foreach (['hero_video', 'plans_video', 'shop_video', 'promo_video'] as $videoKey) {
            if ($request->has('remove_' . $videoKey)) {
                $oldPath = HomepageSetting::get($videoKey);
                if ($oldPath && !str_starts_with($oldPath, 'http')) {
                    \Illuminate\Support\Facades\Storage::disk('public')->delete($oldPath);
                }
                HomepageSetting::set($videoKey, null);
            }
        }

        return redirect()->route('admin.homepage.index')
            ->with('success', 'Homepage settings updated successfully.');
    }
}
