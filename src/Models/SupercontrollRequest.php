<?php

namespace LaravelSupercontrol\Models;

use Illuminate\Database\Eloquent\Model;

class SupercontrollRequest extends Model
{
    protected $guarded = [];

    public function __construct(array $attributes = [])
    {
        $this->table = \config('supercontrol.log_table');

        parent::__construct($attributes);
    }
}
