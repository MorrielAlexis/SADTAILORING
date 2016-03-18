<?php

class OrderMeasurementController extends BaseController{

	public function order($orderID, $custID){

		$data = $orderID;
		$data2 = $custID;

		$customer = DB::table('tblcustomer')
					->rightJoin('tblcustprivateindividual', 'tblcustomer.strCustomerID', '=' ,'tblcustprivateindividual.strCustPrivIndivID')
					->select('tblcustprivateindividual.*','tblcustomer.*')
					->where('tblcustomer.strCustomerID', '=', $data2)
					->get();

		$garments = DB::table('tbljoborder_garment')
					->rightJoin('tblGarmentCategory', 'tbljoborder_garment.strCategoryID', '=', 'tblGarmentCategory.strGarmentCategoryID')
					->rightJoin('tblGarmentSegment', 'tbljoborder_garment.strSegmentID', '=', 'tblGarmentSegment.strGarmentSegmentID')
					->select('tblGarmentCategory.strGarmentCategoryName', 'tblGarmentSegment.strGarmentSegmentName', 'tbljoborder_garment.*')
					->where('tbljoborder_garment.strJobOrderID', '=', $data)
					->get();

		return View::make('orderMeasurement')
					->with('customer', $customer)
					->with('garments', $garments);

	}
}