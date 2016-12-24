<?php namespace App\Http\Controllers;

use App\Jobs\GetJobListingsByProvider;
use App\Jobs\GetProviders;
use App\Jobs\GetUsers;
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

        if ($results = $this->dispatchNow(
            new GetJobListingsByProvider($provider, $options)
        )) {
            return response()->json($results);
        }
        return response('No entries found', 404);
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
