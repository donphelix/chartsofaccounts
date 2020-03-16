<?php

namespace App\DB0009;

use App\DB0006\TB38;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;

class TB119 extends Model
{
    protected $connection = "DB0009";
    public $table = "119";
    public $primaryKey = "1102";
    protected $guarded = [];


    public static function get(int $productID = null)
    {
        if ($productID)
            return self::where('1106',$productID)->first();
        else
            return null;
    }

    /**
     *
     * Get using filter
     * @param array $filter
     * @param bool $single
     * @return TB119[]|Collection
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

    /**
     * Get product company info
     * @return BelongsTo
     */
    public function company()
    {
        return $this->belongsTo(TB38::class,'1194','1366');
    }

}
