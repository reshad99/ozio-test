<?php

namespace App\Helpers;


class Select2
{
    public static function getData($query, $outputColumn): string
    {


        $query->getCollection()->transform(function ($item) use ($outputColumn) {
            return [
                'id' => $item->id,
                'text' => $item->{$outputColumn}
            ];
        });

        // dd($resultUsers);

        // $resultUsers[0]=['id'=>-1,'text'=>'Select all'];

        return json_encode([
            'results' => $query->items(),
            'pagination' => [
                'more' => $query->hasMorePages()
            ]
        ]);
    }
}
