<?php

namespace App\DB0011;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TB239 extends Model
{
    protected $connection = "DB0011";
    public $table = "239";
    public $primaryKey = "";
    protected $guarded = [];

    /**
     *
     * Get using filter
     * @param array $filter
     * @param bool $single
     * @param array|null $distinct
     * @return TB239[]|Collection
     */
    public static function getWhere(array $filter,$single = false, $distinct = null)
    {
        $criteria = 'get';
        if ($single)
            $criteria = 'first';

        if ($filter)
            if ($distinct)
                return DB::connection((new self())->connection)
                    ->table((new self())->table)->select('*')
                    ->distinct($distinct)
                    ->where($filter)->$criteria();
            else
                return DB::connection((new self())->connection)
                    ->table((new self())->table)->select('*')
                    ->where($filter)->$criteria();

        return self::all();
    }
}
