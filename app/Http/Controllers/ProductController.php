<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->get('search');

        // Predpokladáme, že chcete hľadať v názvoch produktov
        $products = Product::where('name', 'LIKE', '%' . $query . '%')->get();

        // Vráťte produkty ako JSON
        return response()->json($products);
    }

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
        $categories = $product->categories;

        return view('admin.product-edit', compact('categories', 'product'));
    }



    public function update(Request $request, Product $product)
{
    // Validace vstupů
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'price' => 'required|numeric|min:0',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'description' => 'required|string|max:255',
    ]);

    // Zpracování obrázku, pokud byl nahrán nový
    if ($request->hasFile('image')) {
        // Uložení nového obrázku
        $path = $request->file('image')->store('public/category-img');
        // Aktualizace cesty k obrázku v databázi
        $product->image = basename($path);
    }

    // Aktualizace ostatních dat produktu
    $product->name = $validatedData['name'];
    $product->price = $validatedData['price'];
    $product->description = $validatedData['description'];

    // Uložení všech dat produktu do databáze
    $product->save();

    return redirect()->back()->with('success', 'Produkt byl aktualizován.');
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
