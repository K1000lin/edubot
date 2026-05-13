const inputMensaje = document.getElementById('mensaje');

inputMensaje.addEventListener('keypress', function(event)
{
    if(event.key === 'Enter')
    {
        enviarMensaje();
    }
});

async function enviarMensaje()
{
    let mensaje = inputMensaje.value.trim();

    if(mensaje === '')
    {
        return;
    }

    agregarMensaje(mensaje, 'user');

    inputMensaje.value = '';

    mostrarEscribiendo();

    try
    {
        let response = await fetch('/chatbot/responder',
        {
            method: 'POST',

            headers:
            {
                'Content-Type': 'application/json',

                'X-CSRF-TOKEN': document
                    .querySelector('meta[name="csrf-token"]')
                    .getAttribute('content')
            },

            body: JSON.stringify({
                mensaje: mensaje
            })
        });

        let data = await response.json();

        quitarEscribiendo();

        setTimeout(() =>
        {
            agregarMensaje(data.respuesta, 'bot');

        }, 400);
    }
    catch(error)
    {
        quitarEscribiendo();

        agregarMensaje(
            'Ocurrió un error al conectar con EduBot.',
            'bot'
        );
    }
}

function agregarMensaje(texto, tipo)
{
    let chatBody = document.getElementById('chat-body');

    let hora = obtenerHora();

    chatBody.innerHTML += `
        <div class="message ${tipo}">

            <div>

                <div class="message-content">
                    ${texto}
                </div>

                <small class="message-time">
                    ${hora}
                </small>

            </div>

        </div>
    `;

    chatBody.scrollTop = chatBody.scrollHeight;
}

function mostrarEscribiendo()
{
    let chatBody = document.getElementById('chat-body');

    chatBody.innerHTML += `
        <div class="message bot"
             id="escribiendo">

            <div class="message-content">

                ⏳ EduBot está escribiendo...

            </div>

        </div>
    `;

    chatBody.scrollTop = chatBody.scrollHeight;
}

function quitarEscribiendo()
{
    let escribiendo = document.getElementById('escribiendo');

    if(escribiendo)
    {
        escribiendo.remove();
    }
}

function preguntaRapida(texto)
{
    inputMensaje.value = texto;

    enviarMensaje();
}

function obtenerHora()
{
    let fecha = new Date();

    return fecha.toLocaleTimeString([], {
        hour: '2-digit',
        minute: '2-digit'
    });
}