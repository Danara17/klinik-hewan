<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrescriptionItem extends Model
{
    protected $table = 'prescription_items';

    public function items()
    {
        return $this->belongsTo(InventoryItem::class);
    }

    use HasFactory;
}
