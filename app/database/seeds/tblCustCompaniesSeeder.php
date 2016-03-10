<?php


class tblCustCompaniesSeeder extends Seeder{
	
	public function run() {
		DB::table('tblCustCompany')->delete();

		$tblCustCompany = array (
			array(

				'strCustCompanyID' => 'CUSTC001',
				'strCustCompanyName' => 'Pfizer Phils',
				'strCustCompanyHouseNo' =>'771',
				'strCustCompanyStreet'=> 'Aseana',
				'strCustCompanyBarangay'=> 'San Miguel',
				'strCustCompanyCity'=> 'Pasig',
				'strCustCompanyProvince'=> 'NCR',
				'strCustCompanyZipCode'=> '099',
				'strCustContactPerson' => 'Lala Roque',
				'strCustCompanyEmailAddress' => 'melodyreyes@pfizer.com',
				'strCustCompanyTelNumber' => '2227777',
				'strCustCompanyCPNumber' => '09178901234',
				'strCustCompanyFaxNumber' => '4440102',

				'boolIsActive' => '1'

			),
			
			array(

				'strCustCompanyID' => 'CUSTC002',
				'strCustCompanyName' => 'Nestle PH',
				'strCustCompanyHouseNo' =>'056',
				'strCustCompanyStreet'=> 'Roxas',
				'strCustCompanyBarangay'=> 'Regexing',
				'strCustCompanyCity'=> 'Majayjay',
				'strCustCompanyProvince'=> 'Laguna',
				'strCustCompanyZipCode'=> '1028',
				'strCustContactPerson' => 'Zobel Ayala',
				'strCustCompanyEmailAddress' => 'welness@nestle.com',
				'strCustCompanyTelNumber' => '0345678',
				'strCustCompanyCPNumber' => '09223456987',
				'strCustCompanyFaxNumber' => '0031234',
				'boolIsActive' => '1'
			)

	);

	
		DB::table('tblCustCompany')->insert($tblCustCompany);
		}
}

