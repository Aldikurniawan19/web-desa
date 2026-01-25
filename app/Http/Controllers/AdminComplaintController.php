<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\Request;

class AdminComplaintController extends Controller
{
    public function index(Request $request)
    {
        $query = Complaint::latest();

        // Filter Status
        if ($request->has('status') && $request->status != 'all') {
            $query->where('status', $request->status);
        }

        $complaints = $query->paginate(10);

        return view('admin.complaints.index', compact('complaints'));
    }

    public function show($id)
    {
        $complaint = Complaint::findOrFail($id);
        return view('admin.complaints.show', compact('complaint'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required',
            'admin_response' => 'required|string',
        ]);

        $complaint = Complaint::findOrFail($id);

        $complaint->update([
            'status' => $request->status,
            'admin_response' => $request->admin_response
        ]);

        return redirect()->back()->with('success', 'Laporan berhasil ditindaklanjuti!');
    }
}
