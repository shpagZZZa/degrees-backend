<?php

namespace App\Http\Controllers;

use App\Http\Resources\Position as PositionResource;
use App\Http\Resources\PositionCollection;
use App\Models\Position;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PositionController extends Controller
{
    public function storeAction(Request $request): Response
    {
        $data = $request->request->all();

        $position = new Position();

        $position
            ->setTitle($data['title'])
            ->setCompanyId($data['companyId'])
        ;

        $position->save();

        return \response(new PositionResource($position), 200);
    }

    public function listAction(): Response
    {
        return \response(new PositionCollection(Position::all()), 200);
    }
}
