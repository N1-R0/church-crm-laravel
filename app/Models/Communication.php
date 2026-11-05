<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Concerns\HasUuids;use Illuminate\Database\Eloquent\Model;use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Communication extends Model {use HasUuids,Auditable;protected $fillable=['member_id','type','direction','subject','message','sent_at','status','summary','created_by'];protected function casts():array{return ['sent_at'=>'datetime'];}public function member():BelongsTo{return $this->belongsTo(Member::class);}public function creator():BelongsTo{return $this->belongsTo(User::class,'created_by');}}
