<?php

namespace App\Http\Controllers;

use App\Section;

class FrontController extends Controller {

	public function getSections() {

		$sections = Section::all()->each(function ($section) {
				$section->type;
			})->sortBy('order');

		return response()->json([
				'sections' => $sections
			]);
	}

	public function getPhotosBySection(Section $section) {

		$section->photos;

		return response()->json([
				'thisSection' => $section
			]);
	}

	public function getVideosBySection(Section $section) {

		$section->videos;

		return response()->json([
				'thisSection' => $section
			]);
	}

}
