<?php

namespace Michelangelo\EasyFilter;

class EasyFilter {

    protected $query;

    public function __construct($query) {
        $this->query = $query;
    }

    public function orderByAsc($column){
        $this->query->orderBy($column, 'ASC');
    }

    public function orderByDesc($column){
        $this->query->orderBy($column, 'DESC');
    }

    public function whereLike($column, $text, $sx = '', $dx = ''){
        $this->query->where($column, 'LIKE', "$sx$text$dx");
    }

    public function whereEquals($column, $text){
        $this->query->where($column, '=', $text);
    }

    public function whereNotEquals($column, $text){
        $this->query->where($column, '!=', $text);
    }

    public function whereCustom($column, $operator, $text){
        $this->query->where($column, $operator, $text);
    }

    public function whereHas($table, $f){
        $this->query->whereHas($table, $f);
    }

    public function whereHasLike($table, $column, $text, $sx = '', $dx = ''){
        $this->query->whereHas($table, function ($q) use ($column, $text, $sx, $dx){
            $q->where($column, 'LIKE', "$sx$text$dx");
        });
    }

    public function whereHasEquals($table, $column, $text){
        $this->query->whereHas($table, function ($q) use($column, $text){
            $q->where($column, '=', $text);
        });
    }
}