<?php

/**
 * Convert date fr (d/m/Y) to sql (Y-m-d)
 * @param $date string
 * @return string date sql
 */
if( ! function_exists('saveImage') )
{
    /**
     * Save image and return picture name
     * @param $request
     * @return string
     */
    function saveImage($request)
    {
        $ext = $request->image->extension();
        $picture_name = $request->name.'-'.uniqid().'.'.$ext;
        $request->file('image')->move('images/', $picture_name);

        return $picture_name;
    }
}

