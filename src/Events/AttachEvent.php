<?php

namespace MarksIhor\LogModelActions\Events;

use Illuminate\Database\Eloquent\Model;

class AttachEvent
{
    protected $parent;
    protected $related;

    public function __construct(Model $parent, array $related)
    {
        $this->parent = $parent;
        $this->related = $related;
    }

    public function getParent()
    {
        return $this->parent;
    }

    public function getRelated()
    {
        return $this->related;
    }
}
