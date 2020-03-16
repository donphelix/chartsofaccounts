<?php

namespace App\DB0017;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TB192 extends Model
{
    protected $connection = "DB0006";
    public $table = "192";
    public $primaryKey = "1802";
    protected $guarded = [];

    /**
     *
     * Get using filter
     * @param array $filter
     * @param bool $single
     * @return TB192[]|Collection
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
