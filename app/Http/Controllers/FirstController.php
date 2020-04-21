<?php

namespace App\Http\Controllers;

use App\Services\QueryServiceInterface;

class FirstController extends Controller
{

    /**
     * @var \App\Services\QueryServiceInterface
     */
    protected $queryService;

    /**
     * FirstController constructor.
     *
     * @param  \App\Services\QueryServiceInterface  $queryService
     */
    public function __construct(QueryServiceInterface $queryService)
    {
        $this->queryService = $queryService;
    }

    public function index()
    {
        $dumps1 = $this->queryService->getUserWithHighPriceBids();
        $dumps2 = $this->queryService->getEventsWithoutBids();
        $dumps3 = $this->queryService->getEventsWithBidsMoreThanThree();
        $dumps4 = $this->queryService->getEventsWithBidsMoreAmount();

        return view('task1', compact('dumps1', 'dumps2', 'dumps3', 'dumps4'));
    }

}
