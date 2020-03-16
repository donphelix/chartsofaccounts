<?php

namespace App\DB0006;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TB80 extends Model
{
    protected $connection = "DB0006";
    public $table = "80";
    public $primaryKey = "764";
    protected $guarded = [];

    public static function getHoldingCompany(int $HCID = null)
    {
        if ($HCID)
            return self::where('764',$HCID)->first();
        return $HCID;
    }

    /**
     *
     * Get using filter
     * @param array $filter
     * @param bool $single
     * @return Model|\Illuminate\Database\Query\Builder|object
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
