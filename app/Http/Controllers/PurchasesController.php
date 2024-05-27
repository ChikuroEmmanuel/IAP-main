<?php

namespace App\Http\Controllers;

use App\Models\Purchases;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Drugs as Drug;
// use App\Models\Purchase;

class PurchasesController extends Controller
{
    public function index()
    {
        // Fetch all purchases from the database
        $purchases = Purchases::all();

        // Return a JSON response with the purchases
        return response()->json(['purchases' => $purchases]);
    }

    public function add(Request $request){
        $user_id = Auth::user()->id;
        $drug_id = $request->drug;

        $purchase = Purchases::create([
            'users_id'=> $user_id,
            'drugs_id'=> $drug_id
            ]);
            // dd($request)->all();
            $drugs = Drug::all();

            return view('subscribe', compact('drugs'))->with('success', "Subscription Made successfully");
    }

    public function show($id)
    {
        // Fetch a specific purchase by ID from the database
        $purchase = Purchases::find($id);

        // Check if the purchase exists
        if (!$purchase) {
            return response()->json(['message' => 'Purchase not found'], 404);
        }

        // Return a JSON response with the purchase
        return response()->json(['purchase' => $purchase]);
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'total_price' => 'required|numeric|min:0',
            // Add more validation rules as needed
        ]);

        // Create a new purchase
        $purchase = new Purchases();
        $purchase->product_id = $request->input('product_id');
        $purchase->quantity = $request->input('quantity');
        $purchase->total_price = $request->input('total_price');
        // Set other attributes as needed

        // Save the purchase to the database
        $purchase->save();

        // Return a JSON response indicating success
        return response()->json(['message' => 'Purchase created successfully'], 201);
    }

    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'total_price' => 'required|numeric|min:0',
            // Add more validation rules as needed
        ]);

        // Fetch the purchase by ID from the database
        $purchase = Purchases::find($id);

        // Check if the purchase exists
        if (!$purchase) {
            return response()->json(['message' => 'Purchase not found'], 404);
        }

        // Update the purchase attributes
        $purchase->product_id = $request->input('product_id');
        $purchase->quantity = $request->input('quantity');
        $purchase->total_price = $request->input('total_price');
        // Update other attributes as needed

        // Save the updated purchase to the database
        $purchase->save();

        // Return a JSON response indicating success
        return response()->json(['message' => 'Purchase updated successfully']);
    }

    public function destroy($id)
    {
        // Fetch the purchase by ID from the database
        $purchase = Purchases::find($id);

        // Check if the purchase exists
        if (!$purchase) {
            return response()->json(['message' => 'Purchase not found'], 404);
        }

        // Delete the purchase from the database
        $purchase->delete();

        // Return a JSON response indicating success
        return response()->json(['message' => 'Purchase deleted successfully']);
    }
}
