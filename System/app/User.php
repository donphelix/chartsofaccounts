<?php

namespace App;

use App\DB0006\TB208;
use App\DB0017\TB87;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use Notifiable;
    public $primaryKey = 'pid';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function createUser($record){

        $security_record = TB87::getWhere(['828'=>$record->{'671'}],true);
        if (!$security_record)
            return false;

        $pwsCounter = TB208::getWhere(['2032'=>$record->{'671'}],true);

        $user = new self();
        $user->pid = $record->{'671'};
        $user->user_name = $security_record->{'832'};
        $user->mobile_number = $record->{'266'};
        $user->mobile_country_code = $record->{'265'};
        $user->sim_network_address = $record->{'267'};
        $user->sim_serial_number = $record->{'268'};
        $user->pws_counter = @$pwsCounter->{'1959'}?:null;
        $user->password = Hash::make($record->password);
        $user->save();

        if ($user)
            return true;
        return false;
    }

    public static function updateUser($record){
        $security_record = TB87::getWhere(['828'=>$record->{'671'}],true);
        if (!$security_record)
            return false;


        $pwsCounter = TB208::getWhere(['2032'=>$record->{'671'}],true);
        $user = self::where('mobile_number',$record->{'266'})->first();
        if (!$user)
            $user = new self();

        $user->pid = $record->{'671'};
        $user->user_name = $security_record->{'832'};
        $user->mobile_number = $record->{'266'};
        $user->mobile_country_code = $record->{'265'};
        $user->sim_network_address = $record->{'267'};
        $user->sim_serial_number = $record->{'268'};
        $user->pws_counter = @$pwsCounter->{'1959'}?:null;
        $user->password = Hash::make($record->password);
        $user->save();

        if ($user)
            return true;
        return false;
    }
}
