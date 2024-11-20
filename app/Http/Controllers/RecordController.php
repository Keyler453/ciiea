<?php

namespace App\Http\Controllers;

use App\Models\Record;
use Illuminate\Http\Request;

class RecordController extends Controller
{
    // Muestra una lista de registros
    public function index()
    {
        $records = Record::all();
        return view('records.index', compact('records'));
    }

    // Muestra el formulario para crear un nuevo registro
    public function create()
    {
        return view('records.create');
    }

    // Almacena un nuevo registro en la base de datos
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre_completo' => 'required|string|max:255',
            'edad' => 'required|integer|min:0',
            'sexo' => 'required|string',
            'grado_estudios' => 'nullable|string|max:255',
            'institucion' => 'required|string|max:255',
            'departamento' => 'nullable|string|max:255',
            'direccion_institucion' => 'nullable|string|max:255',
            'ciudad' => 'nullable|string|max:255',
            'estado' => 'nullable|string|max:255',
            'tipo_institucion' => 'required|string',
            'telefono_oficina' => 'nullable|string|max:20',
            'celular' => 'nullable|string|max:20',
            'email_institucional' => 'nullable|email|max:255',
            'email_personal' => 'nullable|email|max:255',
            'linea_investigacion' => 'nullable|string|max:255',
            'nivel_educativo' => 'nullable|string|max:255',
            'usuario' => 'required|string|max:255',
            'correo' => 'required|email|max:255',
            'contrasena' => 'required|string|min:8',
        ]);
        

        Record::create($validatedData);

        return redirect()->route('records.index')->with('success', 'Registro creado exitosamente.');
    }

    // Muestra un registro específico
    public function show($id)
    {
        $record = Record::findOrFail($id);
        return view('records.show', compact('record'));
    }

    // Muestra el formulario para editar un registro existente
    public function edit($id)
    {
        $record = Record::findOrFail($id);
        return view('records.edit', compact('record'));
    }

    // Actualiza un registro existente
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            // Reglas de validación (pueden ser similares al método store)
        ]);

        $record = Record::findOrFail($id);
        $record->update($validatedData);

        return redirect()->route('records.index')->with('success', 'Registro actualizado exitosamente.');
    }

    // Elimina un registro
    public function destroy($id)
    {
        $record = Record::findOrFail($id);
        $record->delete();

        return redirect()->route('records.index')->with('success', 'Registro eliminado exitosamente.');
    }
}
