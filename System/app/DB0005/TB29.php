<?php
/**
 *======= PESA WORLD COMPANY/PLACE OF WORK GPS LOCATION TABLE =====
 */
namespace App\DB0005;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TB29 extends Model
{
    protected $connection = "DB0005";
    public $table = "29";
    public $primaryKey = "296";
    protected $guarded = [];

    /**
     *
     * Get using filter
     * @param array $filter
     * @param bool $single
     * @return TB29[]|Collection
     */
    public static function getWhere(array $filter, $single = false)
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
