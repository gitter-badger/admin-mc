<?php

class PageController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /page
	 *
	 * @return Response
	 */
	public function index()
	{
		$pages = Page::paginate(10);
        return View::make('pages.index')
            ->with('pages',$pages);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /page/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('pages.add');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /page
	 *
	 * @return Response
	 */
	public function store()
	{
        $rules = array
        (
            'pageKey' 	=> 'required|unique:pages,key',
            'pageTitle' 	=> 'required|unique:pages,title'
        );
        $validation = Validator::make(Input::all(), $rules);
        if($validation->fails()){
            return Redirect::back()
                ->withInput()
                ->withErrors($validation);
        }
        else{
            $page = new Page();
            $page->key = Input::get('pageKey');
            $page->title = Input::get('pageTitle');
            $page->content = Input::get('content');
            if($page->save())
                return Redirect::route('pages')
                    ->with('success', "Page '$page->title' has been added successfully added");
            else
                return Redirect::back()
                    ->withInput()
                    ->with('error', 'Some error occured. Try again.');
        }
	}

	/**
	 * Display the specified resource.
	 * GET /page/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{

	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /page/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$page = Page::where('id','=',$id)->first();
        return View::make('pages.edit')
            ->with('page',$page);
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /page/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        $page = Page::where('id','=',$id)->first();
        if($page->key == Input::get('pageKey') && $page->title == Input::get('pageTitle')){
            $rules = array
            (
                'pageKey' 	=> 'required',
                'pageTitle' 	=> 'required'
            );
        }
        elseif($page->key == Input::get('pageKey')){
            $rules = array
            (
                'pageKey' 	=> 'required',
                'pageTitle' 	=> 'required|unique:pages,title'
            );
        }
        elseif($page->title == Input::get('pageTitle')){
            $rules = array
            (
                'pageKey' 	=> 'required|unique:pages,key',
                'pageTitle' 	=> 'required'
            );
        }
        else{
            $rules = array
            (
                'pageKey' 	=> 'required|unique:pages,key',
                'pageTitle' 	=> 'required|unique:pages,title'
            );
        }

        $validation = Validator::make(Input::all(), $rules);
        if($validation->fails()){
            return Redirect::back()
                ->withInput()
                ->withErrors($validation);
        }
        else{
            $page = Page::where('id','=',$id)->first();
            $page->key = Input::get('pageKey');
            $page->title = Input::get('pageTitle');
            $page->content = Input::get('content');
            if($page->save())
                return Redirect::route('pages')
                    ->with('success', "Page '$page->title' has been updated successfully");
            else
                return Redirect::back()
                    ->withInput()
                    ->with('error', 'Some error occured. Try again.');
        }

	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /page/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Page::destroy($id);

		return Redirect::route('pages');
	}

    public function manageOrder(){
        return View::make('pages.manageOrder');
    }

}