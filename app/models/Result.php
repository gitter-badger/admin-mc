<?php

class Result extends \Eloquent {
	protected $fillable = [];
    protected $table = 'results';
    public function user(){
        return $this->belongsTo('User','user_id','id');
    }
}