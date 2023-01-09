<?php

namespace App\Models;

use App\Helper\UuidModel;
use Illuminate\Database\Eloquent\Model;
use App\Models\UserNomineesModel;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class UserModel extends Model
{
    use UuidModel, SoftDeletes, HasFactory;
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
        return $this->belongsTo(UserNomineesModel::class,'id','nominee_to');
    }
    public function getUser(){
        return $this->belongsTo(UserNomineesModel::class,'id','user_id');
    }

 
}
