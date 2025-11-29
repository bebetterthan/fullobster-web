<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('fullobster.contact');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:2000',
        ]);

        // Redirect to WhatsApp with the message
        $whatsappNumber = '6285706531027';
        $text = "Halo Fullobster!\n\nNama: {$validated['name']}\nEmail: {$validated['email']}\n\nPesan:\n{$validated['message']}";
        $whatsappUrl = "https://wa.me/{$whatsappNumber}?text=" . urlencode($text);

        return redirect($whatsappUrl);
    }
}