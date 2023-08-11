<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillables =[ 'filenames','name','price','description',
'quantity','featured','category'];

    public function setFilenamesAttribute($value)
    {
        $this->attributes['filenames'] = json_encode($value);
    }

    public function colors(){
        return $this->hasMany(Color::class);
    }

    public function sizes(){
        return $this->hasMany(Size::class);
    }

    public function images(){
        return $this->hasMany(Image::class);
    }
}
