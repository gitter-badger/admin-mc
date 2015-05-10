<?php

class EventController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /event
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('events.index')
					->with('events',AllEvent::all())
					->with('title',"Events");
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /event/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('events.create')
					->with('title','Create Event');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /event
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = [
					'title' => 'required',
					'place' => 'required',
					'description' => 'required'
		];

		$data = Input::all();

		$validator = Validator::make($data,$rules);

		if($validator->fails()){
			return Redirect::back()->withInput()->withErrors($validator);
		}

		$event = new AllEvent();

		$event->title = $data['title'];
		$event->description = $data['description'];
		$event->place = $data['place'];
		$event->user_id = Auth::user()->id;

		if($event->save()){
			return Redirect::route('event.index')->with('success',"Event Created Successfully");
		}else{
			return Redirect::route('event.index')->with('error',"Something went wrong.Try again");
		}
	}

	/**
	 * Display the specified resource.
	 * GET /event/{id}
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
	 * GET /event/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		try{
			$event = AllEvent::findOrFail($id);
			return View::make('events.edit')
						->with('event',$event)
						->with('title','Edit Event');
		}catch(Exception $ex){
			return Redirect::route('event.index')->with('error','Something went wrong.Try Again.');
		}
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /event/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$rules = [
					'title' => 'required',
					'place' => 'required',
					'description' => 'required'
		];

		$data = Input::all();

		$validator = Validator::make($data,$rules);

		if($validator->fails()){
			return Redirect::back()->withInput()->withErrors($validator);
		}

		$event = AllEvent::find($id);

		$event->title = $data['title'];
		$event->description = $data['description'];
		$event->place = $data['place'];
		$event->user_id = Auth::user()->id;

		if($event->save()){
			return Redirect::route('event.index')->with('success',"Event Updated Successfully");
		}else{
			return Redirect::route('event.index')->with('error',"Something went wrong.Try again");
		}
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /event/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}