<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class QueryService implements QueryServiceInterface
{

    /**
     * {@inheritDoc}
     */
    public function getUserWithHighPriceBids(): array
    {
        return DB::table('bids')
            ->select(DB::raw('name, price'))
            ->orderByDesc('price')
            ->limit('1')
            ->get()
            ->all();
    }

    /**
     * {@inheritDoc}
     */
    public function getEventsWithoutBids(): array
    {
        return DB::table('events')
            ->select('events.caption')
            ->leftJoin('bids', 'events.id', '=', 'bids.event_id')
            ->where('bids.event_id', '=', null)
            ->get()
            ->all();
    }

    /**
     * {@inheritDoc}
     */
    public function getEventsWithBidsMoreThanThree(): array
    {
        return DB::table('events')
            ->select(DB::raw('events.caption, count(bids.event_id) as count'))
            ->join('bids', 'events.id', '=', 'bids.event_id')
            ->groupBy('bids.event_id')
            ->having('count', '>', '3')
            ->orderByDesc('count')
            ->get()
            ->all();
    }

    /**
     * {@inheritDoc}
     */
    public function getEventsWithBidsMoreAmount(): array
    {
        return DB::table('events')
            ->select(DB::raw('events.caption, count(bids.event_id) as count'))
            ->join('bids', 'events.id', '=', 'bids.event_id')
            ->groupBy('bids.event_id')
            ->limit(1)
            ->get()
            ->all();
    }

}
