<?php 

class candidatesModel extends Model {

	public function set( $ca_data = array() ) {
		foreach ($ca_data as $key => $value) {
			$$key = $value;
		}
		
		$this->query = "REPLACE INTO candidates SET candidate_id = $candidate_id, name = '$name', postulation = '$postulation', photo = '$photo'";
		$this->set_query();
	}

	public function get( $ca = '' ) {
		$this->query = ($ca != '')
			?"SELECT candidate_id, name, postulation, photo  FROM candidates WHERE candidate_id = $ca"
			:"SELECT * FROM candidates";
		
		$this->get_query();

		$num_rows = count($this->rows);

		$data = array();

		foreach ($this->rows as $key => $value) {
			array_push($data, $value);
		}

		return $data;
	}
	
 
	public function del( $ca = '' ) {
		$this->query = "DELETE FROM candidates WHERE candidate_id = $ca";
		$this->set_query();
	}

	public function __destruct() {
		unset($this->model);
	}
}
?>