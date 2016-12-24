<?php namespace JobApis\JobsHub\Http\Controllers;

use JobApis\JobsHub\Jobs\GetJobListingsByProvider;
use JobApis\JobsHub\Jobs\GetProviders;
use JobApis\JobsHub\Jobs\GetUsers;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class ApiController extends BaseController
{
    use DispatchesJobs;

    /**
     * Gets all providers the current user has permission to view
     *
     * @param Request $provider
     */
    public function providers(Request $request)
    {
        if ($results = $this->dispatchNow(
            new GetProviders($request->get('user_id'))
        )) {
            return response()->json($results);
        }

        return response('No entries found', 404);
    }

    /**
     * Gets jobs from a provider
     *
     * @param Request $request
     * @param null $provider
     */
    public function providerJobs(Request $request, $provider = null)
    {
        $options = $request->only([
            'keyword',
            'location',
            'page',
            'per_page',
            'user_id',
        ]);

        return $this->dispatchNow(
            new GetJobListingsByProvider($provider, $options)
        );
    }

    /**
     * Gets all users the current user has permission to view
     *
     * @param Request $provider
     */
    public function users(Request $request)
    {
        if ($results = $this->dispatchNow(
            new GetUsers($request->get('user_id'))
        )) {
            return response()->json($results);
        }

        return response('No entries found', 404);
    }
}
