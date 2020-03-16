<?php

namespace App\DB0007;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;

class TB49 extends Model
{
    protected $connection = "DB0007";
    public $table = "49";
    public $primaryKey = "464";
    protected $guarded = [];

    /**
     *
     * Get using filter
     * @param array $filter
     * @param bool $single
     * @param null $PID
     * @return Model|Builder|object
     */
    public static function getWhere(array $filter,$single = false,$PID = null)
    {
        $criteria = 'get';
        if ($single)
            $criteria = 'first';

        if ($filter) {
            $recs = DB::connection((new self())->connection)
                ->table((new self())->table)->select('*')
                ->where($filter);
            if ($PID)
                $recs->orWhere('1460','=',$PID);

            return $recs->$criteria();
        }

        return self::all();
    }
}
