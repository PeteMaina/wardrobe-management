<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WardrobeItem;
use Illuminate\Support\Facades\Storage;

class WardrobeController extends Controller
{
    // List wardrobe items
    public function index()
    {
        return auth()->user()->wardrobeItems()->get();
    }

    // Store a new item
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $path = $request->file('image') ? $request->file('image')->store('wardrobe_images', 'public') : null;

        $item = WardrobeItem::create([
            'user_id' => auth()->id(),
            'name' => $request->name,
            'category' => $request->category,
            'description' => $request->description,
            'image' => $path,
        ]);

        return response()->json($item, 201);
    }

    // Show a single item
    public function show($id)
    {
        return WardrobeItem::where('user_id', auth()->id())->findOrFail($id);
    }

    // Update an item
    public function update(Request $request, $id)
    {
        $item = WardrobeItem::where('user_id', auth()->id())->findOrFail($id);

        $request->validate([
            'name' => 'sometimes|string|max:255',
            'category' => 'sometimes|string|max:100',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            Storage::delete('public/' . $item->image);
            $item->image = $request->file('image')->store('wardrobe_images', 'public');
        }

        $item->update($request->only(['name', 'category', 'description', 'image']));
        return response()->json($item);
    }

    // Delete an item
    public function destroy($id)
    {
        $item = WardrobeItem::where('user_id', auth()->id())->findOrFail($id);
        if ($item->image) {
            Storage::delete('public/' . $item->image);
        }
        $item->delete();

        return response()->json(['message' => 'Item deleted successfully']);
    }
}
