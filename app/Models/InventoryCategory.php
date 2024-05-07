<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'parent_id',
        'name'
    ];

    public function items()
    {
        return $this->hasMany(InventoryItem::class);
    }

}
