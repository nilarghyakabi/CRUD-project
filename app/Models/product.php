<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class product extends Model
{
    use HasFactory;
    protected $fillable=[];
    protected $hidden=[];
    protected $guarded = [];
    protected $casts=[];

    public function scopeActive($query){
        return $query->where('status','=','active')->whereNull('deleted_at');
    }
    public function scopeInactive($query)
    {
        return $query->where('status','=','inactive');
    }

    public function image():MorphOne
    {
        return $this->morphOne(Image::class,'parentable','parentable_type','parentable_id');
    }
}


