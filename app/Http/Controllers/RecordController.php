<?php

namespace App\Http\Controllers;

use App\Models\Record;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
        // Validación de los datos de entrada
        $validatedData = $request->validate([
            'nombre_completo' => 'required|string|max:255',
            'edad' => 'required|integer|min:0',
            'sexo' => 'required|string|max:10',
            'grado_estudios' => 'nullable|string|max:255',
            'institucion' => 'required|string|max:255',
            'departamento' => 'nullable|string|max:255',
            'direccion_institucion' => 'nullable|string|max:255',
            'ciudad' => 'nullable|string|max:255',
            'estado' => 'nullable|string|max:255',
            'tipo_institucion' => 'required|string|max:255',
            'telefono_oficina' => 'nullable|string|max:20',
            'celular' => 'nullable|string|max:20',
            'email_institucional' => 'nullable|email|max:255',
            'email_personal' => 'nullable|email|max:255',
            'linea_investigacion' => 'nullable|string|max:255',
            'nivel_educativo' => 'nullable|string|max:255',
            'usuario' => 'required|string|max:255|unique:records,usuario',
            'correo' => 'required|email|max:255|unique:records,correo',
            'contrasena' => 'required|string|min:8',
        ]);

        try {
            // Crear el registro en la base de datos
            Record::create([
                'nombre_completo' => $validatedData['nombre_completo'],
                'edad' => $validatedData['edad'],
                'sexo' => $validatedData['sexo'],
                'grado_estudios' => $validatedData['grado_estudios'],
                'institucion' => $validatedData['institucion'],
                'departamento' => $validatedData['departamento'],
                'direccion_institucion' => $validatedData['direccion_institucion'],
                'ciudad' => $validatedData['ciudad'],
                'estado' => $validatedData['estado'],
                'tipo_institucion' => $validatedData['tipo_institucion'],
                'telefono_oficina' => $validatedData['telefono_oficina'],
                'celular' => $validatedData['celular'],
                'email_institucional' => $validatedData['email_institucional'],
                'email_personal' => $validatedData['email_personal'],
                'linea_investigacion' => $validatedData['linea_investigacion'],
                'nivel_educativo' => $validatedData['nivel_educativo'],
                'usuario' => $validatedData['usuario'],
                'correo' => $validatedData['correo'],
                'contrasena' => Hash::make($validatedData['contrasena']), // Encriptar contraseña
            ]);

            // Redirigir con mensaje de éxito
            return redirect()->route('records.index')->with('success', 'Registro creado exitosamente.');

        } catch (\Exception $e) {
            // Manejo de errores
            return back()->withErrors(['error' => 'Ocurrió un error al guardar el registro: ' . $e->getMessage()]);
        }
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
        $record = Record::findOrFail($id);

        $validatedData = $request->validate([
            'nombre_completo' => 'required|string|max:255',
            'edad' => 'required|integer|min:0',
            'sexo' => 'required|string|max:10',
            'correo' => 'required|email|max:255|unique:records,correo,' . $id,
            'usuario' => 'required|string|max:255|unique:records,usuario,' . $id,
        ]);

        try {
            $record->update($validatedData);
            return redirect()->route('records.index')->with('success', 'Registro actualizado exitosamente.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Ocurrió un error al actualizar el registro: ' . $e->getMessage()]);
        }
    }

    // Elimina un registro
    public function destroy($id)
    {
        try {
            $record = Record::findOrFail($id);
            $record->delete();

            return redirect()->route('records.index')->with('success', 'Registro eliminado exitosamente.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Ocurrió un error al eliminar el registro: ' . $e->getMessage()]);
        }
    }
}
