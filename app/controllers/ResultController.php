<?php

class ResultController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /result
	 *
	 * @return Response
	 */
	public function index()
	{
		//
        $results = Result::all();
        return View::make('results.index')
            ->with('results',$results)
            ->with('title',"Results");
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /result/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
        return View::make('results.create')
            ->with('title','Publish Result');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /result
	 *
	 * @return Response
	 */
	public function store()
	{
		//
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
	 * GET /result/{id}
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
	 * GET /result/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /result/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /result/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}