<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterPetType extends Model
{

    protected $fillable = [
        'name'
    ];

    use HasFactory;


    public function getFormattedCreatedAtAttribute()
    {
        return Carbon::parse($this->created_at)->diffForHumans();
    }

    public function pet()
    {
        return $this->hasMany(Pet::class);
    }
}
