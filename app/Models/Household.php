<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Concerns\HasUuids; use Illuminate\Database\Eloquent\Model; use Illuminate\Database\Eloquent\Relations\HasMany; use Illuminate\Database\Eloquent\SoftDeletes;
class Household extends Model {use HasUuids,SoftDeletes,Auditable;protected $fillable=['name','address','city','state','postal_code','phone','email','notes'];public function members():HasMany{return $this->hasMany(Member::class);} }
