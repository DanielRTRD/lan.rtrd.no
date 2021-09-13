<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Attendance extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'from_date',
        'to_date',
        'towel',
        'pillow_douvet',
        'pillow_douvet_cover',
        'bringing_bed',
        'comment',
        'vaccine',
        'user_id',
    ];

    /**
     * Get the user associated with the attendance.
     */
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
