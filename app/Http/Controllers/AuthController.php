<?php

namespace App\Http\Controllers;

use App\Interfaces\LoginInterface;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    private LoginInterface $AuthInterface;

    public function __construct(LoginInterface $AuthInterface)
    {
        $this->AuthInterface = $AuthInterface;
    }


    public function login(Request $request)
    {

        $data = [
            'name' => $request->name,
            'password' => $request->password,
        ];

        $users = User::where('name', $request->name)->first();

        if($users) {
            if ($this->AuthInterface->login($data)) {
                if ($users->badge == 1) {
                    return redirect()->route('admin.dashboard');
                }

                return redirect()->route('users.user_dashboard', [
                    'user' => $users
                ]);
            } else {
                return back()->with('error', 'email ou mot de passe incorrect');
            }
        } else {
            return back()->with('error', 'Utilisateur non trouvé');
        }
        // try {
        // } catch (\Exception $ex) {
        //     return back()->with('error', 'Une erreur est survenue lors du traitement, Réessayez !');
        // }
    }
}
