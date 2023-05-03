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
                    <th>Play</th>
                    <th>Action</th>
                    <th id="musicPLay">
                        
                    </th>
                </thead>
                <tbody>
                    <?php foreach ($songs as $index => $song) : ?>
                        <tr>
                            <td style="vertical-align: middle;"><?= ($currentPage - 1) * 5 + ($index + 1)?></td>
                            <td style="vertical-align: middle;"><?= $song['name'] ?></td>
                            <td style="vertical-align: middle;">
                                <!-- play lagu -->
                                <playsong data-path="<?= $song['path']?>" data-play="0"></playsong>
                            </td>
                            <td>
                                <button class="btn btn-modalDetail btn-outline-black text-black hover-text-white" data-id="<?= $song['id'] ?>" data-name="<?= $song['name'] ?>" data-song="<?= $song['path'] ?>" data-target-modal="editModal">
                                    Edit
                                </button>
                                <button class="btn btn-modalDetail btn-outline-black text-black hover-text-white" data-id="<?= $song['id'] ?>"  data-target-modal="deleteModal">
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
            <form action="/?songs-create" method="post" autocomplete="off" enctype="multipart/form-data">
                <div class="d-flex">
                    <div class="me-2">
                        <div class="mb-2">
                            <p>Name</p>
                            <input class="form-control" type="text" name="name">
                        </div>
                        <div class="mb-2">
                            <p>Upload Lagu</p>
                            <input data-target-preview="previewImgCreate" class="form-controll photoInput" type="file" name="music">
                        </div>
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
            <form action="/?songs-edit" method="post" autocomplete="off" enctype="multipart/form-data">
                <input type="hidden" name="id" id="id">
                <div class="d-flex">
                    <div class="me-2">
                        <div class="mb-2">
                            <p>Name</p>
                            <input id="name" class="form-control" type="text" name="name">
                        </div>
                        <div class="mb-2">
                            <p>Upload Lagu</p>
                            <input data-target-preview="previewImgCreate" class="form-controll photoInput" type="file" name="music">
                        </div>
                        <div class="mb-2" id="musicPath">
                            
                        </div>
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
            <form action="/?songs-delete" method="post" autocomplete="off" enctype="multipart/form-data">
                <input type="hidden" name="id" id="id">

                <div class="mb-3 mt-2">
                    <label>Apakah Anda Yaking ingin menghapus Lagu ini?</label>
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