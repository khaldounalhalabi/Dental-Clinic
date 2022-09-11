<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Given extends Model
{
    use HasFactory;
    protected $table = 'givens';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'description',
        'value',
        'date',
        'time',
    ];
}
