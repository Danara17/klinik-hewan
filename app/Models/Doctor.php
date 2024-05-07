<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    public function medicalRecord()
    {
        return $this->hasMany(MedicalRecord::class);
    }
}
