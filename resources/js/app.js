const { remove } = require('lodash');

require('./bootstrap');

window.addEventListener("DOMContentLoaded", () => {
  if (document.querySelector(".form-delete")) {
    formToDelete = document.querySelector(".form-delete")
    formToDelete.addEventListener("submit", (e) => {
      if (!confirm("Sicuro di voler eliminare questo post? L'operazione sarà irreversibile.")) {
        e.preventDefault();
      }
    })
  }

  if (document.querySelector(".alert-success")) {
    closeBtn = document.getElementById("closeBtn");

    closeBtn.addEventListener("click", () => {
      document.querySelector(".alert-success").outerHTML = "";
    })
  }
})