<section class="bg-primary h-full w-full section">
    <div class="d-flex bg-white mb-3">
        <div class="title-nav px-3 py-2">
            <h6>
                <a class="text-black d-block" href="/?dashboard">Discover</a>
            </h6>
        </div>
        <div class="me-auto d-flex">
            <a class="text-black d-block px-1 py-3" href="/?profile">Profile</a>
        </div>
    </div>
    <div class="d-flex">
        <div class="text-white w-100 main-section">
            <table class="table-1 text-black bg-white px-1-py-1">
                <thead>
                    <th>Nama</th>
                    <th>Play</th>
                </thead>
                <tbody>
                    <?php foreach ($songs as $index => $song) : ?>
                        <tr>
                            <td style="vertical-align: middle;"><?= $song['name'] ?></td>
                            <td style="vertical-align: middle;">
                                <!-- play lagu -->
                                <playsong id="<?= $index ?>" data-path="<?= $song['path']?>" data-judul="<?= $song['name'] ?>"  data-play="0"></playsong>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</section>


