<?php namespace Modules\Session\Database\Seeders;

use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class SentryGroupSeedTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $groups = Sentinel::getRoleRepository();

        // Create an Admin group
        $groups->createModel()->create(
            [
                'name' => 'Admin',
                'slug' => 'admin',
            ]
        );

        // Create an Users group
        $groups->createModel()->create(
            [
                'name' => 'User',
                'slug' => 'user',
            ]
        );

        // Save the permissions
        $group = Sentinel::findRoleBySlug('admin');
        $group->permissions = [
            'dashboard.index' => true,
            'admin.index' => true,
        ];
        $group->save();

        $group = Sentinel::findRoleBySlug('user');
        $group->permissions = [
            'dashboard.index' => true
        ];
        $group->save();
    }

}