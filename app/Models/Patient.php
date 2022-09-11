<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $table = "patients";
    protected $primaryKey = "id";
    public $timestamps = true;
    protected $fillable = [
        'first_name' ,
        'last_name' ,
        'birth_date' ,
        'phone_number' ,
        'home_number' ,
        'city' ,
        'street' ,
        'notes' ,
    ] ;



    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function visits()
    {
        return $this->hasMany(Visit::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }


}
