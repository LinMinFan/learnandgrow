<?php

namespace App\Admin\Action;

use Encore\Admin\Actions\RowAction;
use Illuminate\Database\Eloquent\Model;

class ReplicatePage extends RowAction
{
    public function name()
    {
        return __('Replicate Page');
    }

    // 複製文章與所屬的文章分類
    public function handle(Model $model)
    {
        $slug = $model->slug . '-' . date('YmdHis');

        $new = $model->replicate(['slug']);
        $new->slug = $slug;
        $new->push();
        $new->meta()->saveMany($model->meta);

        return $this->response()->success(__('Successfully replicated'))->refresh();

    }
}
