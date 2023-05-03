<section class="bg-primary h-full w-full section">
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
                                <playsong id="<?= $song['id'] ?>" data-path="<?= $song['path']?>" data-judul="<?= $song['name'] ?>"  data-play="0"></playsong>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
