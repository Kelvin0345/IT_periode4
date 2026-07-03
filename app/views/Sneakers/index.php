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
        <a href="<?= URLROOT; ?>/SneakersController/create"
            class="btn btn-warning"
            Role="button">Nieuwe Sneaker
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
                        <th>Type</th>
                        <th>Prijs</th>
                        <th>Materiaal</th>
                        <th>Gewicht</th>
                        <th>Releasedatum</th>
                        <th>Wijzig</th>
                        <th>Verwijder</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data['result'] as $Sneakers) : ?>
                        <tr>
                            <td><?= $Sneakers->Merk; ?></td>
                            <td><?= $Sneakers->Model; ?></td>
                            <td><?= $Sneakers->Type; ?></td>
                            <td><?= $Sneakers->Prijs; ?></td>
                            <td><?= $Sneakers->Materiaal; ?></td>
                            <td><?= $Sneakers->Gewicht; ?></td>
                            <td><?= $Sneakers->Releasedatum; ?></td>
                            <td class="text-center">
                                <a href="<?= URLROOT; ?>/SneakersController/update/<?= $Sneakers->Id; ?>">
                                    <i class="bi bi-pencil-fill text-success"></i>
                                </a>
                            </td>
                            <td class="text-center">
                                <a href="<?= URLROOT; ?>/SneakersController/delete/<?= $Sneakers->Id; ?>">
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
