<?php

namespace Database\Seeders;

use App\Enums\PermissionEnum;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    protected $premissions = [
        PermissionEnum::CRM_STATUS->value,
        PermissionEnum::CRM_GROUP->value,
        PermissionEnum::CRM_SOURCE->value,
        PermissionEnum::CRM_LEAD->value,
        PermissionEnum::CRM_CUSTOMER->value,
        PermissionEnum::CRM_TEAM->value
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->premissions as $premission) {
            Permission::create([
                'name' => $premission
            ]);
        }
    }
}
