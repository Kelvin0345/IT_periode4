<?php

class ZangeressenController extends BaseController
{
    private $zangeressenModel;

    public function __construct()
    {
        $this->zangeressenModel = $this->model('Zangeressen');
    }

    public function index($display = 'none', $message = '')
    {
        $result = $this->zangeressenModel->getAllZangeressen();

        $data = [
            'title' => 'Overzicht Zangeressen',
            'display' => $display,
            'message' => $message,
            'result' => $result
        ];

        $this->view('zangeressen/index', $data);
    }

    public function delete($Id)
    {
        $this->zangeressenModel->delete($Id);

        header('Refresh:3 ; url=' . URLROOT . '/ZangeressenController/index');

        $this->index('flex', 'Record is verwijderd');
    }

    public function create()
    {
        $data = [
            'title' => 'Nieuwe zangeres toevoegen',
            'display' => 'none',
            'message' => '',
            'errors' => []
        ];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $errors = [];

            if (empty(trim($_POST['naam']))) {
                $errors['naam'] = 'Voer een naam in';
            }  elseif (strlen($_POST['naam']) > 20) {
                $errors['naam'] = 'naam mag maximaal 20 tekens bevatten';
            }

            if (empty(trim($_POST['vermogen']))) {
                $errors['vermogen'] = 'Voer een vermogen in';
            }  elseif (strlen($_POST['vermogen']) > 50) {
                $errors['vermogen'] = 'vermogen mag maximaal 20 tekens bevatten';
            }

            if (empty(trim($_POST['land']))) {
                $errors['land'] = 'Voer een land in';
            }  elseif (strlen($_POST['land']) > 50) {
                $errors['land'] = 'Land mag maximaal 50 tekens bevatten';
            }

            if (empty(trim($_POST['leeftijd']))) {
                $errors['leeftijd'] = 'Voer een leeftijd in';
            } elseif (!is_numeric($_POST['leeftijd']) || $_POST['leeftijd'] < 0 || $_POST['leeftijd'] > 100) {
                $errors['leeftijd'] = 'voer een geldige leeftijd in (0 - 100)';
            }
        
                

            if (empty(trim($_POST['bekendstenummer']))) {
                $errors['bekendstenummer'] = 'Voer bekendste bekendstenummer in';
            } elseif (strlen($_POST['bekendstenummer']) > 50) {
                $errors['bekendstenummer'] = 'bekendstenummer mag maximaal 50 tekens bevatten';
            }

            if (empty(trim($_POST['debuutjaar']))) {
                $errors['debuutjaar'] = 'Voer debuutjaar in';
            }  elseif (!DateTime::createFromFormat('Y-m-d', $_POST['debuutjaar'])) {
                $errors['debuutjaar'] = 'voer een geldige debuutjaar in (jjjj-mm-dd)';
            }

            if (!empty($errors)) {
                $data['errors'] = $errors;
            } else {
                $data['display'] = 'flex';
                $data['message'] = 'De gegevens zijn opgeslagen';

                $this->zangeressenModel->create($_POST);

                header('Refresh: 3; URL=' . URLROOT . '/ZangeressenController/index');
            }
        }

        $this->view('zangeressen/create', $data);
    }

    public function update($id = NULL)
    {
        $data = [
            'title' => 'Wijzig zangeres',
            'display' => 'none',
            'message' => '',
            'errors' => []
        ];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $errors = [];

            if (empty(trim($_POST['naam']))) {
                $errors['naam'] = 'Voer een naam in';
            } elseif (strlen($_POST['naam']) > 50) {
                $errors['naam'] = 'naam mag maximaal 50 tekens bevatten';
            }

            if (empty(trim($_POST['vermogen']))) {
                $errors['vermogen'] = 'Voer een vermogen in';
            } elseif (strlen($_POST['vermogen']) > 50) {
                $errors['vermogen'] = 'vermogen mag maximaal 20 tekens bevatten';
            }

            if (empty(trim($_POST['land']))) {
                $errors['land'] = 'Voer een land in';
            }  elseif (strlen($_POST['land']) > 50) {
                $errors['land'] = 'land mag maximaal 50 tekens bevatten';
            }

            if (empty(trim($_POST['leeftijd']))) {
                $errors['leeftijd'] = 'Voer een leeftijd in';
            }  elseif (!is_numeric($_POST['leeftijd']) || $_POST['leeftijd'] < 0 || $_POST['leeftijd'] > 100) {
                $errors['leeftijd'] = 'voer een geldige leeftijd in (0 - 100)';
            }

            if (empty(trim($_POST['bekendstenummer']))) {
                $errors['bekendstenummer'] = 'Voer bekendste nummer in';
            }  elseif (strlen($_POST['bekendstenummer']) > 50) {
                $errors['bekendstenummer'] = 'bekendstenummer mag maximaal 50 tekens bevatten';
            }

            if (empty(trim($_POST['debuutjaar']))) {
                $errors['debuutjaar'] = 'Voer debuutjaar in';
            }  elseif (!DateTime::createFromFormat('Y-m-d', $_POST['debuutjaar'])) {
                $errors['debuutjaar'] = 'voer een geldige debuutjaar in (jjjj-mm-dd)';
            }

            if (!empty($errors)) {
                $data['errors'] = $errors;
            } else {

                $result = $this->zangeressenModel->updateZangeres($_POST);

                $data['display'] = 'flex';
                $data['message'] = 'Het record is succesvol opgeslagen';
                $data['color'] = 'success';

                header("Refresh:3; url='" . URLROOT . "/ZangeressenController/index'");
            }
        }

        $data['zangeres'] = $this->zangeressenModel->getZangeresById($id);

        $this->view('zangeressen/update', $data);
    }
}