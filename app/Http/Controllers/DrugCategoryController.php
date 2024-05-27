<?php

namespace App\Http\Controllers;

use App\Models\DrugCategory;
use Illuminate\Http\Request;

class DrugCategoryController extends Controller
{
    public function index()
    {
        $drugCategory = DrugCategory::all();
        return response()->json($drugCategory);
    }

    public function create()
    {
        // Return a view or data for creating a new drug category
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            // Add other validation rules as needed
        ]);

        $drugCategory = DrugCategory::create($validatedData);
        return response()->json($drugCategory, 201);
    }

    public function show(DrugCategory $drugCategory)
    {
        return response()->json($drugCategory);
    }

    public function edit(DrugCategory $drugCategory)
    {
        // Return a view or data for editing the specified drug category
    }

    public function update(Request $request, DrugCategory $drugCategory)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            // Add other validation rules as needed
        ]);

        $drugCategory->update($validatedData);
        return response()->json($drugCategory);
    }

    public function destroy(DrugCategory $drugCategory)
    {
        $drugCategory->delete();
        return response()->json([
            'message' => 'Deleted successfully.'
        ], 204);
    }
}
