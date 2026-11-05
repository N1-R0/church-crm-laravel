<?php
use Illuminate\Database\Migrations\Migration; use Illuminate\Database\Schema\Blueprint; use Illuminate\Support\Facades\Schema;
return new class extends Migration {
 public function up(): void {
  Schema::create('households',function(Blueprint $t){$t->uuid('id')->primary();$t->string('name');$t->string('address')->nullable();$t->string('city')->nullable();$t->string('state')->nullable();$t->string('postal_code',24)->nullable();$t->string('phone',40)->nullable();$t->string('email')->nullable();$t->text('notes')->nullable();$t->timestamps();$t->softDeletes();$t->index(['name','city']);});
  Schema::create('ministry_groups',function(Blueprint $t){$t->uuid('id')->primary();$t->string('name')->unique();$t->text('description')->nullable();$t->string('status',24)->default('active')->index();$t->string('meeting_schedule')->nullable();$t->string('location')->nullable();$t->string('leader_name')->nullable();$t->date('last_meeting_date')->nullable();$t->decimal('attendance_percentage',5,2)->nullable();$t->timestamps();$t->softDeletes();});
  Schema::create('members',function(Blueprint $t){$t->uuid('id')->primary();$t->foreignUuid('household_id')->nullable()->constrained()->nullOnDelete();$t->string('first_name');$t->string('last_name');$t->string('email')->nullable()->unique();$t->string('phone',40)->nullable();$t->string('status',24)->default('new')->index();$t->string('gender',32)->nullable()->index();$t->date('date_of_birth')->nullable();$t->date('join_date')->nullable()->index();$t->string('address')->nullable();$t->string('city')->nullable();$t->string('state')->nullable();$t->string('postal_code',24)->nullable();$t->string('role',40)->default('member');$t->string('photo_url')->nullable();$t->string('emergency_contact_name')->nullable();$t->string('emergency_contact_phone',40)->nullable();$t->text('notes')->nullable();$t->timestamps();$t->softDeletes();$t->index(['last_name','first_name']);});
  Schema::create('ministry_group_member',function(Blueprint $t){$t->foreignUuid('ministry_group_id')->constrained()->cascadeOnDelete();$t->foreignUuid('member_id')->constrained()->cascadeOnDelete();$t->date('joined_at')->nullable();$t->string('role',40)->default('participant');$t->timestamps();$t->primary(['ministry_group_id','member_id']);});
  Schema::create('member_ministry_group', function (Blueprint $table) {
    $table->uuid('member_id');
    $table->uuid('ministry_group_id');

    $table->string('role')->nullable();
    $table->date('joined_at')->nullable();
    $table->timestamps();

    $table->foreign('member_id')
        ->references('id')
        ->on('members')
        ->cascadeOnDelete();

    $table->foreign('ministry_group_id')
        ->references('id')
        ->on('ministry_groups')
        ->cascadeOnDelete();

    $table->primary([
        'member_id',
        'ministry_group_id',
    ]);
});

 }
 public function down(): void {Schema::dropIfExists('ministry_group_member');Schema::dropIfExists('members');Schema::dropIfExists('ministry_groups');Schema::dropIfExists('households');Schema::dropIfExists('member_ministry_group');}

};
