<?php

namespace App\Models;

use App\Helper\UuidModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class UserModel extends Model
{
    use UuidModel, SoftDeletes;
    protected $table = 'users';
    protected $fillable = [
        'name',
        'email',
        'address',
    ];
    /**
     * Relation ship
     */
     
    public function getNominee(){
        return $this->belongsTo('App\Models\UserNominee');
    }

 
}
