<?php

class Result extends \Eloquent {
	protected $guarded = ['id'];
	protected $table = 'results';


    public function user(){
        return $this->belongsTo('User','user_id','id');
    }
}