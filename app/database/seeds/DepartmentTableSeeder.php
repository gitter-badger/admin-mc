<?php



class DepartmentTableSeeder extends Seeder {

	public function run()
	{
		Department::create([
					'name' => 'English',
					'key'  => Helpers::createDepartmentKey('English')
		]);
	}

}