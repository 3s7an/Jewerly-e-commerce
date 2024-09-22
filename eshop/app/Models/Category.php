<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;


class Category extends Model
{
    use HasFactory;


    use NodeTrait;


    protected $fillable = [
        'name',
        'parent_id'
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'category_product');
    }

    public function product(){
        return $this->hasMany(Product::class);
    }

       // Kategória môže mať viacero podkategórií
       public function subcategories()
       {
           return $this->hasMany(Category::class, 'parent_id');
       }

       // Kategória môže patriť k jednej rodičovskej kategórii
       public function parentCategory()
       {
           return $this->belongsTo(Category::class, 'parent_id');
       }

       public function parentCategories(){

        $parents = collect();

            $currentCategory = $this;
            while ($currentCategory->parentCategory) { // Predpokladáme, že máš vzťah na rodičov
                $currentCategory = $currentCategory->parentCategory;
                $parents->push($currentCategory);
            }

            return $parents;
        }





}
