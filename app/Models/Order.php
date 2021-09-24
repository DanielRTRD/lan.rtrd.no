<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /**
     * Get the user associated with the class.
     */
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
