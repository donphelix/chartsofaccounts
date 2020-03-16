<?php

namespace App\DB0006;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TB118 extends Model
{
    protected $connection = "DB0006";
    public $table = "118";
    public $primaryKey = "1081";
    protected $guarded = [];

    /**
     *
     * Get using filter
     * @param array $filter
     * @param bool $single
     * @return TB118[]|Collection
     */
    public static function getWhere(array $filter,$single = false)
    {
        $criteria = 'get';
        if ($single)
            $criteria = 'first';

        if ($filter)
            return DB::connection((new self())->connection)
                ->table((new self())->table)->select('*')
                ->where($filter)->$criteria();

        return self::all();
    }
}
