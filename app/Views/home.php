<?php $this->extend("layouts/general"); ?>
<?php $this->section('contenido'); ?>
<div class="bg-white">
    <div class="container-fluid" style="height: 60px;">
        <div class="col-md-12">
            <div>
                <h5>Logo</h5>
            </div>
        </div>

    </div>
    <hr class="dropdown-divider">
    <div class="container-fluid d-flex">
        <div class="col-md-6 d-flex flex-row justify-content-start align-items-center" style="height: 60px;">
            <div>
                <h4>My projects</h4>
            </div>
        </div>
        <div class="col-md-6 d-flex flex-row justify-content-end align-items-center">
            <div><button onclick="cleanUp(true)" id='trigerExampleModal' type="button" class="btn btn-lg btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">+ Add project</button></div>
            <button style="display: none;" id='trigerEditExampleModal' type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"></button>
        </div>
    </div>

</div>

<div class="container px-0 mt-5 bg-white">
    <table class="table table-borderless rounded-3">
        <thead>
            <tr class='border-bottom'>
                <td>Project info</td>
                <td>Project manager</td>
                <td>Assigned to</td>
                <td>Status</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($projects as $project) :
                $data = json_encode($project);
                echo "<tr class='border-bottom'>
                <td><p class='fs-4'>$project->name</p>
                <p class='fs-6'>$project->description</p></td>
                <td><img src='$project->pmImg' class='mr-2 rounded-circle avatar' /> $project->projectManager</td>
                <td><img src='$project->devImg' class='mr-2 rounded-circle avatar' />$project->developer</td>
                <td>$project->status</td>
                <td>
                <button type='button' class='btn btn-default' onclick='editProject($data)'>
                <i class='bi bi-pencil-square'></i>
                Editar
                </button><br/>
                <button type='button' class='btn btn-default' onclick='modalDelete($project->id)'>
                <i class='bi bi-trash'></i>
                Eliminar
                </button></td>
                </tr>";
            endforeach;
            ?>

        </tbody>
    </table>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <!-- Formulario agregar proyecto -->
                <form id='formulario'>
                    <div class="mb-3">
                        <label for="projectName" class="form-label">Project Name</label>
                        <input type="text" class="form-control" name="projectName" id="projectName" aria-describedby="emailHelp">
                        <div class="invalid-feedback">
                            <p id='projectName-invalid'></p>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">description</label>
                        <input type="text" class="form-control" name="description" id="description">
                    </div>
                    <div class="mb-3">
                        <label for="projectManager" class="form-label">Project Manager</label>
                        <select class="form-control" name="projectManager" id='projectManager' aria-label="Default select example">
                            <?php foreach ($pm as $pm) : ?>
                                <option value="<?php echo $pm->id ?>">
                                    <?php echo $pm->name . " " . $pm->surname ?>
                                </option>";
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="assignedTo" class="form-label">Assigned to</label>
                        <select class="form-control" name="assignedTo" id='assignedTo' aria-label="Default select example">
                            <?php foreach ($dev as $dev) : ?>
                                <option value="<?php echo $dev->id ?>">
                                    <?php echo $dev->name . " " . $dev->surname ?>
                                </option>";
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-control" name="status" id='status' aria-label="Default select example">
                            <option value="Enabled" selected>Enabled</option>
                            <option value="Disabled">Disabled</option>
                        </select>
                    </div>
                    <button type="button" class="btn btn-danger" onclick="addProject()">Create Project</button>
                    </>
                    <!-- Fin formulario -->
            </div>
        </div>
    </div>
</div>
<!-- Endo modal -->
<!-- Modal Eliminar -->
<!-- Boton -->
<button style="display: none" id='trigerModalEliminar' type="button" data-bs-toggle="modal" data-bs-target="#modalEliminar"></button>
<!--  -->
<div class="modal fade" id="modalEliminar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Realmente desea eliminar el registro?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
        <button type="button" class="btn btn-primary" onclick="deleteProject()">Si</button>
      </div>
    </div>
  </div>
</div>

<!--  -->
<?php $this->endSection(); ?>