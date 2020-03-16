<?php

namespace App\DB0003;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TB24 extends Model
{
    protected $connection = "DB0003";
    public $table = "24";
    public $primaryKey = "263";
    protected $guarded = [];

    /**
     *
     * Get using filter
     * @param array $filter
     * @param bool $single
     * @return TB24[]|Collection
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
