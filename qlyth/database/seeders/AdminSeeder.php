<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$luvyBtfKZkES7eo2yG8xLemhbSO.oIhBhlU6slWC6F.qEMkXQ8Wou', // 12345678
        ]);

        $admin->assignRole('admin');

        $permissions = [
            'Role access', 'Role edit', 'Role create', 'Role delete',
            'User access', 'User edit', 'User create', 'User delete', 'User update role',
            'Permission access', 'Permission edit', 'Permission create', 'Permission delete',
            'Attendance access', 'Attendance create', 'Attendance edit', 'Attendance delete',
            'Classes access', 'Classes create', 'Classes edit', 'Classes delete',
            'Dashbord access', 'Dashbord create', 'Dashbord edit', 'Dashbord delete',
            'Exam access', 'Exam create', 'Exam edit', 'Exam delete',
            'ExamMarks access', 'ExamMarks create', 'ExamMarks edit', 'ExamMarks delete',
            'Exam result',
            'ExamSchedule access', 'ExamSchedule create', 'ExamSchedule edit', 'ExamSchedule delete',
            'Expense access', 'Expense create', 'Expense edit', 'Expense delete',
            'FeeCollection access', 'FeeCollection create', 'FeeCollection edit', 'FeeCollection delete',
            'MailSetting access', 'MailSetting create', 'MailSetting edit', 'MailSetting delete',
            'Salary access', 'Salary create', 'Salary edit', 'Salary delete',
            'Salarysheet access', 'Salarysheet create', 'Salarysheet edit', 'Salarysheet delete',
            'Student access', 'Student create', 'Student edit', 'Student delete',
            'StudentPromotion access', 'StudentPromotion create', 'StudentPromotion edit', 'StudentPromotion delete',
            'Subject access', 'Subject create', 'Subject edit', 'Subject delete',
            'System config control', 'System config create',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        $admin->givePermissionTo(Permission::all());
    }
}
