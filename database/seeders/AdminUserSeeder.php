<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AdminUser;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // テストユーザーを作成
        AdminUser::factory()->create([
            'name' => 'Admin Test User',
            'email' => 'admintest@example.com',
            'password' => Hash::make('testpassword'), // パスワードを設定
        ]);
    }
}
