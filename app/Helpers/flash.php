<?php

function flash($title = null, $text = null, $type = null) {

	$flash = app('App\Http\Flash');

	if (func_num_args() == 0) {

		return $flash;

	}

	return $flash->message($title, $text);

}