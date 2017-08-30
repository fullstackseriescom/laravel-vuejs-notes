<?php
// https://mattstauffer.co/blog/getting-started-using-vues-vue-router-for-single-page-apps
Route::get('/{vue_capture?}', function () {
	return view('home');
})->where('vue_capture', '[\/\w\.-]*');
