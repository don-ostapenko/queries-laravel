<?php

namespace App\Services;

interface QueryServiceInterface
{

    /**
     * @return array
     */
    public function getUserWithHighPriceBids(): array;

    /**
     * @return array
     */
    public function getEventsWithoutBids(): array;

    /**
     * @return array
     */
    public function getEventsWithBidsMoreThanThree(): array;

    /**
     * @return array
     */
    public function getEventsWithBidsMoreAmount(): array;

}
