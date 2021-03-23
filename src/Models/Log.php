<?php

namespace MarksIhor\LogModelActions\Models;

use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $fillable = ['logable_id', 'logable_type', 'user_id', 'data'];

    protected $casts = [
        'data' => 'array'
    ];

    public function logable()
    {
        return $this->morphTo();
    }
    
    public function user()
    {
        return $this->belongsTo(config('auth.providers.users.model'));
    }
}
