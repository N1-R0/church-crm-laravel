<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Concerns\HasUuids;use Illuminate\Database\Eloquent\Model;use Illuminate\Database\Eloquent\Relations\BelongsTo;
class AttendanceRecord extends Model {use HasUuids,Auditable;protected $fillable=['member_id','devotion_session_id','attendance_date','event_type','status','attendee_type','guest_name','guest_phone','guest_email','check_in_time','check_in_method','notes'];protected function casts():array{return ['attendance_date'=>'date','check_in_time'=>'datetime'];}public function member():BelongsTo{return $this->belongsTo(Member::class);}public function devotionSession():BelongsTo{return $this->belongsTo(DevotionSession::class);}}
