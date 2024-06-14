<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'medical_record_id',
        'invoice_number',
        'total_amount',
        'invoice_date',
        'status'
    ];

    // Define the relationship to the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Define the relationship to the MedicalRecord model
    public function medicalRecord()
    {
        return $this->belongsTo(MedicalRecord::class);
    }

}
