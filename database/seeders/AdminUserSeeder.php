<?php
namespace Database\Seeders;
use App\Models\User;use Illuminate\Database\Seeder;use Illuminate\Support\Facades\Hash;
class AdminUserSeeder extends Seeder {public function run():void{$email=env('DEMO_SEED_EMAIL');$password=env('DEMO_SEED_PASSWORD');if(!$email||!$password){$this->command?->warn('No admin created: set DEMO_SEED_EMAIL and DEMO_SEED_PASSWORD.');return;}User::updateOrCreate(['email'=>$email],['name'=>env('DEMO_SEED_NAME','Church Administrator'),'password'=>Hash::make($password),'role'=>'admin','status'=>'active','email_verified_at'=>now()]);}}
