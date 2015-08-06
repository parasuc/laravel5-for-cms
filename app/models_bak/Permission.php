<?php namespace App\models;

use Zizaco\Entrust\EntrustPermission;
use Illuminate\Database\Eloquent\SoftDeletes;
class Permission extends EntrustPermission
{
	use SoftDeletes;
	//protected $dates = ['deleted_at'];
}