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

		$this->call('tblEmployeeRolesSeeder');
		$this->call('tblEmployeesSeeder');
		$this->call('tblCustPrivateIndividualsSeeder');
		$this->call('tblCustCompaniesSeeder');
		$this->call('tblGarmentCategoriesSeeder');
		$this->call('tblGarmentSegmentsSeeder');
		$this->call('tblDesignPatternsSeeder');
		$this->call('tblMeasurementDetailsSeeder');
		$this->call('tblMeasurementHeadersSeeder');
		$this->call('tblFabricTypesSeeder');
		$this->call('tblSwatchesSeeder');
		$this->call('tblCataloguesSeeder');
		$this->call('tblMaterialThreadsSeeder');
		$this->call('tblMaterialNeedlesSeeder');
		$this->call('tblMaterialButtonsSeeder');
		$this->call('tblMaterialHookandEyesSeeder');
		$this->call('tblMaterialZippersSeeder');
		$this->call('tblUsersSeeder');




		
		
	}

}
