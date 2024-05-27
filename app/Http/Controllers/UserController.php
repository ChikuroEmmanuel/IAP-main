<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users as User;

class UserController extends Controller
{
    public function index()
    {
        // Fetch all users from the database
        $users = User::all();

        // Return a JSON response with the users
        return response()->json(['users' => $users]);
    }

    public function show($id)
    {
        // Fetch a specific user by ID from the database
        $user = User::find($id);

        // Check if the user exists
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        // Return a JSON response with the user
        return response()->json(['user' => $user]);
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'gender'=>'required|string|max:255',
            'password' => 'required|min:6',
            // Add more validation rules as needed
        ]);

        // Create a new user
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->gender = $request->input('gender');
        $user->role = $request->input('role');
        $user->password = bcrypt($request->input('password'));
        // Set other attributes as needed

        // Save the user to the database
        $user->save();

        // Return a JSON response indicating success
        return response()->json(['message' => 'User created successfully'], 201);
    }

    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'gender'=>'required|string|max:255',
            'role'=>'required|string|max:255',
            'password' => 'nullable|min:6',
           
            // Add more validation rules as needed
        ]);

        // Fetch the user by ID from the database
        $user = User::find($id);

        // Check if the user exists
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        // Update the user attributes
        $user->name = $request->name;
        $user->email = $request->input('email');
        $user->gender = $request->input('gender');
        $user->role = $request->input('role');
        $user->password = ($request->input('password'));
        
        if ($request->has('password')) {
            $user->password = bcrypt($request->input('password'));
        }

        // Save the updated user to the database
        $user->save();

        // Return a JSON response indicating success
        return response()->json(['message' => 'User updated successfully']);
    }
    public function getMaleUsers()
    {
        // Fetch male users from the database
        $maleUsers = User::where('gender', 'male')->get();
    
        // Return a JSON response with the male users
        return response()->json(['maleUsers' => $maleUsers]);
    }
    
    public function getFemaleUsers()
    {
        // Fetch female users from the database
        $femaleUsers = User::where('gender', 'female')->get();
    
        // Return a JSON response with the female users
        return response()->json(['femaleUsers' => $femaleUsers]);
    }
    
    
    public function time(){
        $users = User::orderBy('created_at', 'asc')->get();
    
        return response()->json($users);
    }
    


    public function destroy($id)
    {
        // Fetch the user by ID from the database
        $user = User::find($id);

        // Check if the user exists
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        // Delete the user from the database
        $user->delete();

        // Return a JSON response indicating success
        return response()->json(['message' => 'User deleted successfully']);
    }
}
