let dlt = document.querySelectorAll('.delete');
let dlt_yes = document.querySelector('#dlt_yes');

for (let btn of dlt) {
    btn.addEventListener('click', function () {
        let id = this.id;
        let img = this.getAttribute('pic');
        dlt_yes.setAttribute('href', `delete.php?id=${id}&img=${img}`);
    });
}