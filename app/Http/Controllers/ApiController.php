<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class ApiController extends BaseController
{
    /**
     * Gets jobs from one or all providers
     *
     * @param Request $provider
     * @param null $provider
     */
    public function jobs(Request $request, $provider = null)
    {
        dd($request->all());
    }

    /**
     * Gets all providers the current user has permission to view
     *
     * @param Request $provider
     */
    public function providers(Request $request)
    {
        dd($request->all());
    }

    /**
     * Gets all users the current user has permission to view
     *
     * @param Request $provider
     */
    public function users(Request $request)
    {
        dd($request->all());
    }
}
