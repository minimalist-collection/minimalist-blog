<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('paginate'))
{
	function paginate(&$results)
	{
		$CI =& get_instance();
        $info = array('total' => count($results), 'limit' => PER_PAGE);
        $page = $CI->input->get('page');
        $offset = ($page - 1) * PER_PAGE;
        $length = PER_PAGE;
        $pages = ceil(count($results) / $length);
        if($page)
        {
            $results = array_slice($results, $offset, $length);
        }
        $results = array_slice($results, 0, $length);

        return $info;
	}
}

