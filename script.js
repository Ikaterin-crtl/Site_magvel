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
    // Aqui você pode adicionar código para enviar o formulário via AJAX, se necessário
    alert('Obrigado por entrar em contato! Seu formulário foi enviado.');
  });
  