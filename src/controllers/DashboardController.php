<?php

namespace Sentinel\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Sentinel\Repositories\Group\SentinelGroupRepositoryInterface;
use Sentinel\Repositories\User\SentinelUserRepositoryInterface;
use Sentinel\Traits\SentinelViewfinderTrait;

class DashboardController extends BaseController
{

    use SentinelViewfinderTrait;

    /**
     * Constructor
     */
    public function __construct(SentinelUserRepositoryInterface $userRepository, SentinelGroupRepositoryInterface $groupRepository) 
    {
        // DI Member assignment
        $this->userRepository  = $userRepository;
        $this->groupRepository = $groupRepository;

        // You must have an active session to proceed
        $this->middleware('sentry.auth');
    }

    public function show()
    {
        // Grab the current user
        $user = $this->userRepository->getUser();

        if (is_null($user->nama)) {

            // Get all available groups
            $groups = $this->groupRepository->all();

            return $this->viewFinder('Sentinel::users.edit', [
                'user' => $user,
                'groups' => $groups
            ]);
        }

        return $this->viewFinder('Sentinel::dashboard.show', ['user' => $user]);
    }
}