<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        // Honeypot — защита от спам-ботов
        if ($request->filled('hp')) {
            abort(403, 'Спам обнаружен!');
        }

        $validated = $request->validate([
            'name'  => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:30'],
            'text'  => ['required', 'string', 'min:10', 'max:500'],
        ]);

        $name    = $validated['name'];
        $email   = $validated['email'];
        $phone   = $validated['phone'] ?? '—';
        $message = $validated['text'];

        $body = "Имя: {$name}\r\nEmail: {$email}\r\nТелефон: {$phone}\r\nСообщение:\r\n{$message}";

        Mail::raw($body, function ($mail) use ($name, $email) {
            $mail->to(['it@nghim.ru', 'support@nghim.ru'])
                 ->replyTo($email, $name)
                 ->subject('Сообщение с формы обратной связи');
        });

        if ($request->expectsJson()) {
            return response()->json(['message' => 'Сообщение успешно отправлено.']);
        }

        return back()->with('success', 'Сообщение успешно отправлено.');
    }
}
