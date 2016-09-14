<?php
 
namespace App;
 
use Illuminate\Database\Eloquent\Model;
 
class Upload extends Model
{
 
    public $timestamps = false;
 
    protected $table = 'uploads';
 
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['filename'];
 
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}