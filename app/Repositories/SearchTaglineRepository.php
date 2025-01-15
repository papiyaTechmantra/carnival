<?php

namespace App\Repositories;

use App\Models\SearchTagline;
use App\Interfaces\SearchTaglineRepositoryInterface;


class SearchTaglineRepository implements SearchTaglineRepositoryInterface
{
    public function getAll()
    {
        return SearchTagline::all();
    }

    public function findById($id)
    {
        return SearchTagline::findOrFail($id);
    }

    public function create(array $data)
    {
        $searchTaglineData = [
            'title' => $data['title'],
        ];
        return SearchTagline::create($searchTaglineData);
    }


    public function update($id, array $data)
    {
        $searchTagline = SearchTagline::findOrFail($id);
        $updateData = [
            'title' => $data['title'],
        ];

        $searchTagline->update($updateData);

        return $searchTagline;
    }




    public function delete($id)
    {
        $searchTagline = SearchTagline::findOrFail($id);
        $searchTagline->delete();
        return true;
    }
}
