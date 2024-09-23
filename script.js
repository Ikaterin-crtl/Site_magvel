document.addEventListener('DOMContentLoaded', function() {
    const menuToggle = document.getElementById('menuToggle');
    const navbar = document.getElementById('navbar');

    menuToggle.addEventListener('click', function() {
        navbar.classList.toggle('active');
    });
});


// Feedback de Envio do Formulário
document.querySelector('form').addEventListener('submit', function(event) {
    event.preventDefault();

    const formData = new FormData(this); // Coleta os dados do formulário

    fetch(this.action, {
        method: 'POST',
        body: formData
    })
    .then(response => {
        if (response.ok) {
            alert('Obrigado por entrar em contato! Seu formulário foi enviado.');
            this.reset(); // Limpa o formulário após o envio
        } else {
            alert('Desculpe, houve um erro ao enviar o formulário. Tente novamente.');
        }
    })
    .catch(error => {
        console.error('Erro:', error);
        alert('Desculpe, houve um erro ao enviar o formulário. Tente novamente.');
    });
});

