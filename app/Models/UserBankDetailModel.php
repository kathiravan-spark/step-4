<?php

namespace App\Models;

use App\Helper\UuidModel;
use Illuminate\Database\Eloquent\Model;
use App\Models\UserModel;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserBankDetailModel extends Model
{
    use UuidModel, SoftDeletes, HasFactory;
    protected $table = 'bank_details';
    protected $guarded = [];

    public function getUser(){
        return $this->belongsTo(UserModel::class, 'user_id','id');
    }

}
