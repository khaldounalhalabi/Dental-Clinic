<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    use HasFactory;

    protected $table = 'incomes' ;
    protected $primaryKey = 'id' ;
    public $timestamps = true ;
    protected $fillable = [
        'description' ,
        'value' ,
        'date' ,
        'time' ,
        'visit_id'
    ] ;

    public function visit()
    {
        return $this->hasOne(Visit::class);
    }
}
