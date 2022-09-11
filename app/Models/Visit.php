<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    use HasFactory;

    protected $table = "visits";
    protected $primaryKey = "id";
    public $timestamps = true;
    protected $fillable = [
        'type' ,
        'patient_id' ,
        'description' ,
        'prescription' ,
        'procedure' ,
        'cost' ,
        'date' ,
        'time' , 
        
    ] ;

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }


}
