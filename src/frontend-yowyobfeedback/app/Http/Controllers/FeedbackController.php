<?php

namespace App\Http\Controllers;

use App\Mail\FeedbackMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class FeedbackController extends Controller
{
    public function index()
    {
        $feedbacks = Http::get('http://localhost:8080/api/feedbacks')->object();

        return view('back-office.feedback', [
            'feedbacks' => $feedbacks
        ]);
    }


    public function valid($id)
    {
        $response = Http::put('http://localhost:8080/api/feedback/valid/' . $id)->successful();

        if ($response)
        {
            return redirect()->route('feedback.index')->with('message', 'Commentaire validé avec succées');
        }
        else
        {
            abort(500);
        }
    }

    public function create(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'firstname' => 'required',
            'job' => 'required',
            'email' => 'required',
            'image' => 'required',
            'comments' => 'required'
        ]);
        $filename = time().$request->image->extension();

        $path = $request->image->storeAs('feedback', $filename, 'public');

        $response = Http::post('http://localhost:8080/api/feedback/', [
            'name' => $request->name,
            'firstname' => $request->firstname,
            'job' => $request->job,
            'email' => $request->email,
            'comments' => $request->comments,
            'image' => $path
        ] )->successful();

        if ($response)
        {
            $members = Http::get('http://localhost:8080/api/members')->object();

            foreach($members as $member)
            {
                $details = [
                    'title' => 'Nouveau commentaire en attente de validation',
                    'nameMember' => 'Salut '.$member->name.' '.$member->firstname,
                    'body' => 'Nouveau commentaire de '.$request->name.' '.$request->firstname.' en attente de validation connectez-vous de le valider'
                ];

                Mail::to($member->email)->send(new FeedbackMail($details));

            }

            return redirect()->route('home')->with('message', 'good');
        }
        else
        {
            abort(500);
        }
    }


    public function noValid($id)
    {
        $response = Http::put('http://localhost:8080/api/feedback/notvalid/' . $id)->successful();

        if ($response)
        {
            return redirect()->route('feedback.index')->with('message', 'Commentaire refusé avec succées');
        }
        else
        {
            abort(500);
        }
    }

    public function waiting($id)
    {
        $response = Http::put('http://localhost:8080/api/feedback/waiting/' . $id)->successful();

        if ($response)
        {
            return redirect()->route('feedback.index')->with('message', 'Commentaire mis en attente avec succées');
        }
        else
        {
            abort(500);
        }
    }

    public function delete($id)
    {
        $response = Http::delete('http://localhost:8080/api/feedback/' . $id);

        $feedback = $response->object();

        Storage::delete($feedback['image']);

        if ($response->successful())
        {
            return redirect()->route('feedback.index')->with('message', 'Commentaire supprimé avec succées');
        }
        else
        {
            abort(500);
        }
    }
}
