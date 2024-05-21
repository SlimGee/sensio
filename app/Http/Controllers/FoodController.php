<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFoodRequest;
use App\Http\Requests\UpdateFoodRequest;
use App\Models\Food;
use Illuminate\Support\Facades\Storage;
use Spatie\QueryBuilder\QueryBuilder;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $foods = QueryBuilder::for(Food::class)
            ->defaultSort('-expiry_date', '-minimum_expiry_date', '-halfLife')
            ->paginate();

        return view('food.index', [
            'foods' => $foods,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('food.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFoodRequest $request)
    {
        $image = $request->validated('photo')?->storePublicly('food', 'public');

        Food::create([
            ...$request->safe()->except('photo'),
            'photo' => is_null($image) ? $image : Storage::disk('public')->url($image),
        ]);

        return redirect()->route('food.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Food $food)
    {
        return view('food.show', [
            'food' => $food,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Food $food)
    {
        return view('food.edit', [
            'food' => $food,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFoodRequest $request, Food $food)
    {
        $image = $request->validated('photo')?->storePublicly('food', 'public');

        $food->update([
            ...$request->safe()->except('photo'),
            'photo' => is_null($image) ? $food->photo : Storage::disk('public')->url($image),
        ]);

        return redirect()->route('food.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Food $food)
    {
        $food->delete();

        return redirect()->route('food.index');
    }
}
