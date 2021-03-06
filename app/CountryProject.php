<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CountryProject extends AbstractModel {
    /**
     * primaryKey
     *
     * @var integer
     * @access protected
     */
    protected $primaryKey = null;

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * Disable timestamp fields
     * @var bool
     */
    public $timestamps = false;
}
