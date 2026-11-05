<?php
namespace App\Policies;
use App\Models\{Member,User};
class MemberPolicy {public function viewAny(User $u):bool{return $u->status==='active';}public function view(User $u,Member $m):bool{return $u->status==='active';}public function create(User $u):bool{return $u->hasRole('admin','staff','pastor');}public function update(User $u,Member $m):bool{return $u->hasRole('admin','staff');}public function delete(User $u,Member $m):bool{return $u->hasRole('admin');}}
