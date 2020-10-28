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
        
        $int = request('NumberOfGroups');
        $group = intval($int);
        $minimumMembersGroup = request('MinimumNumber');
        $maximumMembersGroup = request('MaximumNumber');
        $total = Null;
        $handicaps = []; // gesorteerd van hoog naar laag;




        foreach($array as $player) 
        {
            // berekenen van de totale handicap van alle geselecteerde spelers samen. 
            // vinden van de spelers in de database en dit stoppen in een array players.
            $players[] = Player::where('id', $player)->get();
            $handicap = Player::where('id', $player)->firstOrFail('handicap')->handicap;
            $handi = Player::where('id', $player)->firstOrFail('handicap')->handicap;
            array_push($handicaps, $handi);

            $total = $total + $handicap; 
        }

        $avaragehandicap = $total / $group;

        arsort($handicaps);
        $numbers[] = intval($handicaps); // proberen handicap string in een nummber te converteren zodat ik groepen kan vormen

        $flights = [];
        $rest = [];
        $flightsum = Null;
        // groepen vormen
        foreach($handicaps as $handicap)
        {

            foreach($flights as $flight) {
                $flightsum += $flight;  

            }
            dd($flightsum);

            if ($handicap + $flightsum < $avaragehandicap) 
                {
                    array_push($flights, $handicap);

                } else {
                    $rest[] = $handicap;
                }


        }
   
        dd($total, $group, $avaragehandicap, $handicaps, $flights, $numbers, $rest);

    //    foreach($array as $player)
    //     {
    //         $handicap = Player::where('id', $player)->firstOrFail('handicap')->handicap;
    //         if ($handicap < $avaragehandicap) {
    //             dd($handicap);
    //             $group .=  $handicap;
    //             dd($group);

    //         }
    //     }



    


        return redirect()->back();
    }



}
