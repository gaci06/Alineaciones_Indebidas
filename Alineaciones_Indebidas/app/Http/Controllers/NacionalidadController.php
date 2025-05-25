<?php
namespace App\Http\Controllers;

use App\Models\Nacionalidad;
use Illuminate\Http\Request;

class NacionalidadController extends Controller
{
    public function index()
    {
        $nacionalidades = Nacionalidad::all();
        return view('nacionalidades.index', compact('nacionalidades'));
    }

    public function create()
    {
        return view('nacionalidades.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required'
        ]);

        Nacionalidad::create($request->all());

        return redirect()->route('nacionalidades.index');
    }

    public function destroy(Nacionalidad $nacionalidad)
    {
        $nacionalidad->delete();
        return redirect()->route('nacionalidades.index');
    }
}
