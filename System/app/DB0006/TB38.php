<?php
/**
 * COMPANY TABLE
 */
namespace App\DB0006;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\DB;

class TB38 extends Model
{
    protected $connection = "DB0006";
    public $table = "38";
    public $primaryKey = "374";
    protected $guarded = [];

    /**
     * Get company with the specified CID
     * @param int $CID
     * @return mixed
     */
    public static function getCompany(int $CID = null)
    {
        if ($CID)
            return DB::connection((new self())->connection)
                ->table((new self())->table)->select('*')
                ->where('374','=',$CID)->first();

        return $CID;
    }


    /**
     *
     * Get using filter
     * @param array $filter
     * @param bool $single
     * @return TB38[]|Collection
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
     * Gets all branches under the company
     * @return HasMany
     */
    public function branches()
    {
        return $this->hasMany(TB159::class,'1444','374');
    }

    /**
     * Returns company's holding company
     * @return HasOne
     */
    public function holdingCompany()
    {
        return $this->hasOne(TB80::class,'766','374');
    }

    /**
     * Returns company's HQ
     * @return HasOne
     */
    public function HQMainCompany()
    {
        return $this->hasOne(TB160::class,'1449','374');
    }

    /**
     * Return all company departments
     * @return HasMany
     */
    public function departments()
    {
        return $this->hasMany(TB115::class,'1083','374');
    }


    /**
     * Return company sub department 1
     * @return HasMany
     */
    public function subDepartments1()
    {
        return $this->hasMany(TB116::class,'1084','374');
    }

    /**
     * Return company sub department 2
     * @return HasMany
     */
    public function subDepartments2()
    {
        return $this->hasMany(TB117::class,'1086','374');
    }

    /**
     * Return company sub department 3
     * @return HasMany
     */
    public function subDepartments3()
    {
        return $this->hasMany(TB118::class,'1088','374');
    }
}
