<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    use HasFactory;
    public $guarded = [];

    public function product()
{
    // return $this->belongsTo(Product::class, 'foreign_key', 'owner_key');
    return $this->belongsTo(Product::class);
}

}
