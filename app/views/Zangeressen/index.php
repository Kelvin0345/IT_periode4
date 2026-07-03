<?php require_once APPROOT . '/views/includes/header.php'; ?>

<div class="container">
    <div class="row mt-3 d-flex justify-content-center">
        <div class="col-10">
            <h3><?php echo $data['title']; ?></h3>
        </div>
    </div>


    <div class="row mt-3 d-flex justify-content-center">
        <div class="col-10 text-begin text-danger">
            <a href="<?= URLROOT; ?>/ZangeressenController/create" class="btn btn-warning" role="button">Nieuwe zangeres
            </a>
        </div>
    </div>

    <div class="row mt-3 d-flex justify-content-center">

        <div class="col-10">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Naam</th>
                        <th>Vermogen</th>
                        <th>Land</th>
                        <th>Leeftijd</th>
                        <th>Bekendste Nummer</th>
                        <th>Debuutjaar</th>
                        <th>Wijzig</th>
                        <th>Verwijder</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['result'] as $zangeres): ?>
                        <tr>
                            <td><?= $zangeres->Naam; ?></td>
                            <td><?= $zangeres->Vermogen; ?></td>
                            <td><?= $zangeres->Land; ?></td>
                            <td><?= $zangeres->Leeftijd; ?></td>
                            <td><?= $zangeres->BekendsteNummer; ?></td>
                            <td><?= $zangeres->Debuutjaar; ?></td>
                            <td class="text-center">
                                <a href="<?= URLROOT; ?>/ZangeressenController/update/<?= $zangeres->Id; ?>">
                                    <i class="bi bi-pencil-fill text-success"></i>
                                </a>
                            </td>
                            <td class="text-center">
                                <a href="<?= URLROOT; ?>/ZangeressenController/delete/<?= $zangeres->Id; ?>"
                                    onclick="return confirm('Weet je zeker dat je dit record wilt verwijderen?');">
                                    <i class="bi bi-trash3-fill text-danger"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            
            <div class="d-flex justify-content-center mt-3 mb-5">
                <a href="<?= URLROOT; ?>/homepages/index" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> Terug naar homepage
                </a>
            </div>

        </div>

    </div>
</div>
<?php require_once APPROOT . '/views/includes/footer.php'; ?>