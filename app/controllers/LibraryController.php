<?php

class LibraryController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /library
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('libraries.index')
					->with('libraries',Library::all())
					->with('title',"Libraries");
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /library/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('libraries.create')
					->with('title','Create Library');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /library
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = [
					'description'           => 'required'

		];

		$data = Input::all();

		$validator = Validator::make($data,$rules);

		if($validator->fails()){
			return Redirect::back()->withInput()->withErrors($validator);
		}

		$library = new Library();
		$library->description = $data['description'];

		if($library->save()){
			return Redirect::route('library.index')->with('success',"Library Created Successfully");
		}else{
			return Redirect::route('library.index')->with('error',"Something went wrong.Try again");
		}
	}

	/**
	 * Display the specified resource.
	 * GET /library/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /library/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		try{
			$library = Library::findOrFail($id);
			return View::make('libraries.edit')
						->with('library',$library)
						->with('title','Edit Library');
		}catch(Exception $ex){
			return Redirect::route('library.index')->with('error','Something went wrong.Try Again.');
		}
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /library/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$rules = [
					'description'           => 'required'

		];

		$data = Input::all();

		$validator = Validator::make($data,$rules);

		if($validator->fails()){
			return Redirect::back()->withInput()->withErrors($validator);
		}

		$library = Library::find($id);

		$library->description = $data['description'];

		if($library->save()){
			return Redirect::route('library.index')->with('success',"Library Updated Successfully");
		}else{
			return Redirect::route('library.index')->with('error',"Something went wrong.Try again");
		}
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /library/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}