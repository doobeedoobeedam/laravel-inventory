setTimeout(() => {
    const alert = document.getElementById("alert");
    if (alert) {
        alert.style.transition = "opacity 0.5s ease";
        alert.style.opacity = "0";
        setTimeout(() => {
            alert.remove();
        }, 300);
    }
}, 4000);

function dismissAlert() {
    const alert = document.getElementById('alert');
    if (alert) {
        alert.style.opacity = '0';
        setTimeout(() => {
            alert.style.display = 'none';
        }, 300);
    }
}