<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;


    /**
     * Get the food associated with the class.
     */
    public function food()
    {
        return $this->hasOne(Food::class, 'id', 'food_id');
    }
}
