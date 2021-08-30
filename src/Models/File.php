<?php

namespace Tir\FileManager\Models;

use Tir\Crud\Support\Eloquent\BaseModel;
use Tir\Crud\Support\Scaffold\Fields\Text;


class File extends BaseModel
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected array $fillable = ['name','user_id','path','type'];


    protected function setModuleName(): string
    {
        return 'file-manager';
    }

    protected function setFields(): array
    {
        return [
            Text::make('name')->rules('required'),

        ];
    }


}
