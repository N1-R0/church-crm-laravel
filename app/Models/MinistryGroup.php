<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Concerns\HasUuids;use Illuminate\Database\Eloquent\Model;use Illuminate\Database\Eloquent\Relations\BelongsToMany;use Illuminate\Database\Eloquent\SoftDeletes;
class MinistryGroup extends Model {use HasUuids,SoftDeletes,Auditable;protected $fillable=['name','description','status','meeting_schedule','location','leader_name','last_meeting_date','attendance_percentage'];protected function casts():array{return ['last_meeting_date'=>'date','attendance_percentage'=>'decimal:2'];}public function members():BelongsToMany{return $this->belongsToMany(Member::class)->withPivot(['joined_at','role'])->withTimestamps();}}
