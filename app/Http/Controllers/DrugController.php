<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Drugs;

class DrugController extends Controller
{
    public function index()
    {
        // Fetch all drugs from the database
        $drugs = Drugs::all();

        // Return a JSON response with the drugs
        return response()->json(['drugs' => $drugs]);
    }

    public function show($id)
    {
        // Fetch a specific drug by ID from the database
        $drug = Drugs::find($id);

        // Check if the drug exists
        if (!$drug) {
            return response()->json(['message' => 'Drug not found'], 404);
        }

        // Return a JSON response with the drug
        return response()->json(['drug' => $drug]);
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            
            // Add more validation rules as needed
        ]);

        // Create a new drug
        $drug = new Drugs();
        $drug->name = $request->input('name');
        $drug->description = $request->input('description');
        $drug->quantity = $request->input('quantity');
        $drug->category_id = $request->input('category_id');
        // Set other attributes as needed

        // Save the drug to the database
        $drug->save();

        // Return a JSON response indicating success
        return response()->json(['message' => 'Drug created successfully'], 201);
    }

    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            // Add more validation rules as needed
        ]);

        // Fetch the drug by ID from the database
        $drug = Drugs::find($id);

        // Check if the drug exists
        if (!$drug) {
            return response()->json(['message' => 'Drug not found'], 404);
        }

        // Update the drug attributes
        $drug->name = $request->input('name');
        $drug->description = $request->input('description');
        $drug->quantity = $request->input('quantity');
        $drug->category_id = $request->input('category_id');
        // Update other attributes as needed

        // Save the updated drug to the database
        $drug->save();

        // Return a JSON response indicating success
        return response()->json(['message' => 'Drug updated successfully']);
    }

    public function destroy($id)
    {
        // Fetch the drug by ID from the database
        $drug = Drugs::find($id);

        // Check if the drug exists
        if (!$drug) {
            return response()->json(['message' => 'Drug not found'], 404);
        }

        // Delete the drug from the database
        $drug->delete();

        // Return a JSON response indicating success
        return response()->json(['message' => 'Drug deleted successfully']);
    }
}
