<?php

namespace App\Http\Controllers;

use App\Image;
use App\Photo;
use App\Section;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Validator;

class PhotosController extends Controller {

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
		$photos = Photo::all()->sortBy('order');
		return view('backend.photo.index', compact('photos'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		$sections = Section::all();
		return view('backend.photo.create', compact('sections'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function createBySection(Section $section) {
		return view('backend.photo.create', compact('section'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		Photo::create($request->all());
		flash()->success('Bien!', 'La Galeria se creo correctamente');
		return redirect('/backend/photo');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show(Photo $photo) {
		return view('backend.photo.show', compact('photo'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Photo $photo) {
		$sections = Section::all();
		return view('backend.photo.edit', compact('photo', 'sections'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Photo $photo) {
		$photo->update($request->all());
		$sections = Section::all();
		flash()->success('Listo!', 'La Galeria se modifico correctamente.');
		return redirect('backend/photo/'.$photo->id);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Photo $photo) {
		flash()->success('Listo!', 'La Galeria se elimino correctamente.');
		$photo->delete();
		return redirect('/backend/photo');
	}

	public function addImage(Photo $photo, Request $request) {
		$file = $request->file('file');
		$name = $photo->id.'-'.time().'.'.$file->getClientOriginalExtension();

		$path = 'images/photos';
		Storage::disk($path)->put($name, File::get($file));

		//Instancio la nueva imágen y la guardo a través de la relación
		$image = new Image([
				'path'   => $name,
				'active' => 1,
				'order'  => 1
			]);

		$photo->images()->save($image);

		return redirect('/backend/photo/'.$photo->id);
	}

	public function getImage($name) {
		$image = Storage::disk('images/photos')->get($name);
		return new Response($image, 200);
	}

	public function destroyImage(Image $image) {
		$id = $image->photo_id;
		flash()->success('Listo!', 'La Foto se elimino correctamente.');
		$image->delete();
		return redirect('/backend/photo/'.$id);
	}
}
