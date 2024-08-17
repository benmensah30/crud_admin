<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Interfaces\UserInterface;
use App\Mail\OtpCodeEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Classes\ResponseClass;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    private UserInterface $userInterface;

    public function __construct(UserInterface $userInterface)
    {
        $this->userInterface = $userInterface;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('users.create_user');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'created_at' => now(),
            'badge' => 0,
        ];

        DB::beginTransaction();

        
        DB::commit();
        
        
        $otpCode = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        
        Mail::to($request->email)->send(new OtpCodeEmail($request->name, $otpCode['password']));
        
        try {
            $this->userInterface->store($data);

            return back()->with('success', 'Utilisateur ajouter avec succes.');
        } catch (\Throwable $th) {
            return back()->with('error', 'Une erreur est venue lors du tgraitement, Réessayez !');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);

        return view('users.edit_user', ["user" => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $otpCode = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        
        $user = User::find($id);
        
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
                
        Mail::to($request->email)->send(new OtpCodeEmail($request->name, $otpCode['password']));

        $user->save();

        return back()->with("success", "modification reussi!!!!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();
        
        return back()->with("success", "suppression effectuée !!!");
    }
}
