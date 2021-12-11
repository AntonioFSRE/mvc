const usrs = document.getElementById('usrs');

if (usrs) {
    usrs.addEventListener('click', e => {
        if (e.target.className === 'btn btn-danger delete-user') {
            if (confirm('Are you sure?')) {
                const id = e.target.getAttribute('data-id');

                fetch(`/listuser/deleteuser/${id}`, {
                    method: 'POST'
                }).then(res => window.location.reload());
            }
        }
    });
}

var admin = document.getElementById("admin");
var user = document.getElementById("user");

function showAdmin() {
    admin.style.display = "block";
    user.style.display = "none";
}

function showUser() {
    user.style.display = "block";
    admin.style.display = "none";
}


