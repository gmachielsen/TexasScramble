<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Player;

class PlayerController extends Controller
{
    public function index()
    {
        $players = Player::whenSearch(request()->search)->paginate(2);

        return view('dashboard.players.index', compact('players'));
    }

    
    public function create()
    {
        return view('dashboard.players.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'gender' => 'required',
            'name'=>'required|min:2',
            'handicap' => 'required|min:1',

        ]);
        Player::create([
            'gender' => request('gender'),
            'name'=> request('name'),
            'handicap' => request('handicap'),
        ]);
    
        session()->flash('success', 'Player saved succesfully');
        return redirect()->back(); 
    }

    public function edit($id) {
        $player = Player::findOrFail($id);
        return view('dashboard.players.edit', compact('player'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'gender' => 'required',
            'name'=>'required|min:2',
            'handicap' => 'required|min:1',
        ]);

        $player = Player::find($id);
        $player->gender = request('gender');
        $player->name = request('name');
        $player->handicap = request('handicap');

        $player->save();
        session()->flash('success', 'Player updated succesfully');
        return redirect()->back(); 
    }

    public function delete($id)
    {
        $player = Player::find($id);
        $player->delete();
        session()->flash('success', 'Player deleted successfully');
        return redirect()->route('admin.players.index');
    }
}
