<?php

namespace App\Http\Controllers;

use App\Donation;
use App\Project;
use Illuminate\Http\Request;

class DonationController extends Controller
{


    public function store(Request $request)
    {

        $request = Donation::anonimCheck($request);

        $id = Project::getClearId($request->input('id_p'));
        $project = Project::find($id);

        $project->donations()->save(new Donation($request->all()));
        return \Response::json(['suc' => 'success']);
    }
}
