<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;

    protected $table = 'colors'; 
    protected $primaryKey = 'id'; 

    protected $fillable = [
        'name',
        'imageUrl',
        'public_id',
        'productId', 
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'productId');
    }
}
