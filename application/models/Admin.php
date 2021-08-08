<?php

namespace application\models;

use application\core\Model;
use Imagick;

class Admin extends Model {

	public $error;

	public function loginValidate($post) {
		$config = require 'application/config/admin.php';
		if ($config['login'] != $post['login'] or $config['password'] != $post['password']) {
			$this->error = 'Логин или пароль указан неверно';
			return false;
		}
		return true;
	}

	public function postValidate($post, $type) {
		$nameLen = iconv_strlen($post['name']);
		$yearNow = date("Y");						//берем текущий год
		$yearValue = $post['year'];					//добавляем год для книги
		$authorLen = iconv_strlen($post['author']); //добавляем автора для книги
		$genreLen = iconv_strlen($post['genre']); 	//добавляем жанр для книги
		if ($nameLen < 3 or $nameLen > 300) {
			$this->error = 'Название должно содержать от 3 до 300 символов';
			return false; 
		} elseif ($yearValue > $yearNow) {
			$this->error = 'Год издания книги не должен превышать текущий год';
			return false;
		} elseif ($authorLen < 3 or $authorLen > 300) {
			$this->error = 'Автор книги должен содержать от 3 до 300 символов';
			return false;
		} elseif ($genreLen < 3 or $genreLen > 300) {
			$this->error = 'Жанр книги должен содержать от 3 до 300 символов';
			return false;
		} 
		if (empty($_FILES['book']['tmp_name']) and $type == 'add') {
			$this->error = 'Книга не выбрана';
			return false;
		}
		 
		return true;
	} 

	public function postAdd($post) {
		$params = [
			'id' => '',
			'name' => $post['name'],
			'genre' => $post['genre'],
			'author' => $post['author'],
			'year' => $post['year'],
			'path_book' => "",
		];
		$this->db->query('INSERT INTO posts VALUES (:id, :name, :genre, :author, :year, :path_book)', $params);
		//echo $this->db->lastInsertId();
		return $this->db->lastInsertId();
	}

	public function postEdit($post, $id) {
		$params = [
			'id' => $id,
			'name' => $post['name'],
			'genre' => $post['genre'],
			'author' => $post['author'],
			'year' => $post['year']	
		];
		$this->db->query('UPDATE posts SET name = :name, genre = :genre, author = :author, year = :year  WHERE id = :id', $params);
	}

	public function postUploadImage($path, $id) { 
		$img = new Imagick($path);
		$img->cropThumbnailImage(1080, 600);
		$img->setImageCompressionQuality(80);
		$img->writeImage('public/materials/'.$id.'.jpg');
	}
	
	public function postUploadBook($path, $id){
		$file_book = "public/materials/".$_FILES['book']['name'];
		move_uploaded_file($_FILES['book']['tmp_name'], $file_book);
			if(isset($_FILES['book']['name']))
			{
				$this->error = 'Загружена книга';
				$params = [
					'id' => $id,
					'path_book' => $_FILES['book']['name']
				];				
				$this->db->query('UPDATE posts SET  path_book = :path_book  WHERE id = :id', $params);
			}
		//return ($_FILES['book']['name']);	
		}

	public function isPostExists($id) {
		$params = [
			'id' => $id,
		];
		return $this->db->column('SELECT id FROM posts WHERE id = :id', $params);
	}

	public function postDelete($id) {
		$params = [
			'id' => $id,
		];
		$this->db->query('DELETE FROM posts WHERE id = :id', $params);
		$path_book = $this->db->column('SELECT path_book FROM posts WHERE id = :id', $params);
		unlink('public/materials/'.$path_book);
	}

	public function postData($id) {
		$params = [
			'id' => $id,
		];
		return $this->db->row('SELECT * FROM posts WHERE id = :id', $params);
	}

}