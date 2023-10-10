<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    public function index()
    {
        $tickets = Ticket::all();
        $users = User::all();
        return view('admin.index', compact('tickets', 'users'));
    }

    public function delete($id)
    {
        $ticket = Ticket::find($id);

        if ($ticket) {

            if ($ticket->issue_image) {
                Storage::delete($ticket->issue_image);
            }

            $ticket->delete();
        }
        return redirect()->route('admin.index')->with('success', 'Ticket deleted successfully');
    }



    public function edit($id)
    {
        $ticket = Ticket::find($id);

        if (!$ticket) {
            return redirect()->route('admin.index')->with('error', 'Ticket not found');
        }
        return view('admin.edit', compact('ticket'));
    }


    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'status' => 'required|max:255',
        ]);
    
        $ticket = Ticket::find($id);
    
        if (!$ticket) {
            return redirect()->route('tickets.index')->with('error', 'Ticket not found');
        }
    
        if ($ticket->update($validatedData)) {
            $page_link_id = $ticket->id;
            $user_id = $ticket->user_id;
            $status =  $ticket->status;
    
            $recipientEmail = User::where('id', $user_id)->value('email');
            $name = User::where('id', $user_id)->value('name');
    
            $pageLinkUrl = route('tickets.show', ['ticket' => $page_link_id]);
    
            $recipient = $recipientEmail;
    
            $mail = compact('recipient', 'status', 'name', 'pageLinkUrl');
    
            $subject = 'Your Ticket Update'; // Specify the email subject here
    
            if ($this->isOnline()) {
                Mail::send('admin.template', compact('mail'), function ($message) use ($recipientEmail, $subject) {
                    $message->to($recipientEmail);
                    $message->from('manikandaprabu.v@arkinfotec.com', 'Admin');
                    $message->subject($subject); // Set the email subject
                });
    
                return redirect()->route('admin.index')->with('success', 'Ticket updated successfully and Email was sent');
            } else {
                return redirect()->back()->withErrors(['internet' => 'Not connected to the internet.']);
            }
        }
    }
    

    public function isOnline($site = "https://www.google.com")
    {
        return @fopen($site, "r") !== false;
    }
}
