<?php

namespace Navicula\Http\Controllers\Api;

use Illuminate\Http\Request;

use Navicula\Http\Requests;
use Navicula\Http\Controllers\Controller;
use Navicula\Models\Box;
use Navicula\Models\Boat;
use Carbon\Carbon;	

class BoxController extends Controller
{
	/**
	 * A hacky way to get all available boxes for a boat between the given dates. Not proud of this one :(
	 * 
	 * @param Boat $boat
	 * @param string $start
	 * @param string $end
	 * @return array
	 */
    public function getAvailableBoxes(Boat $boat, $start = null, $end = null)
    {
    	$boxes = Box::orderBy('scaffold_id')->get();
    	$start = new Carbon($start);
    	$end = new Carbon($end);
    	$availableBoxes = [];

    	foreach ($boxes as $box) {
			if ($box->isAvailableBetween($start, $end)) {
    			$box->code = $box->getFullCode();
    			array_push($availableBoxes, $box);
    		}
    	}

    	return $availableBoxes;
    }
}
