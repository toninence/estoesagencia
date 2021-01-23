var idEliminar;
var idEditar;
const popovers = () => {
  var popoverTriggerList = [].slice.call(
    document.querySelectorAll('[data-bs-toggle="popover"]')
  );
  var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
    return new bootstrap.Popover(popoverTriggerEl);
  });
};

window.onload = function () {
  popovers();
};

const editProject = (data) => {
  const openModal = document.getElementById("trigerExampleModal");
  document.getElementById("projectName").value = data.name;
  document.getElementById("description").value = data.description;
  document.getElementById("projectManager").value = data.pmId;
  document.getElementById("assignedTo").value = data.devId;
  document.getElementById("status").value = data.status;
  openModal.click();
  idEditar = data.id;
};

const modalDelete = (id) => {
  const openModal = document.getElementById("trigerModalEliminar");
  openModal.click();
  idEliminar = id;
};

const deleteProject = () => {
  const myModalEl = document.getElementById("modalEliminar");
  const modal = bootstrap.Modal.getInstance(myModalEl);
  axios({
    method: "post",
    headers: {
      "X-Requested-With": "XMLHttpRequest",
    },
    url: `projects/deleteProject/${idEliminar}`,
  })
    .then((response) => {
      const { data } = response;
      console.log(data);
      // console.log("respuesta: ", response.data);
      if (data.type === "error") {
        console.log(data);
      } else {
        modal.hide();
      }
    })
    .catch((error) => console.log(error));
};

const addProject = () => {
  const myModalEl = document.getElementById("exampleModal");
  const modal = bootstrap.Modal.getInstance(myModalEl);
  const formulario = document.getElementById("formulario");
  const formData = new FormData(formulario);
  if (idEditar) {
    formData.append('projectId', idEditar)
  }
  axios({
    method: "post",
    headers: {
      "X-Requested-With": "XMLHttpRequest",
    },
    url: "projects/postProject",
    data: formData,
  })
    .then((response) => {
      idEditar = null;
      const { data } = response;
      console.log("respuesta: ", response.data);
      if (data.type === "error") {
        document.getElementById("projectName").classList.add("is-invalid");
        document.getElementById("projectName-invalid").innerText =
          data.msgs.name;
      } else {
        modal.hide();
      }
    })
    .catch((error) => console.log(error));
};
