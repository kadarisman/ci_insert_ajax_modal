<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['product'] = $this->M_product->get_product();
		$this->load->view('welcome_message', $data);
	}

	public function add_product()
	{

		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('description', 'Description', 'required|trim');
		if ($this->form_validation->run() == false) {
			$errors = array(
				'n_error' => form_error('name'),
				'd_error' => form_error('description')
			);
			echo json_encode(['error' => $errors]);
		} else {
			echo json_encode(['success' => 'Record added successfully.']);
			$data = [
				'name' => $this->input->post('name', true),
				'description' => $this->input->post('description', true),
			];
			$this->M_product->add($data, 'product');
		}
	}
}