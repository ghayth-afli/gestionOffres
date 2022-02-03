<?php

namespace App\Http\Controllers;
use App\Models\Offer;
use Illuminate\Http\Request;
use DB;
class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('show-offer', Offer::class);
        $offers = Offer::all();
        return view('offer.index', ['offers' =>   $offers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create-offer', Offer::class);
        return view('offer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create-offer', Offer::class);
        $offer = $request->validate([
            'title' => 'required',
            'company' => 'required',
            'description' => 'required',
            'filePath' => 'required',
        ],[
            'title.required' => 'title is required',
            'company.required' => 'company is required',
            'description.required' => 'description is required',
            'filePath.required' => 'filePath is required'
        ]);

        $fileName = time() . $request->nom . '.' . $request->file('filePath')->extension();
        $request->file('filePath')->move(public_path('img\offers\pdf'),$fileName);

        $off = Offer::create([
            'title' => $request->input('title'),
            'company' => $request->input('company'),
            'description' => $request->input('description'),
            'filePath' => $fileName,
            'status' => "Available",
            //'user_id' => Auth()->user()->id,
        ]);
        $off->users()->attach(Auth()->user()->id);
        return redirect('/offer')->with('success','Offre a été ajouté!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize('show-offer', Offer::class);
        $offer = Offer::find($id);
        return view('offer.show', ['offer' => $offer]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('edit-offer', Offer::class);
        $offer = Offer::find($id);
        return view('offer.edit', ['offer' => $offer]);
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
        $this->authorize('edit-offer', Offer::class);
        $offer = $request->validate([
            'title' => 'required',
            'company' => 'required',
            'description' => 'required',
            'filePath' => 'required',
        ],[
            'title.required' => 'title is required',
            'company.required' => 'company is required',
            'description.required' => 'description is required',
            'filePath.required' => 'filePath is required'
        ]);

        $fileName = time() . $request->nom . '.' . $request->file('filePath')->extension();
        $request->file('filePath')->move(public_path('img\offers\pdf'),$fileName);


        $offer = Offer::find($id);
        $offer->title =$request->title;
        $offer->company =$request->company;
        $offer->description =$request->description;
        $offer->filePath =$fileName;
        $offer->save();
        return redirect('/offer')->with('success','Offer successfully updated!');
    }
    /**
     * Accept the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function accept($id)
    {
        $offer = Offer::find($id);
        $offer->status = "Not Available";
        $offer->save();
        $offer->users()->attach(Auth()->user()->id);
        return redirect('/offer')->with('success','Offer successfully Accepted!');
    }

    /**
     * Refuse the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function refuse($id)
    {
        $offer = Offer::find($id);
        $offer->status = "Available";
        $offer->save();
        $offer->users()->detach(Auth()->user()->id);
        return redirect('/offer')->with('success','Offer successfully Refused!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('destroy-offer', Offer::class);
        Offer::destroy($id);
        return redirect('/offer')->with('success','Offer successfully deleted!');
    }
}
