const form = document.getElementById("prodformElem");

form.onsubmit = async (e) => {
    e.preventDefault();
    let response = await fetch('/upload', {
        method: 'POST',
        body: new FormData(form)
    });

    let result = await response.json();
    window.location.reload();
};