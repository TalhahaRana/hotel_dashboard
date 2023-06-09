<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class Countries extends Controller
{
    /**
     * Display a listing of the resource.                          
     */
    public function index()
    {
        $data['countries'] = Country::all();
    return view('countries.index', $data);
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $data['title'] = 'Add Country';
        return view('countries.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:countries'
        ]);
    
        $title = $request->input('title');
        $url_title = Str::slug($title);
    
        $info = [
            'title' => $title,
            'url_title' => $url_title
        ];
    
        $country = Country::create($info);
    
        if ($country) {
            return redirect()->route('countries.create')->with('message', 'Country is added.');
        } else {
            return redirect()->back()->with('error', 'Try again.');
        }
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        if(empty(trim($id)) or !is_numeric($id))
            return redirect(route('countries.index'));
    
        $data['title'] = 'Edit Country';
        $data['country'] = Country::findorfail($id);
       
        return view('countries.update', $data);
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required'
        ]);
    
        $country = Country::findorfail($id);

        $title = $request->input('title');
        $country -> title = $title;
    
        $country -> update();
        return redirect(route('countries.edit', $country -> id))->with('message', 'Country is updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $country = Country:: findorfail ($id);
        $country -> delete();
        return redirect(route('countries.index', $country -> id))->with('message', 'Country is deleted.');
    }
}
