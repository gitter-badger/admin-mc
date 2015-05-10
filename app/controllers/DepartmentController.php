<?php

class DepartmentController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /department
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('departments.index')
					->with('departments',Department::all())
					->with('title',"Departments");
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /department/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('departments.create')
					->with('title','Create Department');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /department
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = [
					'name'           => 'required'

		];

		$data = Input::all();

		$validator = Validator::make($data,$rules);

		if($validator->fails()){
			return Redirect::back()->withInput()->withErrors($validator);
		}

		$department = new Department();
		$department->name = $data['name'];
		$department->key = Helpers::createDepartmentKey($data['name']);

		if($department->save()){
			return Redirect::route('department.index')->with('success',"Department Created Successfully");
		}else{
			return Redirect::route('department.index')->with('error',"Something went wrong.Try again");
		}
	}

	/**
	 * Display the specified resource.
	 * GET /department/{id}
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
	 * GET /department/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		try{
			$department = Department::findOrFail($id);
			return View::make('departments.edit')
						->with('department',$department)
						->with('title','Edit Department');
		}catch(Exception $ex){
			return Redirect::route('department.index')->with('error','Something went wrong.Try Again.');
		}
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /department/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$data = Input::all();

		$validator = Validator::make($data,Department::rules($id));

		if($validator->fails()){
			return Redirect::back()->withInput()->withErrors($validator);
		}

		$department = Department::find($id);

		$department->name = $data['name'];
		$department->key = Helpers::createDepartmentKey($data['name']);

		if($department->save()){
			return Redirect::route('department.index')->with('success',"Department Created Successfully");
		}else{
			return Redirect::route('department.index')->with('error',"Something went wrong.Try again");
		}
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /department/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}