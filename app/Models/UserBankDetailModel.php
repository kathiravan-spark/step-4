<?php

namespace App\Models;

use App\Helper\UuidModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserBankDetailModel extends Model
{
    use UuidModel, SoftDeletes;
    protected $table = 'bank_details';
    protected $guarded = [];

    public function getUser(){
        return $this->belongsTo('App\Models\User');
    }

}
