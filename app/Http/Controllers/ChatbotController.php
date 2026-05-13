<?php

namespace App\Http\Controllers;

use App\Models\Respuesta;
use Illuminate\Http\Request;

class ChatbotController extends Controller
{
    public function index()
    {
        return view('chat.index');
    }

   public function responder(Request $request)
{
    $mensaje = strtolower(trim($request->mensaje));

    $respuestas = [

        [
            'palabras' => [
                'falta',
                'inasistencia',
                'justificar'
            ],

            'respuesta' =>
                'Las inasistencias deben ser justificadas con el docente tutor hasta un máximo de 3 días de inasistencia. 
                Pasados los 3 días las inasistencias deberán ser justificadas con el inspector general.'
        ],

        [
            'palabras' => [
                'atraso',
                'tarde',
                'retraso'
            ],

            'respuesta' =>
                'Dentro del reglamento institucional no existen los atrasos, de existir algún retraso será registrado como inasistencia en la hora correspondiente.'
        ],

        [
            'palabras' => [
                'uniforme',
                'ropa'
            ],

            'respuesta' =>
                'El uniforme debe ser portado de acuerdo con el horario correspondiente, de no cumplirlo se hará un llamado de atención al estudiante.'
        ],

        [
            'palabras' => [
                'tareas',
                'deberes'
            ],

            'respuesta' =>
                'El incumplimiento de tareas será un llamado de atención para el estudiante y se procederá a llamar al representante legal, si la tarea se entrega atrasada se receptará con una calificación máxima de 5/10.'
        ],

        [
            'palabras' => [
                'horario',
                'entrada',
                'salida'
            ],

            'respuesta' =>
                'Los estudiantes deben ser puntuales con el horario establecido por la institución tomando en cuenta que el horario de la jornada matutina es de 7:00 de la mañana a 12:50 de la tarde. 
                Mientras que la jornada vespertina es de 12:50 de la tarde hasta las 6:50 de la tarde.'
        ]
    ];

    foreach ($respuestas as $item)
    {
        foreach ($item['palabras'] as $palabra)
        {
            if (str_contains($mensaje, $palabra))
            {
                return response()->json([
                    'success' => true,

                    'respuesta' =>
                        $item['respuesta']
                ]);
            }
        }
    }

    return response()->json([
        'success' => false,

        'respuesta' =>
            'No encontré información sobre esa consulta.'
    ]);
}
}
