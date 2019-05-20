<?php

use Illuminate\Database\Seeder;
use App\User;
use App\RoleUser;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        RoleUser::truncate();

        $user= User::create([
            'name' => 'Admin Account',
            'email' => 'admin@admin.com',
            'password' => Hash::make('p@ssw0rd'),
        ]);

        $input_roles_user_arr = array(
            'user_id' => $user->id,
            'role_id' => 1
        );
        RoleUser::insert($input_roles_user_arr);

        // User::where('id', $user->id)->update($arr);
    }
}
