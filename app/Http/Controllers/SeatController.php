<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Seat;
use App\Models\Theater;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class SeatController extends Controller
{
    public function index()
    {
        $seats = Seat::with('theater')
                    ->filter(request(['search']))
                    ->latest()
                    ->paginate(10);
        return view('admin.seat.index', compact('seats'));
    }

    public function create()
    {
        $theaters = Theater::all();
        return view('admin.seat.create', compact('theaters'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'theater_id' => 'required|exists:theaters,id',
            'row_start' => 'required|string|size:1|alpha',
            'row_end' => 'required|string|size:1|alpha|gte:row_start',
            'number_start' => 'required|integer|min:1',
            'number_end' => 'required|integer|gte:number_start',
            'type' => 'required|in:standard,accessible,vip',
            'price' => 'required|numeric|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $seats = [];
        $rowStart = ord(strtoupper($request->row_start)) - 65; // Convert A to 0, B to 1, etc.
        $rowEnd = ord(strtoupper($request->row_end)) - 65;
        $numberStart = $request->number_start;
        $numberEnd = $request->number_end;

        for ($row = $rowStart; $row <= $rowEnd; $row++) {
            for ($number = $numberStart; $number <= $numberEnd; $number++) {
                $seats[] = [
                    'theater_id' => $request->theater_id,
                    'row' => chr($row + 65), // Convert back to letter (0 -> A, 1 -> B)
                    'number' => $number,
                    'label' => chr($row + 65) . $number, // e.g., A1, B2
                    'type' => $request->type,
                    'price' => $request->price,
                    'slug'=>Str::slug(chr($row + 65) . $number).'-'.$request->theater_id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        try {
            Seat::insert($seats);
            return redirect()->route('seats')->with('success', 'Seats created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to create seats: ' . $e->getMessage())->withInput();
        }
    }

    public function edit($slug)
    {
        $seat = Seat::where('slug', $slug)->firstOrFail();
        $theaters = Theater::all();
        return view('admin.seat.edit', compact('seat', 'theaters'));
    }

    /**
     * Update the specified seat in storage.
     */
    public function update(Request $request, $slug)
    {
        $seat = Seat::whereSlug($slug)->first();

        $validator = Validator::make($request->all(), [
            'theater_id' => 'required|exists:theaters,id',
            'row' => 'required|string|size:1|alpha',
            'number' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'type' => 'required|in:standard,accessible,vip',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $seat->update([
                'theater_id' => $request->theater_id,
                'row' => strtoupper($request->row),
                'number' => $request->number,
                'label' => strtoupper($request->row) . $request->number,
                'type' => $request->type,
                'price' => $request->price,
                'slug'=>Str::slug($request->row . $request->number).'-'.$request->theater_id,
            ]);
            return redirect()->route('seats')->with('success', 'Seat updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update seat: ' . $e->getMessage())->withInput();
        }
    }

    /**
     * Remove the specified seat from storage.
     */
    public function destroy($slug)
    {
        $seat = Seat::whereSlug($slug)->first();;

        try {
            $seat->delete();
            return redirect()->route('seats')->with('success', 'Seat deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete seat: ' . $e->getMessage());
        }
    }
}
