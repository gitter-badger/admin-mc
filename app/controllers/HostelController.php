<?php

class HostelController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /hostel
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('hostels.index')
					->with('hostels',Hostel::all())
					->with('title',"Hostels");
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /hostel/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('hostels.create')
					->with('title','Create Hostels');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /hostel
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

		$hostel = new Hostel();
		$hostel->description = $data['description'];

		if($hostel->save()){
			return Redirect::route('hostel.index')->with('success',"Hostel Created Successfully");
		}else{
			return Redirect::route('hostel.index')->with('error',"Something went wrong.Try again");
		}
	}

	/**
	 * Display the specified resource.
	 * GET /hostel/{id}
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
	 * GET /hostel/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		try{
			$hostel = Hostel::findOrFail($id);
			return View::make('hostels.edit')
						->with('hostel',$hostel)
						->with('title','Edit Hostel');
		}catch(Exception $ex){
			return Redirect::route('hostel.index')->with('error','Something went wrong.Try Again.');
		}
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /hostel/{id}
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

		$hostel = Hostel::find($id);

		$hostel->description = $data['description'];

		if($hostel->save()){
			return Redirect::route('hostel.index')->with('success',"Hostel Updated Successfully");
		}else{
			return Redirect::route('hostel.index')->with('error',"Something went wrong.Try again");
		}
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /hostel/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}