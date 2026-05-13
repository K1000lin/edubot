async function enviarMensaje()
{
    let input = document.getElementById('mensaje');

    let mensaje = input.value;

    let messages = document.getElementById('messages');

    messages.innerHTML += `
        <p><b>Tú:</b> ${mensaje}</p>
    `;

    let response = await fetch('/chatbot/responder', {

        method: 'POST',

        headers: {
            'Content-Type': 'application/json',

            'X-CSRF-TOKEN':
                document.querySelector('meta[name="csrf-token"]').content
        },

        body: JSON.stringify({
            mensaje: mensaje
        })
    });

    let data = await response.json();

    messages.innerHTML += `
        <p><b>EduBot:</b> ${data.respuesta}</p>
    `;

    input.value = '';
}