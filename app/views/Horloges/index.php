<?php require_once APPROOT . '/views/includes/header.php'; ?>

<!-- voor centreren bootstrap -->
<div class="container">
    <div class="row mt-3 d-flex justify-content-center">
        <div class="col-10">
            <h3><?php echo $data['title']; ?></h3>
        </div>
    </div>


    <div class="row-mt-3 d-flex justify-content-center">
        <div class="col-10 text-begin text-danger">
        <a href="<?= URLROOT; ?>/HorlogesController/create"
            class="btn btn-warning"
            Role="button">Nieuwe Horloge
        </a>
        </div>

    </div>


    <div class="row mt-3 d-flex justify-content-center">

        <div class="col-10">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Merk</th>
                        <th>Model</th>
                        <th>Prijs</th>
                        <TH>Materiaal</TH>
                        <TH>Gewicht</TH>
                        <TH>Releasedatum</TH>
                        <TH>Waterdichtheid(M)</TH>
                        <TH>HorlogeType</TH>
                        <th>Wijzig</th>
                        <th>Verwijder</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data['result'] as $Horloges) : ?>
                        <tr>
                            <td><?= $Horloges->Merk; ?></td>
                            <td><?= $Horloges->Model; ?></td>
                            <td><?= $Horloges->Prijs; ?></td>
                            <td><?= $Horloges->Materiaal; ?></td>
                            <td><?= $Horloges->Gewicht; ?></td>
                            <td><?= $Horloges->Releasedatum; ?></td>
                            <td><?= $Horloges->Waterdichtheid; ?></td>
                            <td><?= $Horloges->HorlogeType; ?></td>
                            <td class="text-center">
                                <a href="<?= URLROOT; ?>/HorlogesController/update/<?= $Horloges->Id; ?>">
                                    <i class="bi bi-pencil-fill text-success"></i>
                                </a>
                            </td>
                            <td class="text-center">
                                <a href="<?= URLROOT; ?>/HorlogesController/delete/<?= $Horloges->Id; ?>"
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
