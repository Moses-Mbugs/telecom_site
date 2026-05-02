<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function index()
    {
        $events = CompanyEvent::latest()->get();
        return view('admin.events.index', compact('events'));
    }

    public function create()
    {
        return view('admin.events.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'image'       => 'required|image|max:4096',
        ]);

        $imagePath = $request->file('image')->store('events', 'public');

        CompanyEvent::create([
            'title'       => $request->title,
            'description' => $request->description,
            'image'       => $imagePath,
        ]);

        return redirect()->route('admin.events.index')
            ->with('success', 'Event added successfully.');
    }

    public function edit(CompanyEvent $event)
    {
        return view('admin.events.edit', compact('event'));
    }

    public function update(Request $request, CompanyEvent $event)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'image'       => 'nullable|image|max:4096',
        ]);

        $data = ['title' => $request->title, 'description' => $request->description];

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($event->image);
            $data['image'] = $request->file('image')->store('events', 'public');
        }

        $event->update($data);

        return redirect()->route('admin.events.index')
            ->with('success', 'Event updated successfully.');
    }

    public function destroy(CompanyEvent $event)
    {
        Storage::disk('public')->delete($event->image);
        $event->delete();
        return redirect()->route('admin.events.index')
            ->with('success', 'Event deleted.');
    }
}
