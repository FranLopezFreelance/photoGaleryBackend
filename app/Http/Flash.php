<?php

namespace App\Http;

class Flash {

	public function create($title, $text, $type, $key = 'flash_message', $postMessage = null) {

		session()->flash($key, [
				'title'       => $title,
				'text'        => $text,
				'type'        => $type,
				'postMessage' => $postMessage
			]);

	}

	public function message($title, $text) {

		return $this->create($title, $text, 'info');

	}

	public function success($title, $text) {

		return $this->create($title, $text, 'success');

	}

	public function error($title, $text) {

		return $this->create($title, $text, 'error');
	}

	public function alert($title, $text, $postMessage) {

		return $this->create($title, $text, 'error', 'flash_message_alert', $postMessage);
	}

	public function overlay($title, $text, $type = 'success') {

		return $this->create($title, $text, $type, 'flash_message_overlay');

	}

}
