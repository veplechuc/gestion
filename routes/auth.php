<?php
/**
 * Created by PhpStorm.
 * User: vplechuc
 * Date: 05/01/2017
 * Time: 11:31 PM
 */


/**
 * Define routes taht requires authentication
 *
 */
//Ctegories routes
Route::get('categories/create',[
    'uses' => 'Category\CreateCategoryController@create',
    'as'    => 'categories.create',
]);

Route::post('categories/create',[
    'uses' => 'Category\CreateCategoryController@store',
    'as'    => 'categories.store',
]);