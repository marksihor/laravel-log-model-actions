<?php


namespace MarksIhor\LogModelActions;


use MarksIhor\LogModelActions\Services\LogService;

trait Logable
{
    protected static function bootLogable()
    {
        static::created(function ($model) {
            (new LogService())->created($model);
        });
    }

    public function logs()
    {
        return $this->morphMany('MarksIhor\LogModelActions\Models\Log', 'logable');
    }
}
