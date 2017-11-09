<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('preview'))
{
	function preview($content, $limit)
	{
		$CI =& get_instance();

        if(strlen($content) < $limit)
        {
            return $content;
        }

        $last_word_pos = strrpos(substr($content, 0, $limit), ' ');

        $truncated_content = substr($content, 0, $last_word_pos);

        $preview = close_tags($truncated_content . ' ...');

        return $preview;
	}
}

if ( ! function_exists('tag_color'))
{
    function tag_color($tag)
    {
        $colors = array('#02baf2', '#f84545', '#f3bc65', '#a88cd5', '#3eb5ac', '#f58410');
        $seed = 0;

        $characters = str_split($tag);
        foreach ($characters as $char) {
            $seed += ord($char);
        }
        mt_srand($seed);
        $index = mt_rand(0, count($colors) - 1);
        return $colors[$index];
    }
}

