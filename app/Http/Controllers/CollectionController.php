<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\Product;
use Illuminate\Http\Request;

class CollectionController extends Controller
{
    public function index(){

        $collections = Collection::all();
        $products = Product::all();

        return view('admin.collection', compact('collections', 'products'));
    }

    public function store(Request $request){

        $discount = null;
        $discount_rate = null;

         // Validácia vstupov
         $validatedData = $request->validate([
            'collection-img'            => 'required|image',
            'collection-name'           => 'required|min:3|max:40',
            'collection-description'    => 'required|min:10|max:200',
            'products'                  => 'required|array|exists:products,id',
            'collection-discountrate'   => 'numeric|digits:2',
            'product-category'          => 'nullable|numeric|exists:categories,id',
        ]);

        if(!is_null($validatedData['collection-discountrate'])){
            $discount = 1;
            $discount_rate = $validatedData['collection-discountrate'];
        }

        // Uloženie obrázka
        if ($request->hasFile('collection-img')) {
            $imagePath = $request->file('collection-img')->store('collection-profile', 'public');
            $validatedData['collection-img'] = $imagePath;
        }

        $collection = Collection::create([
            'image'         => $validatedData['collection-img'],
            'name'          => $validatedData['name'],
            'description'   => $validatedData['collection-description'],
            'is_active'     => 1,
            'discount'      => $discount,
            'discount_rate' => $discount_rate
        ]);

        // dd($collection);

        Product::whereIn('id', $validatedData['products'])->update(['collection_id' => $collection->id]);

        return redirect()->route('admin.collections')->with('success', 'Collection created successfully.');


    }
}
