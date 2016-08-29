<?php

namespace App\Http\Controllers;

use App\Section;
use App\Type;
use Illuminate\Http\Request;
use Validator;

class SectionsController extends Controller {

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
				'name'      => 'required|max:100',
				'type_id'   => 'required',
				'order'     => 'required',
				'type_view' => 'required',
			]);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$sections = Section::all()->sortBy('order');
		return view('backend.section.index', compact('sections'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		$types    = Type::all();
		$sections = Section::all()->sortBy('order');
		return view('backend.section.create', compact('types', 'sections'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function createBySection(Section $section) {
		$types    = Type::all();
		$sections = Section::all()->sortBy('order');
		return view('backend.section.create', compact('section', 'types', 'sections'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		Section::create($request->all());
		flash()->success('Bien!', 'La Seccion se creo correctamente');
		return redirect('/backend/section');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		//
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
	public function destroy(Section $section) {
		flash()->success('Listo!', 'La Seccion se elimino correctamente.');
		$section->delete();
		return redirect('/backend/section');
	}
}
