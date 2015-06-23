<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersData extends Model {

    protected $table = 'UsersData';

    protected $fillable = ['AccountStatus', 'GamePoints', 'GameDollars', 'TimePlayed', 'AccountType', 'BanTime', 'BanReason', 'BanCount'];

    protected $hidden = ['DateActiveUntil', 'BanExpireDate', 'CharsCreated', 'lastjoineddate'];

    public $timestamps = false;
}
