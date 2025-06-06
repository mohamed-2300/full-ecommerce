<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::query()->paginate(10);
        return view('product.index', compact('products')); // ['products' => $products]
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $product = new Product();
        $isUpdate = false;
        return view('product.form', compact('product', 'isUpdate' ));
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $formFields = $request->validated();
        if($request->hasFile('image')){
            $formFields['image'] = $request->file('image')->store('product', 'public');
        }

        Product::create($formFields);
        return to_route('products.index')->with('success', 'Product created successfully');
    }
    
    /**
     * Display the specified resource
     */
    public function show(Product $product)
    {
        //
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $isUpdate = true;
        return view('product.form', compact('product', 'isUpdate' ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {
         if ($request->hasFile('image')) {
        if ($product->image && Storage::disk('public')->exists($product->image)) {
            Storage::disk('public')->delete($product->image);
        }

        // حفظ الصورة الجديدة
        $imagePath = $request->file('image')->store('products', 'public');

        // تحديث حقل الصورة
        $product->image = $imagePath;
    }
        $product->fill($request->validated())->save();
        return to_route('products.index')->with('success', 'Product updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return to_route('products.index')->with('success', 'Product deleted successfully');
        
    }
}
