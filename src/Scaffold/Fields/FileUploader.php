<?php

namespace Tir\FileManager\Scaffold\Fields;

 use Tir\Crud\Support\Scaffold\Fields\BaseField;

 class FileUploader extends BaseField
{

     protected string $type = 'fileUploader';
     protected string $postUrl;


     public function get($model = null): array
     {
         $this->postUrl = route('admin.file-manager.upload');
         return parent::get($model);
     }
 }