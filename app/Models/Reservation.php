<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $table = "reservations";
    protected $primaryKey = "id";
    public $timestamps = true;
    protected $fillable = [
        'patient_id',
        'first_name',
        'last_name',
        'date',
        'time',
        'phone_number',
        'home_number',
        'reason',
        'status',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
