<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('UserTableSeeder');

    $this->command->info('User table seeded!');
	}

}

class UserTableSeeder extends Seeder {

  public function run()
  {
    DB::table('users')->delete();

    User::create([
      'email' => 'osirun@gmail.com',
      'password' => Hash::make('topsecret')
    ]);
  }

}
