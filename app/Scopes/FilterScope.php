<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Builder;


class FilterScope implements Scope
{
   protected $filterColumns = [];

   public function apply(Builder $builder, Model $model)
   {
      /*if ($companyId = request()->query('company_id')) {
         $builder->where('company_id', $companyId);
      }*/
      /*if ($search = request()->query('search')) {
         $builder->where('first_name', 'LIKE', "%{$search}%");
      }*/
      $columns = property_exists($model, 'filterColumns') ? $model->filterColumns : $this->filterColumns;
      foreach ($columns as $column)
      {
         if ($value = request()->query($column)){
            $builder->where($column, $value);
         }
      }
   }
}