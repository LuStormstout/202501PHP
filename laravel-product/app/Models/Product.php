<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'image', 'description'];

    public function getProducts(): Collection
    {
        return $this->all();
    }

    public function getProductById($id)
    {
        return $this->find($id);
    }

    public function addProduct()
    {

    }

    public function updateProduct()
    {

    }

    public function deleteProduct()
    {

    }
}
