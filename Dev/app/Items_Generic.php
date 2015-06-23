<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Items_Generic extends Model {

    protected $fillable = ['Name', 'Description', 'GPriceP'];

    protected $hidden = ['IsNew', 'LevelRequired', 'GPrice1', 'GPrice7', 'GPrice30', 'Price1', 'Price7', 'Price30' ];

    public $timestamps = false;
}
