<?php


namespace Barada\Laravel\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Migration extends Model {

    protected $fillable = ['migration', 'batch'];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;


}