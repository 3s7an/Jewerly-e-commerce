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
        'parent_id',
        'image'
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'category_product');
    }

       // Kategória môže mať viacero podkategórií
       public function subcategories()
       {
           return $this->hasMany(Category::class, 'parent_id');
       }


       public function parentCategory()
       {
           return $this->belongsTo(Category::class, 'parent_id', 'id');
       }

       public function parentCategories(){

        $parents = collect();

            $currentCategory = $this;
            while ($currentCategory->parentCategory) {
                $currentCategory = $currentCategory->parentCategory;
                $parents->push($currentCategory);
            }

            return $parents;
        }

        public function getImageURL(){
            if($this->image){
                return url('storage/' . $this->image);
            }
            return 'https://via.placeholder.com/800x400';
        }
        }






