<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StreamSettings extends Model
{
    protected $fillable = ['publishing_point_type',
    'publishing_point_primary',
    'publishing_point_backup',
    'stream_name',
    'login',
    'password',
    'live_transcoding',
    'region',
    'event_id',
    ];

    public $table = 'stream_settings';
}
