<?php
use App\User;
use App\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::firstOrCreate([
            // 'id' => 1,
            'name'=>'admin',
            'email'=>'admin@admin.com',
            'password'=> Hash::make('password')
            ]);
           
           $utilisateur =  User::firstOrCreate([
            //    'id'=>2,
                'name'=>'Georges',
                'email'=>'georges@gmail.com',
                'password'=> Hash::make('password')
        ]);
        $simple_user =  User::firstOrCreate([
            //    'id'=>2,
                'name'=>'Eliane',
                'email'=>'eliane@gmail.com',
                'password'=> Hash::make('password')
        ]);
        $adminRole= Role::where('name','admin')->first();
        $utilisateurRole= Role::where('name','utilisateur')->first();
        $simpleuserRole= Role::where('name','simple_utilisateur')->first();

        $admin->roles()->sync($adminRole);
        $utilisateur->roles()->sync($utilisateurRole);
        $simple_user->roles()->sync( $simpleuserRole);
    }
}
