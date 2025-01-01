<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::with('category')->get();
        return view('adminViews.itemViews.itemMain', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {


        $categories = Category::all();
        return view('adminViews.itemViews.itemUpSert', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:items|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable',
            'stock' => 'required|integer|min:1',
            'image' => 'nullable|image|mimes:jpg,png,jpeg',
        ]);

        // Upload gambar jika ada
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('items', 'public');
        }

        Item::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'category_id' => $request->category_id,
            'description' => $request->description,
            'stock' => $request->stock,
            'image' => $imagePath,
        ]);

        return redirect('/items')->with('success', 'Item created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item, $slug)
    {
        $item = Item::where('slug', $slug)->first();
        $categories = Category::all();
        return view('adminViews.itemViews.itemUpSert', compact('item', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
{
    $item = Item::where('slug', $slug)->firstOrFail();

    $request->validate([
        'name' => 'required|max:255|unique:items,name,' . $item->id,
        'category_id' => 'required|exists:categories,id',
        'description' => 'nullable',
        'stock' => 'required|integer|min:1',
        'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
    ]);

    // Upload gambar kalo ada
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('items', 'public');
        $item->image = $imagePath;
    }

    $item->update([
        'name' => $request->name,
        'slug' => Str::slug($request->name),
        'category_id' => $request->category_id,
        'description' => $request->description,
        'stock' => $request->stock,
    ]);

    return redirect('/items')->with('success', 'Item updated successfully.');
}


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item, $slug)
    {
        // Hapus gambar jika ada
        if ($item->image) {
            Storage::disk('public')->delete($item->image);
        }

        $item = Item::where('slug', $slug)->firstOrFail();
        $item->delete();
        return redirect('/items')->with('success', 'Item deleted successfully.');
    }
}
