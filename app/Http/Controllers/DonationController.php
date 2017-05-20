<?php

namespace App\Http\Controllers;

use App\Donation;
use App\Project;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class DonationController extends Controller
{

    public function getDonations()
    {
        $donations = Donation::where('project_id', '=', '1')->paginate(3);
        return \Response::json(view('project.donations')->with('donations', $donations)->render());
    }


    public function store(Request $request)
    {

        $request = Donation::anonimCheck($request);

        $id = Project::getClearId($request->input('id_p'));
        $project = Project::find($id);

        $project->donations()->save(new Donation($request->all()));
        return \Response::json(['suc' => 'success']);
    }
}
