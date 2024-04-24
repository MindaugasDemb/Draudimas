<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Img extends Model
{
    use HasFactory;
    protected $fillable=['car_id','file','file_name'];

    public function img()
    {
        return $this->belongsTo(Car::class, 'car_id');
    }
}
