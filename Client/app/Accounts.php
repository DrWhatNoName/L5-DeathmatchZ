<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class Accounts extends Model implements AuthenticatableContract {

    use Authenticatable;

    protected $fillable = ['AccountStatus', 'email', 'MD5Password', 'Username', 'ReferralID' ,'dateregistered'];

    protected $hidden = [ 'dateregistered'];

    public $timestamps = false;

    protected $primaryKey = 'CustomerID';

}
