require('./bootstrap');

window.addEventListener("DOMContentLoaded", () => {
  $formToDelete = document.querySelector(".form-delete")
  $formToDelete.addEventListener("submit", (e) => {
    if (!confirm("Sicuro di voler eliminare questo post? L'operazione sarà irreversibile.")) {
      e.preventDefault();
    }
  })
})