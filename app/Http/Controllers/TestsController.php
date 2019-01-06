<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class TestsController extends Controller
{
    public function index()
    {
        Cache::flush();
        //$users = ['User1', 'User2'];
        //$testCache = Cache::get('test_key');
        //dump($testCache);
        //Cache::forget('test_key');
        //$testCache = Cache::get('test_key');
//
        //dump($testCache);

        //Cache::forever('test_key', 'cached forever');
        //$testCache = Cache::get('test_key');
        //dd($testCache);
//
//
        //if (Cache::has('test_key')) {
        //    $testCache = Cache::get('test_key');
        //    dump($testCache);
        //} else {
        //    dump('we don\'t have it');
        //}
        //$value = Cache::get('key', 'default');
        //dd($value);
    }
}
