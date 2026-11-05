<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Concerns\HasUuids;use Illuminate\Database\Eloquent\Model;use Illuminate\Database\Eloquent\Relations\BelongsTo;
class PastoralNote extends Model {use HasUuids,Auditable;protected $fillable=['member_id','author_id','note_date','category','content','follow_up_status','follow_up_due_date','completed_at','confidential'];protected function casts():array{return ['note_date'=>'date','follow_up_due_date'=>'date','completed_at'=>'datetime','confidential'=>'boolean'];}public function member():BelongsTo{return $this->belongsTo(Member::class);}public function author():BelongsTo{return $this->belongsTo(User::class,'author_id');}}
