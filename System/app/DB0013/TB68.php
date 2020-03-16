<?php

namespace App\DB0013;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TB68 extends Model
{
    protected $connection = "DB0013";
    public $table = "68";
    public $primaryKey = "630";
    protected $guarded = [];

    /**
     *
     * Get using filter
     * @param array $filter
     * @param bool $single
     * @return TB68[]|Collection
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
