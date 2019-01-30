<?php

namespace Michelangelo\EasyFilter;

use Illuminate\Database\Eloquent\Builder;

class EasyFilter {

    protected $query;

    /**
     * EasyFilter constructor.
     * @param Builder|null $query
     */
    public function __construct(Builder $query = null) {
        $this->query = $query;
    }

    /**
     * @param string $column
     * @return Builder
     */
    public function orderByAsc(string $column) : Builder {
        return $this->query->orderBy($column, 'ASC');
    }

    /**
     * @param string $column
     * @return Builder
     */
    public function orderByDesc(string $column) : Builder {
        return $this->query->orderBy($column, 'DESC');
    }

    /**
     * @param string $column
     * @param mixed $text
     * @param string $sx
     * @param string $dx
     * @return Builder
     */
    public function whereLike(string $column, $text, string $sx = '', string $dx = '') : Builder {
        return $this->query->where($column, 'LIKE', "$sx$text$dx");
    }

    /**
     * @param string $column
     * @param mixed $text
     * @return Builder
     */
    public function whereEquals(string $column, $text) : Builder {
        return $this->query->where($column, '=', $text);
    }

    /**
     * @param string $column
     * @param mixed $text
     * @return Builder
     */
    public function whereNotEquals(string $column, $text) : Builder {
        return $this->query->where($column, '!=', $text);
    }

    /**
     * @param string $column
     * @param string $operator
     * @param mixed $text
     * @return Builder
     */
    public function whereCustom(string $column, string $operator, $text) : Builder {
        return $this->query->where($column, $operator, $text);
    }

    /**
     * @param string $table
     * @param $f
     * @return Builder
     */
    public function whereHas(string $table, $f) : Builder {
        return $this->query->whereHas($table, $f);
    }

    /**
     * @param string $table
     * @param string $column
     * @param mixed $text
     * @param string $sx
     * @param string $dx
     * @return Builder
     */
    public function whereHasLike(string $table, string $column, $text, string $sx = '', string $dx = '') : Builder {
        return $this->query->whereHas($table, function ($q) use ($column, $text, $sx, $dx){
            $q->where($column, 'LIKE', "$sx$text$dx");
        });
    }

    /**
     * @param string $table
     * @param string $column
     * @param mixed $text
     * @return Builder
     */
    public function whereHasEquals(string $table, string $column, $text) : Builder{
        return $this->query->whereHas($table, function ($q) use($column, $text){
            $q->where($column, '=', $text);
        });
    }

    /**
     * @param string $column
     * @param mixed $text
     * @return Builder
     */
    public function orWhereEquals(string $column, $text) : Builder {
        return $this->query->orWhere($column, '=', $text);
    }

    /**
     * @param string $column
     * @param string $operator
     * @param mixed $text
     * @return Builder
     */
    public function orWhereCustom(string $column, string $operator, $text) : Builder {
        return $this->query->orWhere($column, $operator, $text);
    }

    /**
     * @param string $table
     * @param string $column
     * @param mixed $text
     * @return Builder
     */
    public function orWhereHasEquals(string $table, string $column, $text) : Builder {
        return $this->query->orWhereHas($table, function ($q) use($column, $text) {
            $q->where($column, '=', $text);
        });
    }

    /**
     * @param string $column
     * @param mixed $text
     * @return Builder
     */
    public function whereIn(string $column, $text) : Builder {
        return $this->query->whereIn($column,$text);
    }

    /**
     * @param string $column
     * @param mixed $text
     * @return Builder
     */
    public function whereNotIn(string $column, $text) : Builder {
        return $this->query->whereNotIn($column,$text);
    }
}