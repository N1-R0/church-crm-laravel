<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Concerns\HasUuids;use Illuminate\Database\Eloquent\Model;use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Donation extends Model {use HasUuids,Auditable;protected $fillable=['member_id','donation_date','amount','currency','fund','payment_method','status','receipt_number','processed_at','notes'];protected function casts():array{return ['donation_date'=>'date','amount'=>'decimal:2','processed_at'=>'datetime'];}public function member():BelongsTo{return $this->belongsTo(Member::class);}}
