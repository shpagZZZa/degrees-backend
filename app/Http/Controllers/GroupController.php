<?php

namespace App\Http\Controllers;

use App\Http\Resources\Group as GroupResource;
use App\Http\Resources\GroupCollection;
use App\Http\Resources\GroupExtended as GroupExtendedResource;
use App\Models\Employee;
use App\Models\Group;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GroupController extends Controller
{
    public function listAction(): Response
    {
        return response(new GroupCollection(Group::all()), Response::HTTP_OK);
    }

    public function storeAction(Request $request): Response
    {
        $data = $request->request->all();

        $group = new Group();

        $group
            ->setTitle($data['title'])
            ->setCompanyId($data['companyId'])
        ;

        $group->save();

        return \response(new GroupResource($group), 200);
    }

    public function setHeadAction(int $id, Request $request): Response
    {
        /** @var Group $group */
        $group = Group::find($id);
        $group->head_id = $request->request->get('headId');
        $group->save();
        return \response(new GroupExtendedResource($group), 200);
//        return \response($group->headEmployee, 200);
    }

    public function getAction(int $id): Response
    {
        $group = Group::find($id);
        return \response(new GroupExtendedResource($group), 200);
    }
}
