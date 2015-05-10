<?php

class Department extends \Eloquent {
	protected $guarded = ['id'];
	protected $table = 'departments';
	public static function rules($id = 0, $merge = [])
	{
		return array_merge(
					[
								'name' => 'required|unique:departments'. ($id ? ",id,$id" : '')
					],
					$merge);
	}
}