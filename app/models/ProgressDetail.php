<?php 

class ProgressDetail extends Eloquent {

	protected $table = 'tblJobProgressDetail';
	protected $primaryKey = 'intJobProgressID';
	protected $fillable = array('strJobProgressName',
								'strJobProgressDesc');



	public function detail() {

		return $this->hasMany('JobProgress', 'strEmpJobProgressID');
	}
}