<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    public $incrementing = false;
    protected $fillable=[];
    protected $hidden=[];
    protected $guarded=[];
    protected $casts=[];

    public function parentable()
    {
        return $this->morphTo('parentable','parentable_type','parentable_id');
    }

}
