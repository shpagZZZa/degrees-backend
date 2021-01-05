<?php

namespace App\Http\Controllers;

use App\Http\Resources\GroupExtended as GroupExtendedResource;
use App\Models\Group;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GroupController extends Controller
{
    public function listAction(): Response
    {
        return response(Group::all()->toJson(), Response::HTTP_OK);
    }

    public function getAction(int $id): Response
    {
        $group = Group::find($id);
        return \response(new GroupExtendedResource($group), 200);
    }
}
