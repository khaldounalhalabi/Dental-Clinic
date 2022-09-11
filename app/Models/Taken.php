<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Taken extends Model
{
    use HasFactory;
    protected $table = 'takens';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'description',
        'value',
        'date',
        'time',
    ];
}
