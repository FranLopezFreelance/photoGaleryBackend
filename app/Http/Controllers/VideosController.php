<?php

namespace App\Http\Controllers;

use App\Section;
use App\Video;
use Illuminate\Http\Request;

use Validator;

class VideosController extends Controller {

	public function __construct() {
		$this->middleware('auth');
	}

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	protected function validator(array $data) {
		return Validator::make($data, [
				'name'        => 'required|max:100',
				'description' => 'required|max:300',
				'type_id'     => 'required',
				'section_id'  => 'required',
				'order'       => 'required',
			]);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$videos = Video::all()->sortBy('order');
		return view('backend.video.index', compact('videos'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		$sections = Section::all()->sortBy('order');
		return view('backend.video.create', compact('sections'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function createBySection(Section $section) {
		return view('backend.video.create', compact('section'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		Video::create($request->all());
		return redirect('/video')->with('msg', 'El video se subió correctamente');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		return view('backend.video.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		$sections = Section::all();
		return view('backend.video.edit');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		//
	}
}
