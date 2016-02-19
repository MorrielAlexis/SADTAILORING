<?php


class tblCustPrivateIndividualsSeeder extends Seeder{
	
	public function run() {
		DB::table('tblCustPrivateIndividual')->delete();

		$tblCustPrivateIndividual = array (
			array(

				'strCustPrivIndivID' => 'CUSTP001',
				'strCustPrivFName' => 'Melody',
				'strCustPrivLName' => 'Reyes',
				'strCustPrivMName' => 'Legaspi',
				'strCustPrivAddress' =>'Cainta, Rizal',
				'strCustPrivLandlineNumber' => '0467892',
				'strCustPrivCPNumber' => '09156789678',
				'strCustPrivEmailAddress' => 'melodyreyes@gmail.com',
				'boolIsActive' => '1'

			),
			
			array(

				'strCustPrivIndivID' => 'CUSTP002',
				'strCustPrivFName' => 'Rachel',
				'strCustPrivLName' => 'Atian',
				'strCustPrivMName' => 'Nayre',
				'strCustPrivAddress' =>'Signal Village, Taguig City',
				'strCustPrivLandlineNumber' => '0723456',
				'strCustPrivCPNumber' => '09198761290',
				'strCustPrivEmailAddress' => 'reychnayre@yahoo.com',
				'boolIsActive' => '1'
			)

	);

	
		DB::table('tblCustPrivateIndividual')->insert($tblCustPrivateIndividual);
		}
}

