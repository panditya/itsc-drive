<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class File extends Model
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'icon', 'path', 'category_id', 'user_id', 'count'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * Get all of the owning category models.
     */
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    /**
     * Get users models.
     */
    public function user()
    {
        return $this->hasOne('App\User');
    }

    /**
     * Get the report that containing the file.
     */
    public function report()
    {
        return $this->hasMany('App\Report');
    }
}
