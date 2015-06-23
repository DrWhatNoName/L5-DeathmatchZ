<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ClanData extends Model {

    protected $table = 'ClanData';

    protected $fillable = ['ClanName', 'ClanNameColor', 'ClanTag', 'ClanTagColor', 'OwnerCustomerID', 'OwnerCharID', 'MaxClanMembers', 'ClanLore'];

    protected $hidden = ['ClanEmblemID', 'ClanEmblemColor', 'ClanXP', 'ClanLevel', 'ClanGP'];

    public $timestamps = false;

}
