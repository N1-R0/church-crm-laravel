<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Concerns\HasUuids;use Illuminate\Database\Eloquent\Model;use Illuminate\Database\Eloquent\Relations\{BelongsTo,HasMany};
class DevotionSession extends Model {use HasUuids,Auditable;protected $fillable=['name','session_date','start_time','end_time','location','qr_token','status','automatically_generated','created_by'];protected function casts():array{return ['session_date'=>'date','automatically_generated'=>'boolean'];}public function attendanceRecords():HasMany{return $this->hasMany(AttendanceRecord::class);}public function creator():BelongsTo{return $this->belongsTo(User::class,'created_by');}}
