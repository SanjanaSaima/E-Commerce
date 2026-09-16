<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function adminIndex()
    {
        $products = Product::all();
        return view('admin.index')->with('products', $products);
    }

    public function view($id){
        $product=Product::findOrFail($id);
        return view('products.viewdetails', compact('product'));
    }

    public function store(Request $request){
        $validated=$request->validate([
            'name'=>'required|string|max:255',
            'description'=>'required|string',
            'price'=>'required|numeric',
            'image_url'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data=[
            'name'=>$validated['name'],
            'description'=>$validated['description'],
            'price'=>$validated['price'],
        ];

        if($request->hasFile('image_url')){
            $data['image_url']=$request->file('image_url')->store('images', 'public');
        }
        Product::create($data);

        return redirect()->route('admin.index')->with('success', 'Product created successfully.');
    }

    public function edit($id){
        $product=Product::findOrFail($id);
        return view('admin.edit', compact('product'));
    }

    public function update(Request $request, $id){
        $validated=$request->validate([
            'name'=>'required|string|max:255',
            'description'=>'required|string',
            'price'=>'required|numeric',
            'image_url'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $product=Product::findOrFail($id);
        $product->name=$validated['name'];
        $product->description=$validated['description'];
        $product->price=$validated['price'];

        if($request->hasFile('image_url')){
            if($product->image_url && Storage::disk('public')->exists($product->image_url)){
                Storage::disk('public')->delete($product->image_url);
            }
            $product->image_url=$request->file('image_url')->store('images', 'public');
        }

        $product->save();

        return redirect()->route('admin.index')->with('success', 'Product updated successfully.');
    }

    public function destroy($id){
        $product=Product::findOrFail($id);
        if($product->image_url && Storage::disk('public')->exists($product->image_url)){
            Storage::disk('public')->delete($product->image_url);
        }
        $product->delete();
        return redirect()->route('admin.index')->with('success', 'Product deleted successfully.');
    }

}
