<?php


class tblCustPrivateIndividualsSeeder extends Seeder{
	
	public function run() {
		DB::table('tblCustPrivateIndividual')->delete();

		$tblCustPrivateIndividual = array (
			array(

				'strCustPrivIndivID' => 'CUSTP001',
				'strCustPrivFName' => 'Melody',
				'strCustPrivMName' => 'Reyes',
				'strCustPrivLName' => 'Legaspi',
				'strCustPrivHouseNo' => '44',
				'strCustPrivStreet'=> 'Ipil St.',
				'strCustPrivBarangay' => 'St. Anthony',
				'strCustPrivCity' => 'Cainta',
				'strCustPrivProvince' => 'Rizal',
				'strCustPrivZipCode' => '1007',
				'strCustPrivLandlineNumber' => '0467892',
				'strCustPrivCPNumber' => '(0915)-678-9678',
				'strCustPrivEmailAddress' => 'melodyreyes@gmail.com',
				'boolIsActive' => '1'

			),
			
			array(

				'strCustPrivIndivID' => 'CUSTP002',
				'strCustPrivFName' => 'Rachel',
				'strCustPrivMName' => 'Atian',
				'strCustPrivLName' => 'Nayre',
				'strCustPrivHouseNo' => '41',
				'strCustPrivStreet'=> 'Narra St.',
				'strCustPrivBarangay' => 'Kwek-kwek',
				'strCustPrivCity' => 'Angono',
				'strCustPrivProvince' => 'Rizal',
				'strCustPrivZipCode' => '1003',
				'strCustPrivLandlineNumber' => '0723456',
				'strCustPrivCPNumber' => '(0919)-876-1290',
				'strCustPrivEmailAddress' => 'reychnayre@yahoo.com',
				'boolIsActive' => '1'
			)

	);

	
		DB::table('tblCustPrivateIndividual')->insert($tblCustPrivateIndividual);
		}
}

