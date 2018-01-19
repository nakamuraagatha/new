<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Nakamura Agatha',
            'email' => 'nakamura.agatha@gmail.com',
            'password' => bcrypt('secret'),
        ]);
        
        DB::table('users')->insert([
            'name' => 'Operator Reskrim',
            'email' => 'ops.reskrim@gmail.com',
            'password' => bcrypt('secret'),
        ]);
        
        DB::table('users')->insert([
            'name' => 'Pelapor Reskrim',
            'email' => 'pelapor.reskrim@gmail.com',
            'password' => bcrypt('secret'),
        ]);
        
        DB::table('users')->insert([
            'name' => 'Operator Narkoba',
            'email' => 'ops.narkoba@gmail.com',
            'password' => bcrypt('secret'),
        ]);
        
        DB::table('users')->insert([
            'name' => 'Pelapor Narkoba',
            'email' => 'pelapor.narkoba@gmail.com',
            'password' => bcrypt('secret'),
        ]);
    }
}
