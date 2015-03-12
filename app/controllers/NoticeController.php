<?php

class NoticeController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /notice
	 *
	 * @return Response
	 */
	public function index()
	{
		//return Notice::with('user')->get();
		return View::make('notices.index')
					->with('notices',Notice::with('user')->get())
					->with('title',"Notices");
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /notice/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('notices.create')
					->with('title','Create Notice');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /notice
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = [
			'title' => 'required',
			'description' => 'required'
		];

		$data = Input::all();

		$validator = Validator::make($data,$rules);

		if($validator->fails()){
			return Redirect::back()->withInput()->withErrors($validator);
		}

		$notice = new Notice;

		$notice->title = $data['title'];
		$notice->description = $data['description'];
		$notice->user_id = Auth::user()->id;

		if($notice->save()){
			return Redirect::route('notice.index')->with('success',"Notice Created Successfully");
		}else{
			return Redirect::route('notice.index')->with('error',"Something went wrong.Try again");
		}


	}

	/**
	 * Display the specified resource.
	 * GET /notice/{id}
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
	 * GET /notice/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return View::make('notices.edit')
					->with('notice',Notice::find($id))
					->with('title','Edit Notice');
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /notice/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$rules = [
					'title' => 'required',
					'description' => 'required'
		];

		$data = Input::all();

		$validator = Validator::make($data,$rules);

		if($validator->fails()){
			return Redirect::back()->withInput()->withErrors($validator);
		}

		$notice = Notice::find($id);
		$notice->title = $data['title'];
		$notice->description = $data['description'];
		$notice->user_id = Auth::user()->id;

		if($notice->save()){
			return Redirect::route('notice.index')->with('success',"Notice Updated Successfully");
		}else{
			return Redirect::route('notice.index')->with('error',"Something went wrong.Try again");
		}
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /notice/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		if(Notice::destroy($id)){
			return Redirect::route('notice.index')->with('success',"Notice deleted Successfully.");
		}else{
			return Redirect::route('notice.index')->with('error',"Something went wrong.Try again");
		}
	}

}