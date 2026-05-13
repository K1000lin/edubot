@extends('layouts.app')

@section('title', 'EduBot')

@section('content')

<div class="chat-container">

    <!-- HEADER -->

    <div class="chat-header">

        <h3>EduBot 🤖</h3>

        <p>Asistente virtual institucional</p>
        <p>Unidad Educativa 24 de Mayo</p>

    </div>

    <!-- BODY -->

    <div class="chat-body" id="chat-body">

        <div class="message bot">

            <div class="message-content">

                👋 Bienvenido a EduBot.<br>

                Soy el asistente virtual de la institución educativa.<br><br>

                Puedes consultar información sobre:
                <ul>
                    <li>Faltas</li>
                    <li>Atrasos</li>
                    <li>Uniforme</li>
                    <li>Horario</li>
                </ul>

            </div>

        </div>

    </div>

    <!-- FOOTER -->

    <div class="chat-footer">

        <!-- BOTONES RÁPIDOS -->

        <div class="quick-buttons">

            <button class="btn btn-primary btn-sm"
                    onclick="preguntaRapida('¿Cómo justificar faltas?')">

                Faltas

            </button>

            <button class="btn btn-primary btn-sm"
                    onclick="preguntaRapida('¿Qué pasa con los atrasos?')">

                Atrasos

            </button>

            <button class="btn btn-primary btn-sm"
                    onclick="preguntaRapida('¿Qué sucede si no entrega tareas?')">

                Tareas

            </button>

            <button class="btn btn-primary btn-sm"
                    onclick="preguntaRapida('¿El uniforme es obligatorio?')">

                Uniforme

            </button>

        </div>

        <!-- INPUT -->

        <div class="d-flex gap-2">

            <input type="text"
                   id="mensaje"
                   class="form-control"
                   placeholder="Escribe tu mensaje...">

            <button class="btn btn-primary"
                    onclick="enviarMensaje()">

                <i class="bi bi-send-fill"></i>

            </button>

        </div>

    </div>

    <div class="text-center mt-3 text-black">

        <small>
            Powered by Camilo Riera © 2026
        </small>

    </div>

</div>

@endsection