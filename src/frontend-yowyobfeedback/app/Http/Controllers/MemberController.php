<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class MemberController extends Controller
{

    public function index()
    {
        $members = Http::get('http://localhost:8080/api/members')->object();

        return view('back-office.members', [
            'members' => $members
        ]);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        // dd(sha1($request->password));

        $response = Http::get('http://localhost:8080/api/login/' . $request->email . '/' . sha1($request->password));

        if ($response->successful()) {

            $member = $response->json();

            $request->session()->put('idMember', $member['id']);
            $request->session()->put('nameMember', $member['name']);
            $request->session()->put('passwordMember', $member['password']);
            $request->session()->put('emailMember', $member['email']);
            $request->session()->put('firstnameMember', $member['firstname']);
            $request->session()->put('imageMember', $member['image']);
            $request->session()->put('statusMember', $member['admin']);
            $request->session()->put('jobMember', $member['job']);

            return redirect()->route('dashboard');
        } else {
            return redirect()->route('mylogin')->with('myerror', 'identifiant ou mot de passe incorrect');
        }
    }

    public function logout(Request $request)
    {
        $request->session()->forget('idMember');
        $request->session()->forget('nameMember');
        $request->session()->forget('passwordMember');
        $request->session()->forget('emailMember');
        $request->session()->forget('firstnameMember');
        $request->session()->forget('imageMember');
        $request->session()->forget('statusMember');
        $request->session()->forget('jobMember');

        return redirect()->route('mylogin');
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'firstname' => 'required',
            'job' => 'required',
            'email' => 'required',
            'image' => 'required'
        ]);

        $filename = time() . $request->image->extension();

        $path = $request->image->storeAs('membres', $filename, 'public');

        $response = Http::post('http://localhost:8080/api/member/', [
            'name' => $request->name,
            'firstname' => $request->firstname,
            'job' => $request->job,
            'email' => $request->email,
            'image' => $path
        ])->successful();

        if ($response) {
            return redirect()->route('members.index')->with('message', 'Membre ajouté avec succés');
        } else {
            abort(500);
        }
    }

    public function admin($id)
    {
        $response = Http::put('http://localhost:8080/api/member/admin/' . $id)->successful();

        if ($response) {
            return redirect()->route('members.index')->with('message', 'Se membre est desormais un admin');
        } else {
            abort(500);
        }
    }

    public function noadmin($id)
    {
        $response = Http::put('http://localhost:8080/api/member/notAdmin/' . $id)->successful();

        if ($response) {
            return redirect()->route('members.index')->with('message', 'Se membre n\'est plus un admin');
        } else {
            abort(500);
        }
    }

    public function delete($id)
    {
        $response = Http::delete('http://localhost:8080/api/member/' . $id);

        $member = $response->object();

        Storage::delete($member['image']);

        if ($response->successful()) {
            return redirect()->route('members.index')->with('message', 'membre supprimé avec succées');
        } else {
            abort(500);
        }
    }


    function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'firstname' => 'required',
            'job' => 'required',
            'email' => 'required',
        ]);

        $name = $request->name;
        $firstname = $request->firstname;
        $job = $request->job;
        $email = $request->email;
        $password = $request->password;

        if ($password != null) {
            $password = sha1($request->password);
        } else {
            $password = Session::get('passwordMember');
        }
        if ($request->has($request->image)) {
            $filename = time() . $request->image->extension();
            $path = $request->image->storeAs('membres', $filename, 'public');
        } else {
            $path = Session::get('imageMember');
        }

        $response = Http::put('http://localhost:8080/api/member/' . $id, [
            'name' => $name,
            'firstname' => $firstname,
            'job' => $job,
            'email' => $email,
            'password' => $password,
            'image' => $path,
        ])->successful();

        if ($response) {

            $request->session()->put('nameMember', $name);
            $request->session()->put('passwordMember', $password);
            $request->session()->put('emailMember', $email);
            $request->session()->put('firstnameMember', $firstname);
            $request->session()->put('imageMember', $path);
            $request->session()->put('jobMember', $job);

            return redirect()->route('settings')->with('message', 'Modification éffectué avec succés');
        } else {
            abort(500);
        }
    }

    public function dashboard()
    {
        $achievements = Http::get('http://localhost:8080/api/achievements')->object();
        $nbVachievements = 0;
        $nbNVachievements = 0;

        $feedbacks = Http::get('http://localhost:8080/api/feedbacks')->object();
        $nbAfeedback = 0;
        $nVAfeedback = 0;
        $nbRfeedback = 0;
        $nbNVUfeedback = 0;

        $members = Http::get('http://localhost:8080/api/members')->object();

        $nbMembers = count($members);

        foreach ($achievements as $achievement) {
            if ($achievement->state) {
                $nbVachievements++;
            } else {
                $nbNVachievements++;
            }
        }

        foreach ($feedbacks as $feedback) {
            if ($feedback->state == 3) {
                $nbNVUfeedback++;
            } elseif ($feedback->state ==  2) {
                $nbAfeedback++;
            } elseif ($feedback->state ==  1) {
                $nVAfeedback++;
            } else {
                $nbRfeedback++;
            }
        }

        return view('back-office.dashboard', [
            'nbMembers' => $nbMembers,
            'nbVachievements' =>  $nbVachievements,
            'nbNVachievements' => $nbNVachievements,
            'nbNVUfeedback' =>    $nbNVUfeedback,
            'nbAfeedback' =>      $nbAfeedback,
            'nVAfeedback' =>      $nVAfeedback,
            'nbRfeedback' =>      $nbRfeedback,
        ]);
    }

    public function settings()
    {
        return view('back-office.settings');
    }
}
