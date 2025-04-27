<?php

namespace BookStack\Settings;

use BookStack\App\Model;

class Setting extends Model
{
    protected $fillable = ['setting_key', 'value'];
    protected $keyType = 'string';
    public $incrementing = false;
    protected $primaryKey = 'setting_key';
}
