<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Concerns\HasUuids;use Illuminate\Database\Eloquent\Model;use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Notification extends Model {use HasUuids;protected $fillable=['recipient_user_id','type','title','message','status','priority','action_url','expires_at','read_at'];protected function casts():array{return ['expires_at'=>'datetime','read_at'=>'datetime'];}public function recipient():BelongsTo{return $this->belongsTo(User::class,'recipient_user_id');}}
