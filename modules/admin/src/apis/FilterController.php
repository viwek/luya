<?php

namespace luya\admin\apis;

use luya\admin\ngrest\base\Api;

/**
 * Filters API, provides all available system filters.
 *
 * @author Basil Suter <basil@nadar.io>
 */
class FilterController extends Api
{
	/**
	 * @var string The path to the StorageFilter model.
	 */
    public $modelClass = 'luya\admin\models\StorageFilter';
}
