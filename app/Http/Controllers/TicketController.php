<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;



class TicketController extends Controller
{

    public function index(Request $request)
    {
        // Retrieve the session variable value from the form submission
        $sessionVariable = $request->input('session_variable');

        // Use $sessionVariable as needed in your controller logic

        $tickets = Ticket::where('user_id', auth()->user()->id)->get();

        return view('tickets.index', compact('tickets', 'sessionVariable'))->with('p_value', $sessionVariable);
    }

    public function show(Ticket $ticket)
    {
        return view('tickets.show', compact('ticket'));
    }




    public function create(Ticket $ticket)
    {
        return view('tickets.create', compact('ticket'));
    }
    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'status' => 'required|max:255',
            'detail' => 'required',
            'type' => 'required|in:Bug,Enhancement,Suggestion,Question,Other',
            'category' => 'required|in:Uncategorized,Billing,Order,Repayment',
            'priority' => 'required|in:Low,Medium,High,Lowest,Highest',
            'bug_url' => 'nullable|required_if:type,Bug|max:255',
            'bug_source' => 'nullable|required_if:type,Bug|max:255',
            'estimate_timeline' => 'nullable|required_if:type,Enhancement|max:255',
            'suggestion_type' => 'nullable|required_if:type,Suggestion|max:255',
            'department' => 'nullable|required_if:type,Question|in:Billing,Order,Other',
            'issue_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust image validation rules as needed
        ]);

        // Determine the user_id based on the logged-in user
        $user_id = Auth::id();

        // Create a new Ticket model instance and fill it with the validated data and user_id
        $ticket = new Ticket();
        $ticket->fill(array_merge($validatedData, ['user_id' => $user_id]));

        // Upload and store the issue image if it was provided
        if ($request->hasFile('issue_image')) {
            // Store the issue_image in the public/ticket_images directory
            $imagePath = $request->file('issue_image')->store('public/ticket_images'); // Use "public/" prefix
            $ticket->issue_image = str_replace('public/', '', $imagePath); // Remove "public/" prefix from the saved path
        }

        // Save the ticket to the database
        $ticket->save();

        // Redirect back with a success message
        return redirect()->route('tickets.index')->with('success', 'Ticket created successfully');
    }

    public function delete(Ticket $ticket)
    {
        $ticket->delete();
        return redirect()->route('tickets.index')->with('success', 'Ticket deleted successfully');
    }



    ///// update
    // TicketController.php

    public function edit($id)
    {
        // Find the ticket by its ID
        $ticket = Ticket::find($id);

        if (!$ticket) {
            return redirect()->route('tickets.index')->with('error', 'Ticket not found');
        }

        // You can add any necessary logic here before returning the view

        return view('tickets.edit', compact('ticket'));
    }

    public function update(Request $request, $id)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'detail' => 'required',
            'type' => 'nullable|in:Bug,Enhancement,Suggestion,Question,Other',
            'category' => 'nullable|in:Uncategorized,Billing,Order,Repayment',
            'priority' => 'nullable|in:Low,Medium,High,Lowest,Highest',
            'bug_url' => 'nullable|required_if:type,Bug|max:255',
            'bug_source' => 'nullable|required_if:type,Bug|max:255',
            'estimate_timeline' => 'nullable|required_if:type,Enhancement|max:255',
            'suggestion_type' => 'nullable|required_if:type,Suggestion|max:255',
            'department' => 'nullable|required_if:type,Question|in:Billing,Order,Other',
            'issue_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust image validation rules as needed
        ]);

        // Find the ticket by its ID
        $ticket = Ticket::find($id);

        // Check if the ticket was found
        if (!$ticket) {
            return redirect()->route('tickets.index')->with('error', 'Ticket not found');
        }

        // Update the ticket with the validated data
        $ticket->update($validatedData);

        // Upload and store the issue image if it was provided
        if ($request->hasFile('issue_image')) {
            // Delete the old issue image if it exists
            if ($ticket->issue_image) {
                // Remove the "public/" prefix and delete the old image
                Storage::delete('public/' . $ticket->issue_image);
            }

            // Store the new issue image in the public/ticket_images directory
            $imagePath = $request->file('issue_image')->store('public/ticket_images');

            // Update the ticket's issue image path
            $ticket->issue_image = str_replace('public/', '', $imagePath);
        }

        // Save the updated ticket
        $ticket->save();

        // Redirect back with a success message
        return redirect()->route('tickets.index')->with('success', 'Ticket updated successfully');
    }
}
