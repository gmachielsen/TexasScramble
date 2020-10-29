<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Player;

class Golfer {

    public function __construct(int $id, float $hcp)
    {
        $this->id = $id;
        $this->hcp = $hcp;

    }
    public $id;
    public $hcp;
}

class Flight {
    public $Golfers = [];

    public function addGolfer(Golfer $Golfer) {
        $this->Golfers[] = $Golfer;
    }

    public function isEmpty() {
        return count($this->Golfers) == 0;
    }

    public function getAvgHcp()
    {
        $sum_hcp = 0;

        foreach($this->Golfers as $Golfer) {
            $sum_hcp += $Golfer->hcp;
        }

        return $sum_hcp/count($this->Golfers);
    }

    public function getHcp() {

        // Formule (50% van laagste + 10% van andere spelers)

        // Doorloop alle golfers en sla de handicaps op - zodat ik alle handicaps in 1 array heb staan.
        // Waarom? Omdat ik met array's handige functies kan gebruiken zoals count() en array_shift()
        $hcps = [];
        foreach($this->Golfers as $Golfer) {
            $hcps[] = $Golfer->hcp;
        }

        // Sorteer de handicaps van laag naar hoog
        sort($hcps);

        // Haal de beste handicap uit de array van handicaps, omdat van deze handicap moet 50% gebruikt worden.
        $best = array_shift($hcps);

        // Maak een variabele aan die je wilt teruggeven
        $return = 0;

        // Voeg ik dus de helft van de beste handicap toe
        $return += $best/2;

        // Voeg de 10% van elk handicap toe
        foreach($hcps as $hcp) {
            $return += $hcp / 10;
        }

        return (float)number_format($return,1);
    }
}



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

        $golfers = [];

        $golfers[] = new Golfer(1, 23.8);
        $golfers[] = new Golfer(2, 22);
        $golfers[] = new Golfer(16, 12.8);
        $golfers[] = new Golfer(24, 44);
        $golfers[] = new Golfer(684, 20);
        $golfers[] = new Golfer(1024, 17.3);

        // Bereken aantal flights
        $amount_flights = ceil(count($golfers)/4);
        $count_per_flight = count($golfers) / $amount_flights;
        $flights = [];
        $flight = new Flight();
        
        foreach($golfers as $index => $golfer){
            $flight->addGolfer($golfer);

            if(($index+1) % $count_per_flight == 0) {
                $flights[] = $flight;
                $flight = new Flight();
            }
        }
        if(!$flight->isEmpty()) {
            $flights[] = $flight;
        }

        dd($flights);

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
                $flightsum = $flightsum + $flight;  
            }

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
