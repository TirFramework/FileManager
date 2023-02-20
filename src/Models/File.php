<?php

namespace Tir\FileManager\Models;

use Illuminate\Support\Facades\Auth;
use Tir\Crud\Support\Eloquent\BaseModel;
use Tir\Crud\Support\Scaffold\Fields\Text;


class File extends BaseModel
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','user_id','path','type'];

    protected static function boot()
    {
        parent::boot();
        static::creating(function($file) {
            $file->user_id = Auth::id();
        });
    }


    protected function setModuleName(): string
    {
        return 'file-manager';
    }

    protected function setFields(): array
    {
        return [
            Text::make('name'),
        ];
    }


}
