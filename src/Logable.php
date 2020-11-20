<?php


namespace MarksIhor\LogModelActions;


trait Logable
{
    protected static function bootLogable()
    {
        static::created(function ($model) {
            dd(1);
        });
    }

    public function logs()
    {
        return $this->morphMany('MarksIhor\LogModelActions\Models\Log', 'logable');
    }
}
