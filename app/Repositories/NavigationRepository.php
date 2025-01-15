<?php

namespace App\Repositories;

use App\Models\Navigation;
use App\Interfaces\NavigationRepositoryInterface;


class NavigationRepository implements NavigationRepositoryInterface
{
    public function getAll()
    {
        return Navigation::all();
    }

    public function findById($id)
    {
        return Navigation::findOrFail($id);
    }

    public function create(array $data)
    {
        $navigationData = [
            'title' => $data['title'],
        ];
        return Navigation::create($navigationData);
    }


    public function update($id, array $data)
    {
        $navigation = Navigation::findOrFail($id);
        $updateData = [
            'title' => $data['title'],
        ];

        $navigation->update($updateData);

        return $navigation;
    }




    public function delete($id)
    {
        $navigation = Navigation::findOrFail($id);
        $navigation->delete();
        return true;
    }
}
