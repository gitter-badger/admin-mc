<?php

class Event extends \Eloquent {
	protected $guarded = [];
	public function user(){
		return $this->belongsTo('User','user_id','id');
	}
}