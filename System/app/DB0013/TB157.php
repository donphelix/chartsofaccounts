<?php

namespace App\DB0013;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TB157 extends Model
{
    protected $connection = "DB0013";
    public $table = "157";
    public $primaryKey = "1429";
    public $timestamps = false;
    protected $guarded = [];

    /**
     *
     * Get using filter
     * @param array $filter
     * @param bool $single
     * @return TB157[]|Collection
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

    public static function getLast( $orderBy,array $filter = null)
    {
        $rec =  DB::connection((new self())->connection)
            ->table((new self())->table)->select('*');
        if ($filter)
            $rec->where($filter);
        if ($orderBy)
            $rec->orderBy($orderBy,"desc");

        return $rec->limit(1)->first();
    }

    public static function getDocNumber(int $seller, int $docTypeId)
    {
        //Get document abbreviation
        $docAbb = @TB67::getWhere(['628'=>$docTypeId],true)->{'1667'}?:null;

        //Resolve last document number
        $lastRec = self::getLast("1900",['1432'=>$seller,"1434"=>$docTypeId]);

        if(!$lastRec)
            $lastRec = self::getLast('1900',['1433'=>$seller,"1434"=>$docTypeId]);

        //Pesa world auto-increment
        $pwIncr = self::getLast('1431');

        //If last rec is null, assign 1
        $newNumber = @$lastRec->{'1900'}?((int)$lastRec->{'1900'} + 1):1;

        //Formulate data
        $data = [
            //If last rec is null, assign 1
                '1431'=>@$pwIncr->{'1431'}?((int)$pwIncr->{'1431'}+1):1,
                '1432'=>$seller,
                '1433'=>$seller,
                '1434'=>$docTypeId,
                '1900'=>$newNumber,
                '1435'=>$docAbb.'-'.Carbon::now("Africa/Nairobi").'-'.$newNumber
            ];


        //Find or create a record
        $rec = self::create($data);

        //Return document full number
        return $rec->{'1435'};
    }

}
