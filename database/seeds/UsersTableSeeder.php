<?php

use Illuminate\Database\Seeder;
use App\Models\Users\User;

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
            'over_name' => 'Atlas',
            'under_name' => '1郎',
            'over_name_kana' => 'アトラス',
            'under_name_kana' => 'イチロウ',
            'mail_address' => 'a@com',
            'sex' => '1',
            'role' => '4',
            'birth_day' => '2001-01-01',
            'password' => Hash::make('12345678')
        ]);

        DB::table('users')->insert([
            'over_name' => 'Atlas',
            'under_name' => '2子',
            'over_name_kana' => 'アトラス',
            'under_name_kana' => 'ニコ',
            'mail_address' => 'b@com',
            'sex' => '2',
            'role' => '1',
            'birth_day' => '1990-01-01',
            'password' => Hash::make('12345678')
        ]);

        DB::table('users')->insert([
            'over_name' => 'Atlas',
            'under_name' => '3郎',
            'over_name_kana' => 'アトラス',
            'under_name_kana' => 'サブロウ',
            'mail_address' => 'c@com',
            'sex' => '1',
            'role' => '2',
            'birth_day' => '1990-01-01',
            'password' => Hash::make('12345678')
        ]);

        DB::table('users')->insert([
            'over_name' => 'Atlas',
            'under_name' => '4郎',
            'over_name_kana' => 'アトラス',
            'under_name_kana' => 'シロウ',
            'mail_address' => 'd@com',
            'sex' => '1',
            'role' => '3',
            'birth_day' => '1990-01-01',
            'password' => Hash::make('12345678')
        ]);

        DB::table('users')->insert([
            'over_name' => 'Atlas',
            'under_name' => '5郎',
            'over_name_kana' => 'アトラス',
            'under_name_kana' => 'ゴロウ',
            'mail_address' => 'e@com',
            'sex' => '1',
            'role' => '4',
            'birth_day' => '1990-01-01',
            'password' => Hash::make('12345678')
        ]);

        DB::table('users')->insert([
            'over_name' => 'Atlas',
            'under_name' => '6子',
            'over_name_kana' => 'アトラス',
            'under_name_kana' => 'ロコ',
            'mail_address' => 'f@com',
            'sex' => '2',
            'role' => '4',
            'birth_day' => '1990-01-01',
            'password' => Hash::make('12345678')
        ]);

        DB::table('users')->insert([
            'over_name' => 'Atlas',
            'under_name' => '7子',
            'over_name_kana' => 'アトラス',
            'under_name_kana' => 'ナナコ',
            'mail_address' => 'g@com',
            'sex' => '2',
            'role' => '4',
            'birth_day' => '1990-01-01',
            'password' => Hash::make('12345678')
        ]);

        DB::table('users')->insert([
            'over_name' => 'Atlas',
            'under_name' => '8子',
            'over_name_kana' => 'アトラス',
            'under_name_kana' => 'ヤコ',
            'mail_address' => 'h@com',
            'sex' => '2',
            'role' => '4',
            'birth_day' => '1990-01-01',
            'password' => Hash::make('12345678')
        ]);

        DB::table('users')->insert([
            'over_name' => 'Atlas',
            'under_name' => '9郎',
            'over_name_kana' => 'アトラス',
            'under_name_kana' => 'クロウ',
            'mail_address' => 'i@com',
            'sex' => '1',
            'role' => '4',
            'birth_day' => '1990-01-01',
            'password' => Hash::make('12345678')
        ]);

        DB::table('users')->insert([
            'over_name' => 'Atlas',
            'under_name' => '10子',
            'over_name_kana' => 'アトラス',
            'under_name_kana' => 'トウコ',
            'mail_address' => 'j@com',
            'sex' => '2',
            'role' => '4',
            'birth_day' => '1990-01-01',
            'password' => Hash::make('12345678')
        ]);

        DB::table('users')->insert([
            'over_name' => 'Atlas',
            'under_name' => '11郎',
            'over_name_kana' => 'アトラス',
            'under_name_kana' => 'ジュウイチロウ',
            'mail_address' => 'k@com',
            'sex' => '1',
            'role' => '4',
            'birth_day' => '1990-01-01',
            'password' => Hash::make('12345678')
        ]);
    }
}
