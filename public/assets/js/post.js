const form = document.getElementById('formElem');

if (form) {
    form.addEventListener('click', e => {
        if (e.target.className === 'btn btn-blue text-center') {
                const id = e.target.getAttribute('data-id');

                fetch(`/offer/send/${id}`, {
                    method: 'POST',
                    body: new FormData(form)
                }).then(res => location.reload());
                document.getElementById("formElem").reset();
                
        }
        });
    
    }

