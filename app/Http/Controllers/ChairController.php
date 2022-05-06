<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chair;
use App\Models\ChairWorker;
use App\Models\Position;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class ChairController extends Controller
{
    //
    public function index()
    {
        $chairWorkers = DB::select('SELECT chair_workers.*, positions.title FROM chair_workers 
            Join positions on chair_workers.position_id = positions.id
        ');
        $chairs = Chair::all();
        return View::make('list.chair')->with(['chairs' => $chairs, 'chairWorkers' => $chairWorkers]);
    }

    public function addChair()
    {
        $chairs = Chair::all();
        return View::make('forms.add_ch')->with(['chairs' => $chairs]);
    }

    public function createChairWorker(Request $request)
    {
        $validated = $request->validate([
            'chair' => 'required|numeric',
            'fullname' => 'required|max:255',
            'position' => 'required|numeric'
        ]);

        $chairWorker = new ChairWorker();
        $chairWorker->chair_id = $validated['chair'];
        $chairWorker->fullname = $validated['fullname'];
        $chairWorker->position_id = $validated['position'];
        $chairWorker->save();
        return redirect('/list/chair');
    }

    public function editChair($id)
    {
        $chairs = Chair::all();
        $chairWorker = ChairWorker::find($id);
        $positions = Position::all();
        return View::make('forms.edit_ch')->with(['chairWorker' => $chairWorker, 'chairs' => $chairs, 'positions' => $positions]);
    }

    public function updateChairWorker(Request $request, $id)
    {
        $validated = $request->validate([
            'chair' => 'required|numeric',
            'fullname' => 'required|max:255',
            'position' => 'required|numeric'
        ]);

        $chairWorker = ChairWorker::find($id);
        $chairWorker->chair_id = $validated['chair'];
        $chairWorker->fullname = $validated['fullname'];
        $chairWorker->position_id = $validated['position'];
        $chairWorker->save();
        return redirect('/list/chair');
    }

    public function deleteChairWorker($id)
    {
        $chairWorker = ChairWorker::where('id', $id)->delete();
        return redirect('/list/chair');
    }
}

