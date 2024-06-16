function ajax(method, url, data, callback) {
    const xhr = new XMLHttpRequest();
    xhr.open(method, url, true);

    if (data && method.toUpperCase() === 'POST') {
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.setRequestHeader('X-CSRF-TOKEN', data.get('_token'));
    }

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                callback(xhr.responseText);
            } else {
                callback(new Error(`Request failed with status: ${xhr.status}`));
            }
        }
    };

    if (data) {
        xhr.send(new URLSearchParams(data).toString());
    } else {
        xhr.send();
    }
}

document.addEventListener('DOMContentLoaded', () => {
    const urlParams = new URLSearchParams(window.location.search);
    const form = document.querySelector('form');

    form.addEventListener('submit', e => {
        e.preventDefault();
        const formData = new FormData(form);
        ajax("POST", form.action, formData, function (response) {
            let errorNode = document.querySelector('.error');
            let errorText = document.querySelector('.error h1');
            response = JSON.parse(response);
            if (response.success) {
                errorNode.classList.remove('hidden');
                errorNode.classList.replace('bg-rose-700', 'bg-green-600');
                errorNode.classList.add('flex');

                errorText.innerText = 'Login Successfull!';

                // Check if the 'redir' parameter exists
                if (urlParams.has('redir')) {
                    window.location.replace(urlParams.get('redir'));
                } else {
                    window.location.replace('/admin');
                }



            } else {
                errorNode.classList.remove('hidden');
                errorNode.classList.add('flex');
                errorText.innerText = response.error;
            }
        });
    });
    document.onkeyup = e => {
        if (e.key == 'Enter') {
            form.submit();
        }
    };

});

