<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Cycle;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::with('cycles.institution')->orderBy('created_at', 'desc')->get();
        return view('messages.index', compact('messages'));
    }

    public function create()
    {
        // Traemos ciclos con institución para el select
        $cycles = Cycle::with('institution')->orderBy('name')->get();
        return view('messages.create', compact('cycles'));
    }

    public function store(Request $request)
    {
        // Validación base — siempre requeridos
        $request->validate([
            'title'          => 'required|string|max:255',
            'content'        => 'required|string',
            // recipient_type debe ser cycle o grade
            'recipient_type' => 'required|in:cycle,grade',
            // cycles requerido solo si recipient_type es cycle
            'cycles'         => 'required_if:recipient_type,cycle|array',
            'cycles.*'       => 'exists:cycles,id',
            // grade requerido solo si recipient_type es grade
            'grade'          => 'required_if:recipient_type,grade|nullable|string|max:100',
        ]);

        $message = Message::create([
            'title'          => $request->title,
            'content'        => $request->content,
            'recipient_type' => $request->recipient_type,
            // Si es por grado guardamos el grado, si no null
            'grade'          => $request->recipient_type === 'grade' ? $request->grade : null,
            'sent_at'        => now(),
        ]);

        // Si es por ciclo vinculamos los ciclos en la tabla pivote
        if ($request->recipient_type === 'cycle') {
            $message->cycles()->sync($request->cycles);
        }

        return redirect()->route('messages.index')->with('success', 'Mensaje enviado correctamente.');
    }

    public function show(Message $message)
    {
        $message->load('cycles.institution');
        return view('messages.show', compact('message'));
    }

    public function edit(Message $message)
    {
        $cycles = Cycle::with('institution')->orderBy('name')->get();
        return view('messages.edit', compact('message', 'cycles'));
    }

    public function update(Request $request, Message $message)
    {
        $request->validate([
            'title'          => 'required|string|max:255',
            'content'        => 'required|string',
            'recipient_type' => 'required|in:cycle,grade',
            'cycles'         => 'required_if:recipient_type,cycle|array',
            'cycles.*'       => 'exists:cycles,id',
            'grade'          => 'required_if:recipient_type,grade|nullable|string|max:100',
        ]);

        $message->update([
            'title'          => $request->title,
            'content'        => $request->content,
            'recipient_type' => $request->recipient_type,
            'grade'          => $request->recipient_type === 'grade' ? $request->grade : null,
        ]);

        if ($request->recipient_type === 'cycle') {
            $message->cycles()->sync($request->cycles);
        } else {
            // Si cambia a grado, eliminamos los ciclos vinculados
            $message->cycles()->detach();
        }

        return redirect()->route('messages.index')->with('success', 'Mensaje actualizado correctamente.');
    }

    public function destroy(Message $message)
    {
        $message->delete();
        return redirect()->route('messages.index')->with('success', 'Mensaje eliminado correctamente.');
    }
}
