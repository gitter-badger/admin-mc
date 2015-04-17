<?php

class ContactController extends \BaseController {


	public function edit()
	{
		$contact = Contact::find(1);
        return View::make('contact.index')
            ->with('contact',$contact)
            ->with('title','Edit Contact Us Page');

	}

	/**
	 * Update the specified resource in storage.
	 * PUT /contact/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

}