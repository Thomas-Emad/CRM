<?php

namespace Database\Seeders;

use App\Enums\PermissionEnum;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            'admin',
            'sales'
        ];

        foreach ($roles as $role) {
            $role = Role::create([
                'name' => $role
            ]);

            $role->givePermissionTo($this->getPermissions($role->name));
        }
    }

    private function getPermissions($role): array
    {
        return match ($role) {
            'admin' => [
                PermissionEnum::CRM_STATUS->value,
                PermissionEnum::CRM_LEAD_UNIT->value,
                PermissionEnum::CRM_LEAD_TYPE->value,
                PermissionEnum::CRM_SOURCE->value,
                PermissionEnum::CRM_LEAD_SHOW->value,
                PermissionEnum::CRM_LEAD_OPERATION->value,
                PermissionEnum::CRM_LEAD_DELETE->value,
                PermissionEnum::CRM_CUSTOMER->value,
                PermissionEnum::CRM_TEAM->value,
                PermissionEnum::CRM_ACTIVIY_SHOW->value,
                PermissionEnum::CRM_ACTIVIY_OPERATION->value,
                PermissionEnum::CRM_ACTIVIY_DELETE->value,
                PermissionEnum::CRM_ACTIVIY_NOTE->value,
                PermissionEnum::CRM_ACTIVIY_MEETING->value,
            ],
            'sales' => [
                PermissionEnum::CRM_LEAD_SHOW->value,
                PermissionEnum::CRM_LEAD_OPERATION->value,
                PermissionEnum::CRM_LEAD_DELETE->value,
                PermissionEnum::CRM_CUSTOMER->value,
                PermissionEnum::CRM_ACTIVIY_SHOW->value,
                PermissionEnum::CRM_ACTIVIY_OPERATION->value,
                PermissionEnum::CRM_ACTIVIY_NOTE->value,
                PermissionEnum::CRM_ACTIVIY_MEETING->value,
            ]
        };
    }
}
