<?php

namespace Database\Seeders;

use App\Models\Module;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $moduleAppDashboard = Module::updateOrCreate(['name' => 'Admin Dashboard']);

        Permission::updateOrCreate([
            'module_id' => $moduleAppDashboard->id,
            'name' => 'Access Dashboard',
            'slug' => 'app.dashboard',
        ]);


        // Role management
        $moduleAppRole = Module::updateOrCreate(['name' => 'Role Management']);
        Permission::updateOrCreate([
            'module_id' => $moduleAppRole->id,
            'name' => 'Access Roles',
            'slug' => 'app.roles.index',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppRole->id,
            'name' => 'Create Role',
            'slug' => 'app.roles.create',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppRole->id,
            'name' => 'Edit Role',
            'slug' => 'app.roles.edit',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppRole->id,
            'name' => 'Delete Role',
            'slug' => 'app.roles.destroy',
        ]);

        // User management
        $moduleAppUser = Module::updateOrCreate(['name' => 'User Management']);
        Permission::updateOrCreate([
            'module_id' => $moduleAppUser->id,
            'name' => 'Access Users',
            'slug' => 'app.users.index',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppUser->id,
            'name' => 'Create User',
            'slug' => 'app.users.create',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppUser->id,
            'name' => 'Edit User',
            'slug' => 'app.users.edit',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppUser->id,
            'name' => 'Delete User',
            'slug' => 'app.users.destroy',
        ]);

        // Backup management
        $moduleAppBackup = Module::updateOrCreate(['name' => 'Backup Management']);
        Permission::updateOrCreate([
            'module_id' => $moduleAppBackup->id,
            'name' => 'Access Backup',
            'slug' => 'app.backup.index',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppBackup->id,
            'name' => 'Create Backup',
            'slug' => 'app.backup.create',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppBackup->id,
            'name' => 'Download Backup',
            'slug' => 'app.backup.edit',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppBackup->id,
            'name' => 'Delete Backup',
            'slug' => 'app.backup.destroy',
        ]);


        // Profile management
        $moduleAppProfile = Module::updateOrCreate(['name' => 'Profile']);
        Permission::updateOrCreate([
            'module_id' => $moduleAppProfile->id,
            'name' => 'Profile Update',
            'slug' => 'app.profile.update',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppProfile->id,
            'name' => 'Password Change',
            'slug' => 'app.profile.password',
        ]);

        // Appointment management
        $moduleAppointment = Module::updateOrCreate(['name' => 'Appointment management']);
        Permission::updateOrCreate([
            'module_id' => $moduleAppointment->id,
            'name' => 'All Appointment',
            'slug' => 'appointment.index',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppointment->id,
            'name' => 'Appointment Create',
            'slug' => 'appointment.create',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppointment->id,
            'name' => 'Appointment Edit',
            'slug' => 'appointment.edit',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppointment->id,
            'name' => 'Appointment Details',
            'slug' => 'appointment.details',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppointment->id,
            'name' => 'Delete Appointment',
            'slug' => 'appointment.destroy',
        ]);
        // Patient management
        $modulePatient = Module::updateOrCreate(['name' => 'Patient management']);
        Permission::updateOrCreate([
            'module_id' => $modulePatient->id,
            'name' => 'My Appointment',
            'slug' => 'myAppointment',
        ]);
        Permission::updateOrCreate([
            'module_id' => $modulePatient->id,
            'name' => 'All Patient List',
            'slug' => 'patient_list',
        ]);
        // Doctor management
        $moduleDoctor = Module::updateOrCreate(['name' => 'Doctor management']);
        Permission::updateOrCreate([
            'module_id' => $moduleDoctor->id,
            'name' => 'Doctor Dashboard',
            'slug' => 'doctor_dashboard',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleDoctor->id,
            'name' => 'All Doctor List',
            'slug' => 'doctor_list',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleDoctor->id,
            'name' => 'Doctor Appointment',
            'slug' => 'doctorAppointment',
        ]);

        //prescription management
        $modulePrescription = Module::updateOrCreate(['name' => 'Prescription Management']);
        Permission::updateOrCreate([
            'module_id' => $modulePrescription->id,
            'name' => 'Access Prescription',
            'slug' => 'prescription.index',
        ]);
        Permission::updateOrCreate([
            'module_id' => $modulePrescription->id,
            'name' => 'Create Prescription',
            'slug' => 'prescription.create',
        ]);
        Permission::updateOrCreate([
            'module_id' => $modulePrescription->id,
            'name' => 'Edit Prescription',
            'slug' => 'prescription.edit',
        ]);
        Permission::updateOrCreate([
            'module_id' => $modulePrescription->id,
            'name' => 'Download Prescription',
            'slug' => 'prescription.show',
        ]);
        Permission::updateOrCreate([
            'module_id' => $modulePrescription->id,
            'name' => 'Delete Prescription',
            'slug' => 'prescription.destroy',
        ]);
        Permission::updateOrCreate([
            'module_id' => $modulePrescription->id,
            'name' => 'My Prescription',
            'slug' => 'myPrescription',
        ]);
        Permission::updateOrCreate([
            'module_id' => $modulePrescription->id,
            'name' => 'Doctor Prescription',
            'slug' => 'doctorPrescription',
        ]);
        Permission::updateOrCreate([
            'module_id' => $modulePrescription->id,
            'name' => 'Download Prescription',
            'slug' => 'download.prescription',
        ]);


    }
}
