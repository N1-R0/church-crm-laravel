<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model; use Illuminate\Support\Facades\Auth; use Illuminate\Support\Facades\Schema;
trait Auditable {
 protected static function bootAuditable(): void { foreach(['created','updated','deleted'] as $event) static::$event(function(Model $model) use($event){ if(!Schema::hasTable('audit_logs')) return; AuditLog::create(['user_id'=>Auth::id(),'event'=>$event,'auditable_type'=>$model::class,'auditable_id'=>(string)$model->getKey(),'old_values'=>$event==='updated'?$model->getOriginal():null,'new_values'=>$event==='deleted'?null:$model->getAttributes(),'ip_address'=>request()?->ip(),'user_agent'=>request()?->userAgent()]); }); }
}
