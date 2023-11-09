<?php

require_once 'vendor/autoload.php';

use Illuminate\Database\Eloquent\Model;

class Accident extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'accident';
    public $timestamps = false;

    protected $fillable = [
        'id',
        'event_description',
        'destroyed_ego',
        'spilled_drink',
        'event_date',
        'noclip',
        'stairs_id',
    ];

    public function stairs()
    {
        return $this->belongsTo('Stairs', 'stairs_id');
    }
}
