<?php

class AllEvent extends \Eloquent {
	protected $table = 'events';

	protected $guarded = ['id'];
	//protected $with = ['user'];
	public function user(){
		return $this->belongsTo('User','user_id','id');
	}
}