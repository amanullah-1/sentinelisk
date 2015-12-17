<?php

namespace Sentinel\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Sentinel\Repositories\User\SentinelUserRepositoryInterface;
use Sentinel\Traits\SentinelRedirectionTrait;
use Sentinel\Traits\SentinelViewfinderTrait;

class TetapanController extends BaseController
{
	/**
     * Traits
     */
    use SentinelRedirectionTrait;
    use SentinelViewfinderTrait;

	/**
     * Constructor
     */
    public function __construct(SentinelUserRepositoryInterface $userRepository) 
    {
        // DI Member assignment
        $this->userRepository  = $userRepository;

        // You must have an active session to proceed
        $this->middleware('sentry.auth');
    }

    public function akaun()
    {
    	// Grab the current user
        $user = $this->userRepository->getUser();

        return $this->viewFinder('Sentinel::tetapan.akaun', [
            'user' => $user
        ]);
    }
}
