<?php
/**
 *======= PESA WORLD COMPANY OR PERSONS TABLE =====
 */
namespace App\DB0003;

use App\DB0006\TB115;
use App\DB0006\TB116;
use App\DB0006\TB117;
use App\DB0006\TB118;
use App\DB0006\TB148;
use App\DB0006\TB159;
use App\DB0006\TB160;
use App\DB0006\TB38;
use App\DB0006\TB80;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TB17 extends Model
{
    protected $connection = "DB0003";
    public $table = "17";
    public $primaryKey = "222";
    protected $guarded = [];

    /**
     * Returns person with the specified PID
     * @param int $PID
     * @return mixed
     */
    public static function getPerson(int $PID = null)
    {
        if ($PID)
            return self::where('222',$PID)->first();

        return $PID;
    }

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

    /**
     * Returns user/Person company
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company()
    {
        return $this->belongsTo(TB38::class,'');
    }


    /**
     * Gets person company branch
     *     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function branches()
    {
        return $this->hasMany(TB159::class,'1444','374');
    }

    /**
     * Returns person company holding company
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function holdingCompany()
    {
        return $this->hasOne(TB80::class,'766','374');
    }

    /**
     * Returns person company HQ
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function HQMainCompany()
    {
        return $this->hasOne(TB160::class,'1449','374');
    }

    /**
     * Return person company department
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function department()
    {
        return $this->hasMany(TB115::class,'1083','374');
    }


    /**
     * Return person company sub department 1
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subDepartment1()
    {
        return $this->hasMany(TB116::class,'1084','374');
    }

    /**
     * Return person company sub department 2
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subDepartment2()
    {
        return $this->hasMany(TB117::class,'1086','374');
    }

    /**
     * Return person company sub department 3
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subDepartment3()
    {
        return $this->hasMany(TB118::class,'1088','374');
    }


    /**
     * Returns registration details
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function registration()
    {
        return $this->hasMany(TB148::class,'1370','222');
    }
}
