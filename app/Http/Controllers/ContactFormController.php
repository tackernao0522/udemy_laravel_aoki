<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactForm;
use Illuminate\Support\Facades\DB; // クエリビルダ用ファサード
use App\Services\CheckFormData;
use App\Http\Requests\StoreContactForm; // validationクラス
use App\Services\SearchForm;

class ContactFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        // // dd($request);
        // // $contacts = ContactForm::all(); // eloquent
        // // クエリビルダ
        // // $contacts = DB::table('contact_forms')
        // //     ->select('id', 'your_name', 'title', 'created_at')
        // //     ->orderBy('created_at', 'desc')
        // //     ->paginate(20);

        $search = SearchForm::checkSearch($search);

        $contacts = $search->paginate(20);

        // dd($contacts);

        return view('contact.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contact.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContactForm $request)
    {
        $contact = new ContactForm;

        $contact->your_name = $request->input('your_name');
        $contact->title = $request->input('title');
        $contact->email = $request->input('email');
        $contact->url = $request->input('url');
        $contact->gender = $request->input('gender');
        $contact->age = $request->input('age');
        $contact->contact = $request->input('contact');

        $contact->save();

        return redirect('contact/index');
        // dd($your_name, $title);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = ContactForm::find($id); // eloquent
        // $contact = DB::table('contact_forms')
        // ->find($id); // クエリビルダ
        // dd($contact);

        // staticの呼び出し元($genderが返る)
        $gender = CheckFormData::checkGender($contact);

        // staticの呼び出し元($ageが返る)
        $age = CheckFormData::checkAge($contact);

        return view('contact.show', compact('contact', 'gender', 'age'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact = ContactForm::find($id);
        // dd($contact);

        return view('contact.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $contact = ContactForm::find($id);

        $contact->your_name = $request->input('your_name');
        $contact->title = $request->input('title');
        $contact->email = $request->input('email');
        $contact->url = $request->input('url');
        $contact->gender = $request->input('gender');
        $contact->age = $request->input('age');
        $contact->contact = $request->input('contact');

        $contact->save();

        return redirect('contact/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = ContactForm::find($id);
        $contact->delete();

        return redirect('contact/index');
    }
}
