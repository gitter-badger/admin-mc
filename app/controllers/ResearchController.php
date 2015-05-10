<?php

class ResearchController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /research
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('researches.index')
					->with('researches',Research::all())
					->with('title',"Researches");
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /research/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('researches.create')
					->with('title','Create Research');
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

		$research = new Research();
		$research->description = $data['description'];

		if($research->save()){
			return Redirect::route('research.index')->with('success',"Research Created Successfully");
		}else{
			return Redirect::route('research.index')->with('error',"Something went wrong.Try again");
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
			$research = Research::findOrFail($id);
			return View::make('researches.edit')
						->with('research',$research)
						->with('title','Edit Research');
		}catch(Exception $ex){
			return Redirect::route('research.index')->with('error','Something went wrong.Try Again.');
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

		$research = Research::find($id);

		$research->description = $data['description'];

		if($research->save()){
			return Redirect::route('research.index')->with('success',"Research Created Successfully");
		}else{
			return Redirect::route('research.index')->with('error',"Something went wrong.Try again");
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