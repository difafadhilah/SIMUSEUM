<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user(); // Mengambil informasi pengguna yang sedang masuk
        $feedback = Feedback::where('user_id', $user->id)->get(); // Mengambil umpan balik yang dibuat oleh pengguna tersebut
        return view('dashboard.feedback', [
            'feedback' => $feedback,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('frontend.feedback');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = auth()->user(); // Mengambil informasi pengguna yang sedang masuk

        $feedback = new Feedback();
        $feedback->user_id = $user->id; // Menghubungkan umpan balik dengan ID pengguna yang membuatnya
        $feedback->rating = $request->input('rating');
        $feedback->kesan = $request->input('kesan');
        $feedback->save();

        return redirect('/dashboard-feedback')->with('success', 'Feedback berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Feedback $feedback)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Feedback $feedback)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Feedback $feedback)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Feedback $feedback)
    {
        //
    }
}
