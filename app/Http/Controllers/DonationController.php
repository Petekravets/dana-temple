<?php

namespace App\Http\Controllers;

use App\Donation;
use App\Project;
use Illuminate\Http\Request;

class DonationController extends Controller
{


    public function store(Request $request)
    {


        $project = Project::find($request->input('id_p'));
        $donation = new Donation($request->all());
        $response = [
            'suc' => $project,
            'idd' => $donation
        ];
        $project->donations()->save($donation);
        return \Response::json(['suc' => 'success']);
    }
}
