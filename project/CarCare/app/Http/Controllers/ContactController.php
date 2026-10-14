<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Mail\WelcomeEmail;
use Illuminate\Support\Facades\Mail;




class ContactController extends Controller
{
    /**
     * Store contact message (Website Front-end)
     */
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'phone' => 'nullable|string',
        'subject' => 'required',
        'message' => 'required'
    ]);

    $data = new Contact();

    $data->name = $request->name;
    $data->email = $request->email;
    $data->phone = $request->phone;
    $data->subject = $request->subject;
    $data->message = $request->message;

    $data->save();

    // Send simple welcome email
   Mail::to($request->email)->send(new WelcomeEmail());

    Alert::success('Success', 'Message Sent Successfully!');

    return redirect()->back();
}

    /**
     * Display a listing of messages (Admin Panel)
     */
    public function index(Request $request)
    {
        if ($redirect = $this->adminGuard()) {
            return $redirect;
        }

        $search = $request->input('search');

        $messages = Contact::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%")
                         ->orWhere('email', 'like', "%{$search}%")
                         ->orWhere('phone', 'like', "%{$search}%")
                         ->orWhere('subject', 'like', "%{$search}%")
                         ->orWhere('message', 'like', "%{$search}%");
        })
        ->orderBy('id', 'desc')
        ->paginate(10)
        ->withQueryString();

        return view('admin.contact-messages', compact('messages', 'search'));
    }

    /**
     * Show a single contact message (Admin Panel) - View Only, Static
     */
    public function edit($id)
    {
        if ($redirect = $this->adminGuard()) {
            return $redirect;
        }

        $message = Contact::findOrFail($id);

        return view('admin.edit-contact-message', compact('message'));
    }

    /**
     * Delete contact message (Admin Panel)
     */
    public function destroy($id)
    {
        if ($redirect = $this->adminGuard()) {
            return $redirect;
        }

        $message = Contact::findOrFail($id);
        $message->delete();

        return redirect('/admin/contact-messages')->with('success', 'Message deleted successfully.');
    }
}