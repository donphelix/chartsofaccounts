<?php
/**
 * USER REGISTRATIONS TABLE
 */
namespace App\DB0006;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TB148 extends Model
{
    protected $connection = "DB0006";
    public $table = "148";
    public $primaryKey = "1366";
    protected $guarded = [];


    /**
     * Returns person with the specified regID
     * @param int regID
     * @return mixed
     */
    public static function getRegistration(int $regID = null)
    {
        return self::where('1366',$regID)->first();
    }

    /**
     *
     * Get using filter
     * @param array $filter
     * @param bool $single
     * @return TB148[]|\Illuminate\Database\Eloquent\Collection
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
