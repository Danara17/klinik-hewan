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
    public function medicalRecord()
    {
        return $this->belongsTo(MedicalRecord::class);
    }

    public function inventoryItem()
    {
        return $this->belongsTo(InventoryItem::class, 'inventory_items_id');
    }

    use HasFactory;
}
