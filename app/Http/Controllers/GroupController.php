<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Player;
class GroupController extends Controller
{
    public function index()
    {
        // $players = Player::paginate(100);
        return view('dashboard.groups.index');
    }

    public function create()
    {
        $players = Player::paginate(100);
        return view('dashboard.groups.create', compact('players'));
    }

    public function store(Request $request)
    {
        $players = [];
        $array = [];
        $array = request('Player');
        $howManyGroups = request('NumberOfGroups');
        $minimumMembersGroup = request('MinimumNumber');
        $maximumMembersGroup = request('MaximumNumber');
        $totalhandicap;


        foreach($array as $player) {
            $players[] = Player::where('id', $player)->get();
        }



        dd($players);

        return redirect()->back();
    }



}
