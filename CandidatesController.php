<?php
class CandidatesController {
	private $model;

	public function __construct() {
		$this->model = new CandidatesModel();
	}

	public function set( $ca_data = array() ) {
		return $this->model->set($ca_data);
	}

	public function get( $candidate_id = '' ) {
		return $this->model->get($candidate_id);
	}

	public function del( $candidate_id = '' ) {
		return $this->model->del($candidate_id);
	}

	public function __destruct() {
		unset($this->model);
	}
}
?>