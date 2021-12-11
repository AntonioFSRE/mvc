const wls = document.getElementById('wls');

if (wls) {
    wls.addEventListener('click', e => {
        if (e.target.className === 'btn btn-danger edit-product') {
            if (confirm('Are you sure?')) {
                const id = e.target.getAttribute('data-id');

                fetch(`/welcome/editproduct/${id}`, {
                    method: 'GET'
                }).then(res => window.location.reload());
            }
        }


        if (e.target.className === 'btn btn-success sold-product') {
            if (confirm('Are you sure?')) {
                const id = e.target.getAttribute('data-id');

                fetch(`/welcome/soldproduct/${id}`, {
                    method: 'POST'
                }).then(res => window.location.reload());
            }
        }

        if (e.target.className === 'btn btn-success activate-product') {
            if (confirm('Are you sure?')) {
                const id = e.target.getAttribute('data-id');

                fetch(`/welcome/activeproduct/${id}`, {
                    method: 'POST'
                }).then(res => window.location.reload());
            }
        }
    });
}

var active = document.getElementById("active");
var sold = document.getElementById("sold");

function showActive() {
    active.style.display = "block";
    sold.style.display = "none";
}

function showSold() {
    active.style.display = "none";
    sold.style.display = "block";
}