<?php

namespace App\Http\Controllers;

use App\Models\HeroSlide;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminSettingController extends Controller
{
    public function index()
    {
        $setting = SiteSetting::first();
        $slides = HeroSlide::latest()->get();

        return view('admin.settings.index', compact('setting', 'slides'));
    }

    public function update(Request $request)
    {
        $setting = SiteSetting::first();

        $request->validate([
            'site_name' => 'required|string|max:255',
            'kabupaten_name' => 'required|string|max:255',
            'site_logo' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
            'hero_title' => 'nullable|string|max:255',
            'hero_description' => 'nullable|string|max:500',
            'hero_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:4096',
        ]);

        $data = [
            'site_name' => $request->site_name,
            'kabupaten_name' => $request->kabupaten_name,
            'hero_title' => $request->hero_title,
            'hero_description' => $request->hero_description,
        ];

        if ($request->hasFile('site_logo')) {
            if ($setting->site_logo && Storage::exists('public/' . $setting->site_logo)) {
                Storage::delete('public/' . $setting->site_logo);
            }

            $path = $request->file('site_logo')->store('settings', 'public');
            $data['site_logo'] = $path;
        }

        if ($request->hasFile('hero_image')) {
            if ($setting->hero_image && Storage::exists('public/' . $setting->hero_image)) {
                Storage::delete('public/' . $setting->hero_image);
            }
            $data['hero_image'] = $request->file('hero_image')->store('settings/hero', 'public');
        }

        $setting->update($data);

        return redirect()->back()->with('success', 'Pengaturan website berhasil diperbarui.');
    }
}
