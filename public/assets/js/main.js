const cvs = document.getElementById('cvs');

if (cvs) {
    cvs.addEventListener('click', e => {
        if (e.target.className === 'btn btn-danger reject-article') {
            if (confirm('Are you sure?')) {
                const id = e.target.getAttribute('data-id');

                fetch(`/home/reject/${id}`, {
                    method: 'POST'
                }).then(res => window.location.reload());
            }
        }

        if (e.target.className === 'btn btn-success accept-article') {
            if (confirm('Are you sure?')) {
                const id = e.target.getAttribute('data-id');

                fetch(`/home/accept/${id}`, {
                    method: 'POST'
                }).then(res => window.location.reload());
            }
        }

        if (e.target.className === 'btn btn-success activate-article') {
            if (confirm('Are you sure?')) {
                const id = e.target.getAttribute('data-id');

                fetch(`/home/active/${id}`, {
                    method: 'POST'
                }).then(res => window.location.reload());
            }
        }
    });
}

var active = document.getElementById("active");
var accepted = document.getElementById("accepted");
var rejected = document.getElementById("rejected");

function showActive() {
    active.style.display = "block";
    accepted.style.display = "none";
    rejected.style.display = "none";
}

function showAccepted() {
    active.style.display = "none";
    accepted.style.display = "block";
    rejected.style.display = "none";
}

function showRejected() {
    active.style.display = "none";
    accepted.style.display = "none";
    rejected.style.display = "block";

}