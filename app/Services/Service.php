<?php

use Illuminate\Http\Request;

class Service
{
    protected $fields;
    public $model;
    protected $rules;

    public function __construct($model, $fields, $rules)
    {
        $this->model = $model;
        $this->fields = $fields;
        $this->rules = $rules;
    }

    public function filter($criterias, $paginate = false, $perPage = 15){
        $query = $this->model;
        foreach ($criterias as $key => $criteria){
            $query = $query->where($key,$criteria);
        }
        $result = $paginate? $query->paginate($perPage) : $query->get();
        return $result;
    }

    public function find($id){
        return $this->model->where('id',$id)->first();
    }

    public function validate($data){
        return Validateor::make($data, $this->rules);
    }

    public function prepareData(Request $request){
        $data = [];
        foreach ($this->fields as $field){
            $data[$field] = $request->get($field);
        }
        return $data;
    }
}