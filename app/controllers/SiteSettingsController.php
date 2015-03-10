<?php

class SiteSettingsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /sitesettings
	 *
	 * @return Response
	 */
	public function index()
	{
        $siteSettings = SiteSetting::all();
        return View::make('settings.siteSettings')
            ->with('title','Site Settings')
            ->with('siteSettings',$siteSettings);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /sitesettings/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /sitesettings
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /sitesettings/{id}
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
	 * GET /sitesettings/{id}/edit
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
	 * @return Response
	 */
	public function update()
	{
        $rules = array
        (
            'sitename' 	=> 'required',
            'site_meta_key' 	=> 'required',
            'meta_description' 	=> 'required',
            'listing_per_page' 	=> 'required',
            'email_id' 	=> 'required',
            'website_online' 	=> 'required',
            'siteslogan' 	=> 'required',
            'sitesstart' 	=> 'required',
            'notice' 	=> 'required',
        );
        $validation = Validator::make(Input::all(), $rules);
        if($validation->fails()){
            return Redirect::back()
                ->withInput()
                ->withErrors($validation);
        }
        else{
            $data[0]=Input::get('sitename');
            $data[1]=Input::get('site_meta_key');
            $data[2]=Input::get('meta_description');
            $data[3]=Input::get('listing_per_page');
            $data[4]=Input::get('email_id');
            $data[5]=Input::get('website_online');
            $data[6]=Input::get('siteslogan');
            $data[7]=Input::get('sitesstart');
            $data[8]=Input::get('notice');

            $index[0]='SITE_NAME';
            $index[1]='SITE_META_KEYS';
            $index[2]='SITE_META_DESC';
            $index[3]='LISTING_PER_PAGE';
            $index[4]='SITE_EMAIL_ADDRESS';
            $index[5]='ONLINE';
            $index[6]='SLOGAN';
            $index[7]='SITE_START_YEAR';
            $index[8]='NOTICE';

            for($i=0;$i<9;$i++){
                $siteSettings = SiteSetting::where('key','=',$index[$i])->first();
                $siteSettings->value=$data[$i];
                $siteSettings->save();
                if($i==8){
                    return Redirect::route('settings')
                        ->with('success', "Site Settings has updated successfully.");
                }
            }
        }
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /sitesettings/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}