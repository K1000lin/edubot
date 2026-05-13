<!DOCTYPE html>
<html lang="es">
<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token"
          content="{{ csrf_token() }}">

    <title>EduBot</title>

    <style>

        body{
            background:#0f172a;
            color:white;
            font-family:Arial;
        }

        .chat-container{
            width:400px;
            margin:50px auto;
            background:#1e293b;
            padding:20px;
            border-radius:15px;
        }

        .messages{
            height:300px;
            overflow-y:auto;
            margin-bottom:15px;
            background:#334155;
            padding:10px;
            border-radius:10px;
        }

        input{
            width:100%;
            padding:10px;
            border:none;
            border-radius:10px;
            margin-bottom:10px;
        }

        button{
            width:100%;
            padding:10px;
            border:none;
            border-radius:10px;
            background:#38bdf8;
            color:white;
            cursor:pointer;
        }

    </style>

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

<script>

async function enviarMensaje()
{
    let input =
        document.getElementById('mensaje');

    let mensaje = input.value;

    let messages =
        document.getElementById('messages');

    messages.innerHTML += `
        <p><b>Tú:</b> ${mensaje}</p>
    `;

    try
    {
        let response = await fetch(
            '/chatbot/responder',
            {
                method: 'POST',

                headers: {
                    'Content-Type':
                        'application/json',

                    'Accept':
                        'application/json',

                    'X-CSRF-TOKEN':
                        document.querySelector(
                            'meta[name="csrf-token"]'
                        ).content
                },

                body: JSON.stringify({
                    mensaje: mensaje
                })
            }
        );

        let data = await response.json();

        messages.innerHTML += `
            <p><b>EduBot:</b>
            ${data.respuesta}</p>
        `;
    }
    catch(error)
    {
        messages.innerHTML += `
            <p>
                <b>Error:</b>
                No se pudo conectar con EduBot
            </p>
        `;
    }

    input.value = '';
}

</script>

</body>
</html>