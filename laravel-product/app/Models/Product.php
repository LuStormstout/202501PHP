<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 *
 * @property string name
 * @property numeric price
 * @property string image
 * @property string description
 * @property string created_at
 * @property string updated_at
 */
class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'image', 'description'];
}
