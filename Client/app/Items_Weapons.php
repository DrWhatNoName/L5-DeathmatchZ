<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Items_Weapons extends Model {

    protected $fillable = ['Name', 'Description', 'GPriceP'];

    protected $hidden = ['IsNew', 'LevelRequired', 'GPrice1', 'GPrice7', 'GPrice30', 'Price1', 'Price7', 'Price30', 'MuzzleOffset', 'Shoot_Sound', 'Sound_Reload', 'GrenadeName', 'ScopeType', 'AmimPrefix', 'Animation' ];

    public $timestamps = false;
}
