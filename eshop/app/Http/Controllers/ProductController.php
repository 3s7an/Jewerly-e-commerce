<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    // Zobrazenie produktov v admin sekcii
    public function index()
        {

        $query = Product::orderBy('created_at', 'DESC');
        $products = $query->get();

        $categories = Category::all();


        return view('admin.product', ['products' => $products, 'categories' => $categories]);
    }


    public function interIndex()
    {

        $products = Product::all();
        $categories = Category::all();

        return view('admin.add-product', compact('products', 'categories'));
    }


    public function store(Request $request)
    {
        // Validácia vstupov
        $validatedData = $request->validate([
            'product-image' => 'required|image',
            'product-name' => 'required|min:3|max:40',
            'product-description' => 'required|min:5|max:250',
            'product-price' => 'required|numeric',
            'product-category' => 'nullable|numeric|exists:categories,id',
        ]);

        // Uloženie obrázka
        if ($request->hasFile('product-image')) {
            $imagePath = $request->file('product-image')->store('product-profile', 'public');
            $validatedData['product-image'] = $imagePath;
        }

        // Vytvorenie nového produktu
        $product = Product::create([
            'image' => $validatedData['product-image'],
            'name' => $validatedData['product-name'],
            'description' => $validatedData['product-description'],
            'price' => $validatedData['product-price'],
        ]);

        // Získanie vybranej kategórie
        if ($validatedData['product-category']) {
            $selectedCategory = Category::find($validatedData['product-category']);
            // Uloženie vybranej kategórie
            $product->categories()->attach($selectedCategory);

            // Uloženie rodičovských kategórií
            foreach ($selectedCategory->parentCategories() as $parentCategory) {
                $product->categories()->attach($parentCategory);
            }
        }

        // Presmerovanie po úspešnom uložení produktu
        return redirect()->route('admin.product')->with('success', 'Produkt bol úspešne pridaný');
    }





    // Editovanie produktu v admin sekcii
    public function edit(Product $product)
    {

        $query = Product::orderBy('created_at', 'DESC');
        $products = $query->get();
        $categories = Category::all();

        return view('admin.product-edit', compact('categories', 'product'));
    }



    // Zmeny produktu v admin sekcii
    public function update(Product $product, Request $request)
    {

        // Validácia zmien produktu
        $validated = $request->validate([
            'name' => 'min:3|max:20',
            'description' => 'min:3|max:20',
            'price' => 'min:3|max:20',
            
        ]);

        // Updatnutie produktov, ulozenie novych udajov z inputov do databaze
        $product->update([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'price' => $validated['price'],
        ]);
    }




    // Odstranenie produktu v admin sekcii
    public function destroy($id)
    {

        // Najdenie produktu
        $product = Product::where('id', $id)->first();

        // Zmazanie produktu
        $product->delete();

        // Presmerovanie
        return redirect()->route('admin.product')->with('success', 'Produkt bol úspešne zmazaný');
    }
}
