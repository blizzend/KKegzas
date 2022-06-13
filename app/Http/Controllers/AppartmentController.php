<?php

namespace App\Http\Controllers;

use App\Models\Appartment;
use Illuminate\Http\Request;
use Request as GlobalRequest;

class AppartmentController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'])->except(['index', 'viewFile']);
    }
    public function index() {
        $appartments = Appartment::all();
        return view('Appartments', compact('appartments'));
    }
    public function addFile() {
        return view('addFile');
    }
    
    public function view() {
        $appartments = Appartment::all();
        return view('butai', compact('appartments'));
    }
    public function viewFile(Appartment $appartment) {
        return view('butas', compact('appartment'));
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'Miestas' => 'required|max:50',
            'Adresas' => 'required|max:255',
            'Description' => 'required',
            'Plotas' => 'required|Integer',
            'Kaina' => 'required',
            'image' => 'file|required|max:10000000|mimes:png,jpg,jpeg'
        ]);
        $image = $request->file('image');
        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('images');
        $image->move($destinationPath, $input['imagename']);
        Appartment::create([
            'Miestas' => request('Miestas'),
            'Adresas' => request('Adresas'),
            'Description' => request('Description'),
            'Plotas' => request('Plotas'),
            'Kaina' => request('Kaina'),
            'Owner' => 1,
            'Img' => '/images/' . $input['imagename']
        ]);
        return redirect('/');
    }
    public function editFile($id) {
        $appartment = Appartment::where('id', $id)->firstOrFail();


        return view('editFile', compact('appartment'));
    }
    public function edit( Request $request, $id) {
        $validated = $request->validate([
            'Miestas' => 'required|max:50',
            'Adresas' => 'required|max:255',
            'Description' => 'required',
            'Plotas' => 'required',
            'Kaina' => 'required',
            'image' => 'file|max:10000000|mimes:png,jpg,jpeg'
        ]);
        $image = $request->file('image');
        
        if ($image !== null) {
            $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('images');
            $image->move($destinationPath, $input['imagename']);
            $appartment = Appartment::where('id', $id)->firstOrFail();
            $appartment->Img = '/images/' . $input['imagename'];
        }

        $appartment->Miestas = request('Miestas');
        $appartment->Adresas = request('Adresas');
        $appartment->Description = request('Description');
        $appartment->Plotas = request('Plotas');
        $appartment->Kaina = request('Kaina');
        $appartment->save();
        return redirect('/');
    }
    public function deleteFile($id) {
        $appartment = Appartment::where('id', $id)->firstOrFail();

        return view('deleteFile', compact('appartment'));
    }
    public function delete($id) {
        $appartment = Appartment::where('id', $id)->firstOrFail();
        $appartment->delete();

        return redirect('/');
    }
    public function search() {
        $appartments = Appartment::where('Miestas', 'LIKE', '%'.$_GET['query'].'%')->get();

        return view('butai', compact('appartments'));
    }
}
