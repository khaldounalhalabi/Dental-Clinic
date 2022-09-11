<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $table = "images";
    protected $primaryKey = "id";
    public $timestamps = true;
    protected $fillable = [
        'image' ,
        'patient_id' ,
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

}
