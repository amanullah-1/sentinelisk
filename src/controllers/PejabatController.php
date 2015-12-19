<?php

namespace Sentinel\Controllers;

use Illuminate\Http\Request;
use Sentinel\Models\Pejabat;
use Illuminate\Routing\Controller as BaseController;
use Sentinel\Traits\SentinelViewfinderTrait;
use Sentinel\Traits\SentinelRedirectionTrait;

class PejabatController extends BaseController
{
    use SentinelRedirectionTrait;
    use SentinelViewfinderTrait;

    /**
     * Constructor
     */
    public function __construct() 
    {

        // You must have an active session to proceed
        $this->middleware('sentry.auth');
    }

    public function index()
    {
        // Grab the current user
        $pejabats = Pejabat::paginate(10);

        return $this->viewFinder('Sentinel::pejabat.index', ['pejabats' => $pejabats]);
    }

    public function create()
    {
        return $this->viewFinder('Sentinel::pejabat.create');
    }

    public function store(Request $request)
    {
        // Create and store the new user
        Pejabat::create($request->all());

        // Determine response message based on whether or not the user was activated
        $message = 'Pejabat telah disimpan';

        // Finished!
        return $this->redirectTo('pejabat_store', ['success' => $message]);
    }

    public function edit($id)
    {
        $pejabat = Pejabat::findOrFail($id);

        return $this->viewFinder('Sentinel::pejabat.edit', ['pejabat' => $pejabat]);  
    }

    public function update(Request $request, $id)
    {
        $pejabat = Pejabat::findOrFail($id);

        $input = $request->all();

        $pejabat->fill($input)->save();

        $message = 'Pejabat telah dikemaskini';

        return $this->redirectTo('pejabat_store', ['success' => $message]);
    }

    public function destroy($id)
    {
        $pejabat = Pejabat::findOrFail($id);

        $pejabat->delete();

        $message = 'Pejabat telah dipadam';

        return $this->redirectTo('pejabat_store', ['success' => $message]);
    }
}
