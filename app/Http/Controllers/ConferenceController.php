<?php

namespace App\Http\Controllers;

use App\Models\Conferences;
use Illuminate\Http\Request;

class ConferenceController extends Controller {

    private $conferences;

    public function __construct(Conferences $conferences) {
        $this->conferences = $conferences;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $conferences = Conferences::paginate(6);
        return view('conferences.index', compact('conferences'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $title = 'Nova conferencia';
        return view('conferences.createConferences', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $request->validate([
            'fullname'=> 'required',
            'username'=> 'required',
            'email'=> 'required',
            'roomId' => 'required',
        ]);

        $this->conferences->create($request->all());
        return redirect()->route('conferences.index')
        ->with('sucess', 'Conferencia criada');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Conference  $conference
     * @return \Illuminate\Http\Response
     */
    public function show(Conferences $conference) {
        return view('conferences.showConferences', $conference);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Conference  $conference
     * @return \Illuminate\Http\Response
     */
    public function edit(Conferences $conference) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Conference  $conference
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Conferences $conference) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Conference  $conference
     * @return \Illuminate\Http\Response
     */
    public function destroy(Conferences $conference) {
        //
    }
}
