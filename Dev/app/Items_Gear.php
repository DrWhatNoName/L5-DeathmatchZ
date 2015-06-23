<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Items_Gear extends Model {

    protected $fillable = ['Name', 'Description', 'GPriceP'];

    protected $hidden = ['IsNew', 'LevelRequired', 'GPrice1', 'GPrice7', 'GPrice30', 'Price1', 'Price7', 'Price30', 'Bulkiness', 'Category', 'Stealth', 'DamageMax', 'DamagePerc' ];

    public $timestamps = false;
}
