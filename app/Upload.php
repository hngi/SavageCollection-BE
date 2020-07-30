<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'uploads';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        // User Id
        'user_id',

        // Upload Specs
        'title', 'image', 'text',
        'type',
        'points'
    ];
}
