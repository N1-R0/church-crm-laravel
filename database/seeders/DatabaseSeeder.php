<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder {public function run():void{$this->call(AdminUserSeeder::class);if(filter_var(env('DEMO_SEED',false),FILTER_VALIDATE_BOOL))$this->call(SampleDataSeeder::class);}}
