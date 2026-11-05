<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Concerns\HasUuids;use Illuminate\Database\Eloquent\Model;use Illuminate\Database\Eloquent\Relations\BelongsTo;
class DashboardMetric extends Model {use HasUuids;protected $fillable=['snapshot_date','metric_type','metric_value','previous_value','change_percentage','ministry_group_id','dimensions'];protected function casts():array{return ['snapshot_date'=>'date','metric_value'=>'decimal:2','previous_value'=>'decimal:2','change_percentage'=>'decimal:2','dimensions'=>'array'];}public function ministryGroup():BelongsTo{return $this->belongsTo(MinistryGroup::class);}}
