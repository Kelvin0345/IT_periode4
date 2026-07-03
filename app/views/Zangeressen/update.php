<?php require_once APPROOT . '/views/includes/header.php'; ?>

<div class="container">
    <div class="row mt-4 d-flex justify-content-center">
        <div class="col-6">
            <h3 class="text-success"><?php echo $data['title']; ?></h3>
        </div>
    </div>

    <div class="row mt-3 d-<?= $data['display']; ?> justify-content-center">
        <div class="col-6 text-begin text-primary">
            <div class="alert alert-<?= $data['color']; ?>" role="alert">
                <?= $data['message']; ?>
            </div>
        </div>
    </div>

    <div class="row mt-3 d-flex justify-content-center">
        <div class="col-6">
            <form action="<?= URLROOT; ?>/ZangeressenController/update" method="post">

                <div class="mb-3">
                    <label for="naam" class="form-label">Naam</label>
                    <input name="naam" type="text"
                        class="form-control <?= isset($data['errors']['naam']) ? 'is-invalid' : ''; ?>" id="naam"
                        value="<?= $_POST['naam'] ?? $data['zangeres']->Naam; ?>">
                    <div class="invalid-feedback"><?= $data['errors']['naam'] ?? ''; ?></div>
                </div>

                <div class="mb-3">
                    <label for="vermogen" class="form-label">Vermogen</label>
                    <input name="vermogen" type="text" 
                        class="form-control <?= isset($data['errors']['vermogen']) ? 'is-invalid' : ''; ?>"
                        id="vermogen" value="<?= $_POST['vermogen'] ?? $data['zangeres']->Vermogen; ?>">
                    <div class="invalid-feedback"><?= $data['errors']['vermogen'] ?? ''; ?></div>
                </div>

                <div class="mb-3">
                    <label for="land" class="form-label">Land</label>
                    <input name="land" type="text"
                        class="form-control <?= isset($data['errors']['land']) ? 'is-invalid' : ''; ?>" id="land"
                        value="<?= $_POST['land'] ?? $data['zangeres']->Land; ?>">
                    <div class="invalid-feedback"><?= $data['errors']['land'] ?? ''; ?></div>
                </div>

                <div class="mb-3">
                    <label for="leeftijd" class="form-label">Leeftijd</label>
                    <input name="leeftijd" type="number"
                        class="form-control <?= isset($data['errors']['leeftijd']) ? 'is-invalid' : ''; ?>"
                        id="leeftijd" value="<?= $_POST['leeftijd'] ?? $data['zangeres']->Leeftijd; ?>">
                    <div class="invalid-feedback"><?= $data['errors']['leeftijd'] ?? ''; ?></div>
                </div>

                <div class="mb-3">
                    <label for="bekendstenummer" class="form-label">Bekendste nummer</label>
                    <input name="bekendstenummer" type="text"
                        class="form-control <?= isset($data['errors']['bekendstenummer']) ? 'is-invalid' : ''; ?>"
                        id="bekendstenummer"
                        value="<?= $_POST['bekendstenummer'] ?? $data['zangeres']->BekendsteNummer; ?>">
                    <div class="invalid-feedback"><?= $data['errors']['bekendstenummer'] ?? ''; ?></div>
                </div>

                <div class="mb-3">
                    <label for="debuutjaar" class="form-label">Debuutjaar</label>
                    <input name="debuutjaar" type="date"
                        class="form-control <?= isset($data['errors']['debuutjaar']) ? 'is-invalid' : ''; ?>"
                        id="debuutjaar" value="<?= $_POST['debuutjaar'] ?? $data['zangeres']->Debuutjaar; ?>">
                    <div class="invalid-feedback"><?= $data['errors']['debuutjaar'] ?? ''; ?></div>
                </div>

                <input type="hidden" name="id" value="<?= $_POST['id'] ?? $data['zangeres']->Id ?>">
                
                <div class="d-flex justify-content-center mt-3 mb-5">
                    <button type="submit" class="btn btn-primary">Verstuur</button>
                    <a href="<?= URLROOT; ?>/zangeressenController/index" class="btn btn-outline-secondary">
                        <i class="bi bi-arrow-left"></i> Terug naar homepage
                    </a>
                </div>

            </form>

            
        </div>
    </div>
</div>

<?php require APPROOT . '/views/includes/footer.php'; ?>