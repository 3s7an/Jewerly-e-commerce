<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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

        try {
            $validatedData = $request->validate([
                'collection-img'            => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'collection-name'           => 'required|min:3|max:40',
                'collection-description'    => 'required|min:10|max:200',
                'products'                  => 'required|array|exists:products,id',
                'collection-discountrate'   => 'nullable|numeric|between:0,99.99',
                'product-category'          => 'nullable|numeric|exists:categories,id',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Logovanie chýb bez ich zobrazenia používateľovi
            Log::error('Validation failed', $e->validator->errors()->all());
            return back()->withErrors($e->validator)->withInput();  // Môžeš poslať späť používateľovi, aby mal opravené pole.
        }

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
            'name'          => $validatedData['collection-name'],
            'description'   => $validatedData['collection-description'],
            'is_active'     => 1,
            'discount'      => $discount,
            'discount_rate' => $discount_rate
        ]);



        if (!empty($validatedData['products']) && is_array($validatedData['products'])) {
            Product::whereIn('id', $validatedData['products'])->update(['collection_id' => $collection->id]);
        }

        dd($validatedData['products'], $collection->id);




        return redirect()->route('admin.collections')->with('success', 'Collection created successfully.');


    }
}
