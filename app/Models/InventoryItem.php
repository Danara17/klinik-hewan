<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryItem extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'harga',
        'stok',
        'satuan',
        'category_id',
        'description',
        'photo'
    ];

    public function category()
    {
        return $this->belongsTo(InventoryCategory::class);
    }

}
