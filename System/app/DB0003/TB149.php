<?php

namespace App\DB0003;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TB149 extends Model
{
    protected $connection = "DB0003";
    public $table = "149";
    public $incrementing = false;
    protected $guarded = [];

    /**
     * Fetch with filter
     * can return multiple, single or all records
     * @param array $filter
     * @param bool $single
     * @return mixed
     */
    public static function getWhere(array $filter = null,$single = false)
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
