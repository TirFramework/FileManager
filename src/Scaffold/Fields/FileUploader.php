<?php

namespace Tir\FileManager\Scaffold\Fields;

 use Tir\Crud\Support\Scaffold\Fields\BaseField;

 class FileUploader extends BaseField
{

     protected string $type = 'FileUploader';
     protected string $postUrl;
     protected int $maxCount = 1;
     protected mixed $value = [];

     public function get($dataModel = null)
     {
         $this->postUrl = route('admin.file-manager.upload');
         return parent::get($dataModel);
     }

     public function maxCount(int $value): BaseField
     {
        $this->maxCount = $value;
        return $this;
     }
 }
