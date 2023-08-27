<?php

namespace App\Services;

use App\Models\Lot;


class GetLotsService
{
    public function getLots($request)
    {
        $lots = Lot::query()
            // show lots by category Id
            ->when($request->has('categories'), function ($query) use ($request) {
                $category = $request->input('categories');
                // show lots without categories
                if (in_array('other', $category)) {
                    $query->doesntHave('categories');
                } else {
                    $query->whereHas('categories', function($query) use ($category) {

                        $query->whereIn('category_id', $category);
                
                    });
                }
            })
            // order by created Time
            ->when($request->has('order'), function ($query) use ($request) {
                $order = $request->input('order');
                $order_values = ['desc', 'asc'];
                if (in_array($order, $order_values)) {
                    $query->orderBy('created_at', $order);
                }
            })
            ->paginate(20);

        return $lots;
    }
}
