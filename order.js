// order.js

document.getElementById('orderForm').addEventListener('submit', function(event) {
    event.preventDefault();

    const requiredFields = document.querySelectorAll('#orderForm [required]');
    let isValid = true;

    requiredFields.forEach(function(field) {
        if (field.value.trim() === '') {
            isValid = false;
            field.classList.add('is-invalid');
        } else {
            field.classList.remove('is-invalid');
        }
    });

    if (!isValid) {
        showModal('Пожалуйста, заполните все обязательные поля.', false);
        return;
    }

    const emailInput = document.getElementById('email');
    const emailValue = emailInput.value.trim();
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (!emailRegex.test(emailValue)) {
        showModal('Пожалуйста, введите действительный адрес электронной почты.', false);
        emailInput.classList.add('is-invalid');
        emailInput.focus();
        return;
    }

    const formData = {
        firstName: document.getElementById('first-name').value.trim(),
        lastName: document.getElementById('last-name').value.trim(),
        email: emailValue,
        petType: document.getElementById('pet-type').value.trim(),
        address: document.getElementById('address').value.trim(),
    };

    $.ajax({
        type: 'POST',
        url: 'process_order.php', 
        data: formData,
        success: function(response) {
            showModal(response, true);
            document.getElementById('orderForm').reset();
        },
        error: function(xhr, status, error) {
            console.error('Error:', error);
            showModal('An error occurred while processing your order.', false);
        }
    });
    
});

function showModal(message, isSuccess) {
    const modalMessage = document.getElementById('modalMessage');
    const modal = new bootstrap.Modal(document.getElementById('formModal'));

    if (isSuccess) {
        modalMessage.classList.remove('text-danger');
        modalMessage.classList.add('text-success');
    } else {
        modalMessage.classList.remove('text-success');
        modalMessage.classList.add('text-danger');
    }

    modalMessage.textContent = message;
    modal.show();
}
