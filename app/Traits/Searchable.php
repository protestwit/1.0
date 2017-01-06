<?php namespace App\Traits;


trait Searchable
{
    public function scopeSearchBy($query, array $columns, $request)
    {
        $query->where(function ($query) use($columns, $request){
            foreach ($columns as $column){
                $query->orWhere($column, 'like', '%' . $request->q . '%');
            }
        });
    }
    public function scopeSearch($query, $request)
    {
        if ($this->searchableRelations){
            foreach ($this->searchableRelations as $relationName=> $columnName){
                if ($request->has($relationName)){
                    $query->whereHas($relationName, function ($q) use ($request, $columnName, $relationName) {
                        $q->where($columnName, 'like', '%' . $request->get($relationName) . '%');
                    });
                }
            }
        }
        if ($this->searchableColumns ){
            foreach ($this->searchableColumns as $columnName){
                if ($request->has($columnName)){
                    $query->where($columnName, 'like', '%' . $request->get($columnName) . '%');
                }
            }
        }
        if ($this->filterableColumns ){
            foreach ($this->filterableColumns as $columnName){
                if ($request->has($columnName)){
                    $query->where($columnName, $request->get($columnName));
                }
            }
        }
        if ($this->dateColumns){
            if($request->has($this->dateColumns['from'])){
                $query->where($this->dateColumns['from'], '>=', $request->get($this->dateColumns['from']));
            }
            if($request->has($this->dateColumns['to'])){
                $query->where($this->dateColumns['to'], '<=', $request->get($this->dateColumns['to']));
            }
        }
        return $query;
    }
}