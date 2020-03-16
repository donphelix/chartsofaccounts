<?php

namespace App\DB0008;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TB71 extends Model
{
    protected $connection = "DB0008";
    public $table = "71";
    public $primaryKey = "672";
    protected $guarded = [];

    /**
     *
     * Get using filter
     * @param array $filter
     * @param bool $single
     * @return TB71[]|Collection
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
