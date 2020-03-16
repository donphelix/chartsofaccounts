<?php

namespace App\DB0006;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;

class TB159 extends Model
{
    protected $connection = "DB0006";
    public $table = "159";
    public $primaryKey = "1442";
    protected $guarded = [];

    /**
     * Return branch with the specified branch ID
     * @param int $BID
     * @return mixed
     */
    public static function getBranch(int $BID = null)
    {
        if ($BID)
            return self::where('1442',$BID)->first();

        return $BID;
    }

    /**
     *
     * Get branch using filter
     * @param array $filter
     * @param bool $single
     * @return Model|Builder|object
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


    /**
     * Returns the company to which the branch belongs
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company()
    {
        return $this->belongsTo(TB38::class,'1444','374');
    }
}
