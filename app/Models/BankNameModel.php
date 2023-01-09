<?php

namespace App\Models;

use App\Helper\UuidModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BankNameModel extends Model
{
    use UuidModel, SoftDeletes;
    protected $table = 'bank_names';
    protected $guarded = [];

}
