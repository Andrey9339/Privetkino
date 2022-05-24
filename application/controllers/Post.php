<?php 

defined('BASEPATH') OR exit('No direc script access allowed');

class Post extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('post_model');
	}

	public function index() {
		$this->data['title'] = "Все посты";
		$this->data['post'] = $this->post_model->getPost();

		$this->load->view('templates/header', $this->data);
		$this->load->view('post/index', $this->data);
		$this->load->view('templates/footer');

	}

	public function view($slug = NULL) {
		$this->data['post_item'] = $this->post_model->getPost($slug);

		if(empty($this->data['post_item'])) {
			show_404();
		}

		$this->data['title'] = $this->data['post_item']['title'];
		$this->data['small_content'] = $this->data['post_item']['small_text'];
		$this->data['content'] = $this->data['post_item']['text'];

		$this->load->view('templates/header', $this->data);
		$this->load->view('post/view', $this->data);
		$this->load->view('templates/footer');
	}

	public function create() {

		$this->data['title'] = "добавить пост";

		if($this->input->post('slug') && $this->input->post('title') && $this->input->post('small_text') && $this->input->post('text')) {

			$slug = $this->input->post('slug');
			$title = $this->input->post('title');
			$small_text = $this->input->post('small_text');
			$text = $this->input->post('text');

			if($this->post_model->setPost($slug, $title, $small_text, $text)) {
				$this->load->view('templates/header', $this->data);
				$this->load->view('post/success', $this->data);
				$this->load->view('templates/footer');
			}
		} else {
			$this->load->view('templates/header', $this->data);
			$this->load->view('post/create', $this->data);
			$this->load->view('templates/footer');
		}

	}


	public function edit($slug = NULL) {

		$this->data['title'] = "редактировать пост";
		$this->data['post_item'] = $this->post_model->getPost($slug);

/*		if(empty($data['news_item'])) {
			show_404();
		}*/

		$this->data['title_post'] = $this->data['post_item']['title'];
		$this->data['small_content_post'] = $this->data['post_item']['small_text'];
		$this->data['content_post'] = $this->data['post_item']['text'];
		$this->data['slug_post'] = $this->data['post_item']['slug'];

		if($this->input->post('slug') && $this->input->post('title') && $this->input->post('small_text') && $this->input->post('text')) {
			$slug = $this->input->post('slug');
			$title = $this->input->post('title');
			$small_text = $this->input->post('small_text');
			$text = $this->input->post('text');

			if($this->post_model->updatePost($slug, $title, $small_text, $text)) {
				echo "Пост успешно отредактирован";
			}
		}

		$this->load->view('templates/header', $this->data);
		$this->load->view('post/edit', $this->data);
		$this->load->view('templates/footer');

	}

	public function delete($slug = NULL) {

		$this->data['post_delete'] = $this->post_model->getPost($slug);

		if(empty($this->data['post_delete'])) {
			show_404();
		}

		$this->data['title'] = "удалить пост";
		$this->data['result'] = "Ошибка удаления ".$this->data['post_delete']['title'];

		if($this->post_model->deletePost($slug)) {
			$this->data['result'] = $this->data['post_delete']['title']." успешно удален";
		}

		$this->load->view('templates/header', $this->data);
		$this->load->view('post/delete', $this->data);
		$this->load->view('templates/footer');

	}


}
