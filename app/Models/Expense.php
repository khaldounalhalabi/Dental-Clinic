<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $table = 'expenses' ;
    protected $primaryKey = 'id' ;
    public $timestamps = true ;
    protected $fillable = [
        'description',
        'cost',
        'date',
        'time',
    ];
}
