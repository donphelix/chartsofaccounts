<?php

/**
 *======= PESA WORLD ANALYTICS LEDGER TABLE =====
 */
namespace App\DB0015;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TB88 extends Model
{
    protected $connection = "DB0015";
    public $table = "88";
    public $primaryKey = "837";
    protected $guarded = [];
    public $timestamps = false;

    /**
     *
     * Get using filter
     * @param array $filter
     * @param bool $single
     * @return TB88[]|Collection
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

    public static function createOrUpdate(array $filter, array $data)
    {
        return self::create($data);
    }

}
