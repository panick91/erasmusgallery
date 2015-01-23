<?php
/**
 * Created by PhpStorm.
 * User: Patrick
 * Date: 08.01.2015
 * Time: 23:28
 */

class Image extends Eloquent{

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = array('id', 'name');
}