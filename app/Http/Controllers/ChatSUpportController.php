<?php

namespace App\Http\Controllers;

use App\Models\TicketMessage;
use Illuminate\Http\Request;

class ChatSUpportController extends Controller
{
    public function index(Request $request)
    {
        try {
            $messages = TicketMessage::with(['sender.userDetails'])->where('ticket_id', $request->ticket_id)
                ->orderBy('created_at', 'desc')
                ->cursorPaginate($request->paginate)
                ->reverse();
            $groupedByDate = $messages->groupBy(function ($message) {
                return \Carbon\Carbon::parse($message->created_at)->toDateString();
            });

            return response()->json([
                'success' => true,
                'payload' => $groupedByDate
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'payload' => $th->getMessage()
            ]);
        }
    }
}
