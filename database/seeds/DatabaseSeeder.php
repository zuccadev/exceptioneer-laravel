<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		factory(App\Project::class, 3)->create()->each(function($p) {
			$p->notifications()->saveMany(factory(App\Notification::class, 33)->make());
		});
	}

}
