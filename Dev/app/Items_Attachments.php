<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Items_Attachments extends Model {

    protected $fillable = ['Name', 'Description', 'GPriceP'];

    protected $hidden = ['IsNew', 'LevelRequired', 'GPrice1', 'GPrice7', 'GPrice30', 'Price1', 'Price7', 'Price30', 'MuzzleParticle', 'FireSound', 'Damage', 'Range', 'FireRate', 'Recoil', 'Spread', 'ScopeMag', 'ScopeType', 'AnimPrefix', 'SpecID', 'Category'];

    public $timestamps = false;
}
