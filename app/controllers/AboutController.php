<?php

class AboutController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /research
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('abouts.index')
					->with('abouts',About::all())
					->with('title',"Abouts");
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /research/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('abouts.create')
					->with('title','Create About US');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /research
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

		$about = new About();
		$about->description = $data['description'];

		if($about->save()){
			return Redirect::route('about.index')->with('success',"About Us Created Successfully");
		}else{
			return Redirect::route('about.index')->with('error',"Something went wrong.Try again");
		}
	}

	/**
	 * Display the specified resource.
	 * GET /research/{id}
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
	 * GET /research/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		try{
			$about = Research::findOrFail($id);
			return View::make('abouts.edit')
						->with('about',$about)
						->with('title','Edit About US');
		}catch(Exception $ex){
			return Redirect::route('about.index')->with('error','Something went wrong.Try Again.');
		}
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /research/{id}
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

		$about = About::find($id);

		$about->description = $data['description'];

		if($about->save()){
			return Redirect::route('about.index')->with('success',"About Us Updated Successfully");
		}else{
			return Redirect::route('about.index')->with('error',"Something went wrong.Try again");
		}
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /research/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}