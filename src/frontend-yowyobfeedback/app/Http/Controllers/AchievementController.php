<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class AchievementController extends Controller
{
    public function index()
    {
        $achievements = Http::get('http://localhost:8080/api/achievements')->object();

        return view('back-office.achievements', [
            'achievements' => $achievements
        ]);
    }


    public function create(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'link' => 'required',
        ]);

        if ($request->has($request->image)) {
            $filename = time() . $request->image->extension();
            $path = $request->image->storeAs('realisations', $filename, 'public');
        } else {
            $path = "";
        }
        $response = Http::post('http://localhost:8080/api/achievement/', [
            'title' => $request->title,
            'description' => $request->description,
            'link' => $request->link,
            'image' => $path
        ])->successful();

        if ($response) {
            return redirect()->route('achievements.index')->with('message', 'Réalisation ajouté avec succés en attente de validation');
        } else {
            abort(500);
        }
    }


    public function store(Request $request)
    {
        //
    }


    public function valid($id)
    {
        $response = Http::put('http://localhost:8080/api/achievement/valid/' . $id)->successful();

        if ($response) {
            return redirect()->route('achievements.index')->with('message', 'Réalisation validé');
        } else {
            abort(500);
        }
    }

    public function novalid($id)
    {
        $response = Http::put('http://localhost:8080/api/achievement/notvalid/' . $id)->successful();

        if ($response) {
            return redirect()->route('achievements.index')->with('message', 'Réalisation refusé');
        } else {
            abort(500);
        }
    }

    public function delete($id)
    {
        $response = Http::delete('http://localhost:8080/api/achievement/' . $id);

        $achievement = $response->object();

        Storage::delete($achievement['image']);

        if ($response->successful()) {
            return redirect()->route('achievements.index')->with('message', 'Réalisation supprimé avec succées');
        } else {
            abort(500);
        }
    }


    function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'link' => 'required',
            'description' => 'required',
        ]);

        $title = $request->title;
        $link = $request->link;
        $description = $request->description;

        if ($request->has($request->image)) {
            $filename = time() . $request->image->extension();
            $path = $request->image->storeAs('membres', $filename, 'public');
        } else {
            $path = '';
        }

        $response = Http::put('http://localhost:8080/api/achievement/' . $id, [
            'title' => $title,
            'link' => $link,
            'description' => $description,
            'image' => $path,
        ])->successful();

        if ($response) {
            return redirect()->route('achievements.index')->with('message', 'Modification éffectué avec succés');
        } else {
            abort(500);
        }
    }
}
