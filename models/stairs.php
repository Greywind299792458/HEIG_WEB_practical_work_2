<?php

require_once 'vendor/autoload.php';

use Illuminate\Database\Eloquent\Model;

class Stairs extends Model
{
    protected $table = 'stairs';
    public $timestamps = false;

    protected $fillable = [
        'stairs_name',
        'num_steps',
        'is_indoor',
        'building_name',
        'starting_level',
        'special_feature',
    ];

    public function __toString()
    {
        return $this->stairs_name ?? '';
    }
}
