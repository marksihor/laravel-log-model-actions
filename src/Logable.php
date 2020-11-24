<?php


namespace MarksIhor\LogModelActions;


use MarksIhor\LogModelActions\Services\LogService;
use Chelout\RelationshipEvents\Concerns\HasBelongsToManyEvents;

trait Logable
{
    use HasBelongsToManyEvents;

    protected static function bootLogable()
    {
        static::created(function ($model) {
            (new LogService())->created($model);
        });

        static::updated(function ($model) {
            (new LogService())->updated($model);
        });

        static::deleted(function ($model) {
            (new LogService())->deleted($model);
        });

        static::belongsToManyAttached(function ($relation, $parent, $ids) {
            (new LogService())->attached($relation, $parent, $ids);
        });

        static::belongsToManyDetached(function ($relation, $parent, $ids) {
            (new LogService())->detached($relation, $parent, $ids);
        });
    }

    public function logs()
    {
        return $this->morphMany('MarksIhor\LogModelActions\Models\Log', 'logable');
    }
}
