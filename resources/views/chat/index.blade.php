<!DOCTYPE html>
<html lang="es">
<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token"
          content="{{ csrf_token() }}">

    <title>EduBot</title>

    <link rel="stylesheet"
          href="{{ asset('css/style.css') }}">

</head>
<body>

<div class="chat-container">

    <h1>EduBot 🤖</h1>

    <div class="messages"
         id="messages"></div>

    <input type="text"
           id="mensaje"
           placeholder="Escribe tu pregunta">

    <button onclick="enviarMensaje()">
        Enviar
    </button>

</div>

<script src="{{ asset('js/chat.js') }}"></script>

</body>
</html>