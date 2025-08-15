<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'estimated_price', 'paid_price', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getDiffAttribute()
    {
        if (is_null($this->paid_price)) {
            return null;
        }
        return (float)$this->estimated_price - (float)$this->paid_price;
    }
}
