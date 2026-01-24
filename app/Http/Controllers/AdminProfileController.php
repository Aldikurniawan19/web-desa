<?php

namespace App\Http\Controllers;

use App\Models\VillageProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminProfileController extends Controller
{
    public function index()
    {
        $profile = VillageProfile::first();

        if (!$profile) {
            $profile = new VillageProfile();
        }

        return view('admin.profile.index', compact('profile'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'history_description' => 'required',
            'history_image' => 'nullable|image|max:2048',
            'vision' => 'required',
            'missions' => 'required',
        ]);

        $profile = VillageProfile::first();
        if (!$profile) {
            $profile = new VillageProfile();
        }

        $data = $request->all();


        if ($request->hasFile('history_image')) {
            if ($profile->history_image) {
                Storage::disk('public')->delete($profile->history_image);
            }
            $data['history_image'] = $request->file('history_image')->store('profile', 'public');
        }

        $missions_array = array_filter(preg_split('/\r\n|\r|\n/', $request->missions));
        $data['missions'] = array_values($missions_array);

        if ($profile->exists) {
            $profile->update($data);
        } else {
            VillageProfile::create($data);
        }

        return redirect()->back()->with('success', 'Profil Desa berhasil diperbarui!');
    }
}
