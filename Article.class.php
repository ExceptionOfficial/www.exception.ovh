<?php
class Article {
	private $title;
	private $author;
	private $date;
	private $text;

	public function __construct($ti, $au, $da, $te) {
		$this->$title = $ti;
		$this->$author = $au;
		$this->$date = $da;
		$this->$text = $te;
	}

	public function getTitle() {
		return $this->$title;
	}

	public function getAuthor() {
		return $this->$author;
	}

	public function getDate() {
		return $this->$date;
	}

	public function getText() {
		return $this->$text;
	}
}
