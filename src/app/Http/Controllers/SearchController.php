<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
{
    $fullname = $request->input('fullname');
    $startDay = $request->input('start_day');
    $endDay = $request->input('end_day');
    $email = $request->input('email');
    $gender = $request->input('gender');

    $contactsQuery = Contact::query()
        ->when($fullname, function ($query) use ($fullname) {
            $query->where('family__name', 'LIKE', "%$fullname%")
                ->orWhere('first__name', 'LIKE', "%$fullname%");
        })
        ->when($startDay, function ($query) use ($startDay) {
            $query->whereDate('created_at', '>=', $startDay);
        })
        ->when($endDay, function ($query) use ($endDay) {
            $query->whereDate('created_at', '<=', $endDay);
        })
        ->when($email, function ($query) use ($email) {
            $query->where('email', 'LIKE', "%$email%");
        })
        ->when($gender && $gender !== '全て', function ($query) use ($gender) {
            $query->where('gender', $gender);
        });

    $contacts = $contactsQuery->paginate(10);

    return view('search', compact('contacts', 'gender'));
}
}