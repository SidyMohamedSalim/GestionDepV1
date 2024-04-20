<?php


namespace App\utils;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;

class DataGenerator
{

    public static function paginateData(Collection $data, int $perPage)
    {
        $currentPage = Paginator::resolveCurrentPage();
        if (empty($perPage || $perPage <= 0)) {
            $perPage = 1;
        }
        $total = $data->count();
        $results = $data->slice(($currentPage - 1) * $perPage, $perPage);
        return new LengthAwarePaginator($results, $total, $perPage, $currentPage);
    }
}
