<?php

namespace MarksIhor\LogModelActions\Services;

use Illuminate\Database\Eloquent\Model;
use MarksIhor\LogModelActions\Models\Log;

class LogService
{
    public function created(Model $model): void
    {
        $this->log($model, ['type' => 'creating']);
    }

    public function updated(Model $model): void
    {
        $columns = Model::$logColumns ?? $model->getFillable() ?? [];
        
        $data = ['type' => 'updating'];
        foreach ($columns as $column) {
            if ($model->isDirty($column)) {
                $data['values'][$column] = [
                    'old' => $model->getOriginal($column),
                    'new' => $model->{$column}
                ];
            }
        }

        if (key_exists('values', $data)) $this->log($model, $data);
    }

    public function attached(string $relation, Model $model, array $ids): void
    {
        $this->log($model, ['type' => 'attaching', 'relation' => $relation, 'ids' => $ids]);
    }

    public function detached(string $relation, Model $model, array $ids): void
    {
        $this->log($model, ['type' => 'detaching', 'relation' => $relation, 'ids' => $ids]);
    }

    public function deleted(Model $model): void
    {
        $this->log($model, ['type' => 'deleting']);
    }

    private function log(Model $model, ?array $data): void
    {
        if ($data) {
            Log::create([
                'user_id' => auth()->id(),
                'data' => $data ?? null,
                'logable_id' => $model->id,
                'logable_type' => $model->getMorphClass()
            ]);
        }
    }
}
