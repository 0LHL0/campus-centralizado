<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        // Traemos todos los mensajes ordenados por más reciente
        $messages = Message::orderBy('created_at', 'desc')->get();
        return view('messages.index', compact('messages'));
    }

    public function create()
    {
        return view('messages.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Message::create([
            'title'   => $request->title,
            'content' => $request->content,
            // sent_at se guarda como la fecha actual al enviar
            'sent_at' => now(),
        ]);

        return redirect()->route('messages.index')->with('success', 'Mensaje enviado correctamente.');
    }

    public function show(Message $message)
    {
        return view('messages.show', compact('message'));
    }

    public function edit(Message $message)
    {
        return view('messages.edit', compact('message'));
    }

    public function update(Request $request, Message $message)
    {
        $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $message->update($request->all());

        return redirect()->route('messages.index')->with('success', 'Mensaje actualizado correctamente.');
    }

    public function destroy(Message $message)
    {
        $message->delete();
        return redirect()->route('messages.index')->with('success', 'Mensaje eliminado correctamente.');
    }
}
