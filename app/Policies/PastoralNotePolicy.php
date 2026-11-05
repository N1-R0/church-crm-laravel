<?php
namespace App\Policies;
use App\Models\{PastoralNote,User};
class PastoralNotePolicy {public function viewAny(User $u):bool{return $u->hasRole('admin','pastor');}public function view(User $u,PastoralNote $n):bool{return $u->hasRole('admin','pastor');}public function create(User $u):bool{return $u->hasRole('admin','pastor');}public function update(User $u,PastoralNote $n):bool{return $u->role==='admin'||$n->author_id===$u->id;}public function delete(User $u,PastoralNote $n):bool{return $u->role==='admin'||$n->author_id===$u->id;}}
