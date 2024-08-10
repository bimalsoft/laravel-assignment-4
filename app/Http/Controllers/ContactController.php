<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        $contacts = DB::table('contacts');

        if ($request->has('search')) {
            $contacts->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('email', 'like', '%' . $request->search . '%');
        }

        if ($request->has('sort') && $request->sort != '') {
            $contacts->orderBy($request->sort, 'asc');
        } else{
            $contacts->orderBy('id', 'desc');
        }

        $contacts = $contacts->get();
        return view('index', compact('contacts'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        DB::table('contacts')->insert([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
        ]);

        return redirect()->route('contacts.index')
            ->with('success', 'Contact created successfully');
    }

    public function show($id)
    {
        $contact = DB::table('contacts')->find($id);
        return view('show', compact('contact'));
    }

    public function edit($id)
    {
        $contact = DB::table('contacts')->find($id);
        return view('edit', compact('contact'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        DB::table('contacts')
            ->where('id', $id)
            ->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'address' => $request->input('address'),
            ]);
        return redirect()->route('contacts.index')
            ->with('success', 'Contact updated successfully');
    }

    public function destroy($id)
    {
        DB::table('contacts')->where('id', $id)->delete();
        return redirect()->route('contacts.index')
            ->with('success', 'Contact deleted successfully');
    }
}
