<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class Accounts extends Model implements AuthenticatableContract {

    use Authenticatable;

    protected $fillable = ['AccountStatus', 'email', 'password', 'Username'];

    protected $hidden = ['ReferralID', 'lastlogindate', 'dateregistered', 'MD5Password'];

    public $timestamps = false;

    protected $primaryKey = 'CustomerID';

}
