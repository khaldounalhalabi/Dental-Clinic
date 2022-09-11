<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Summary extends Model
{
    use HasFactory;
    protected $table = "summaries";
    protected $primaryKey = "id";
    public $timestamps = true;
    protected $fillable = [
        'month' ,
        'expenses' ,
        'incomes' ,
        'difference' ,
    ] ;
}
