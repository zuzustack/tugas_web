<section class="bg-primary h-full w-full section">
    <div class="d-flex">
        <div>
            <?php include_once __DIR__ . "/../partials/sidebar_login.php" ?>    
        </div>
        <div class="text-white w-100 main-section">
            <h5 class="mb-3">Admin</h5>
            <button class="d-block btn-modal btn-black btn text-white mb-2 ms-auto" data-target-modal="createModal">Create</button>
            <table class="table-1 text-black bg-white px-1-py-1">
                <thead>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Photo</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <?php foreach ($users as $index => $user) : ?>
                        <tr>
                            <td style="vertical-align: middle;" ><?= ($currentPage - 1) * 5 + ($index + 1)?></td>
                            <td style="vertical-align: middle;" ><?= $user['name'] ?></td>
                            <td style="vertical-align: middle;" ><?= $user['username'] ?></td>
                            <td>
                                <img src="<?= $user['photo'] ?? "./assets/img/guest.png" ?>" width="50px">
                            </td>
                            <td style="vertical-align: middle;">
                                <button class="btn btn-modalDetail btn-outline-black text-black hover-text-white" data-id="<?= $user['id'] ?>" data-username="<?= $user['username'] ?>" data-photo="<?= $user['photo'] ?>" data-name="<?= $user['name'] ?>" data-target-modal="editModal">
                                    Edit
                                </button>

                                <button class="btn btn-modalDetail btn-outline-black text-black hover-text-white" data-id="<?= $user['id'] ?>"  data-target-modal="deleteModal">
                                    Delete
                                </button>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>

            
            <pagination data-totalPage="<?= $totalPage ?>" data-maxItem="5" data-currentPage="<?= $currentPage ?>" class="mt-3 mb-4">
            </pagination>
        </div>
    </div>


    <div id="createModal" class="modal">
        <div class="modal-dialog">
            <h6>Create</h6>
            <hr>
            <form action="/?admin-create" method="post" autocomplete="off" enctype="multipart/form-data">
                <div class="d-flex">
                    <div class="me-2">
                        <div class="mb-2">
                            <p>Name</p>
                            <input class="form-control" type="text" name="name">
                        </div>
                        <div class="mb-2">
                            <p>Username</p>
                            <input class="form-control" type="text" name="username">
                        </div>
                        <div class="mb-2">
                            <p>Photo Profile</p>
                            <input data-target-preview="previewImgCreate" class="form-controll photoInput" type="file" name="photo">
                        </div>
                    </div>
                    <div>
                        <p>Preview</p>
                        <img id="previewImgCreate" width="80px" src="#" alt="">
                    </div>
                </div>



                <div class="w-auto d-flex">
                    <button data-target-modal="createModal" class="modal-close d-block btn btn-outline-black hover-text-white ms-auto">Cancel</button>
                    <button type="submit" class="btn btn-outline-success hover-text-white">Submit</button>
                </div>
            </form>
        </div>
    </div>


    <div id="editModal" class="modal">
        <div class="modal-dialog">
            <h6>Edit</h6>
            <hr>
            <form action="/?admin-edit" method="post" autocomplete="off" enctype="multipart/form-data">
                <input type="hidden" name="id" id="id">

                <div class="d-flex">
                    <div class="me-2">
                        <div class="mb-2">
                            <p>Name</p>
                            <input id="name" class="form-control" type="text" name="name">
                        </div>
                        <div class="mb-2">
                            <p>Username</p>
                            <input id="username" class="form-control" type="text" name="username">
                        </div>
                        <div class="mb-2">
                            <p>Password</p>
                            <input id="Password" class="form-control" type="text" name="password">
                        </div>
                        <div class="mb-2">
                            <p>Photo Profile</p>
                            <input data-target-preview="photo" class="form-controll photoInput" type="file" name="photo">
                        </div>
                    </div>
                    <div>
                        <p>Preview</p>
                        <img id="photo" width="80px" src="#" alt="">
                    </div>
                </div>



                <div class="w-auto d-flex">
                    <button data-target-modal="editModal" class="modal-close d-block btn btn-outline-black hover-text-white ms-auto">Cancel</button>
                    <button type="submit" class="btn btn-outline-success hover-text-white">Submit</button>
                </div>
            </form>
        </div>
    </div>


    <div id="deleteModal" class="modal">
        <div class="modal-dialog">
            <h6>Delete</h6>
            <hr>
            <form action="/?admin-delete" method="post" autocomplete="off" enctype="multipart/form-data">
                <input type="hidden" name="id" id="id">

                <div class="mb-3 mt-2">
                    <label>Apakah Anda Yaking ingin menghapus data ini?</label>
                </div>

                <div class="w-auto d-flex">
                    <div class="w-auto d-flex">
                        <button data-target-modal="deleteModal" class="modal-close d-block btn btn-outline-black hover-text-white ms-auto">Cancel</button>
                        <button type="submit" class="btn btn-outline-danger hover-text-white">Delete</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</section>