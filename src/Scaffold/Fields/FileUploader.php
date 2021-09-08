<?php

namespace Tir\FileManager\Scaffold\Fields;

 use Tir\Crud\Support\Scaffold\Fields\BaseField;

 class FileUploader extends BaseField
{

     protected string $type = 'fileUploader';
     protected string $postUrl;
     protected int $maxCount = 1;


     public function get($model = null): array
     {
         $this->postUrl = route('admin.file-manager.upload');
         return parent::get($model);
     }

     public function maxCount(int $value): BaseField
     {
        $this->maxCount = $value;
        return $this;
     }
 }