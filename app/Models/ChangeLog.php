<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChangeLog extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'changeable_id', 'changeable_type', 'action', 'description'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function changeable()
    {
        return $this->morphTo();
    }
}
