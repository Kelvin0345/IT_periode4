<?php

class HorlogesController extends BaseController
{
    private $HorlogesModel;

    public function __construct()
    {
        $this->HorlogesModel = $this->model('Horloges');
    }




    public function index($display = 'none', $message = '')
    {
        /**
         * Haal de resultaat van binnen
         */
        $result = $this->HorlogesModel->getAllHorloges();

        // var_dump($result);
        /**
         * data array informatio view pagina
         */
        $data = [
            'title' => 'Overzicht Horloges',
            'display' => $display,
            'message' => $message,
            'result' => $result
        ];

        /**
         * informatie view page
         */
        $data = [
            'title' => 'Overzicht Horloges',
            'result' => $result
        ];

        /**
         * view method basecontroller view aangeroepen
         */
        $this->view('Horloges/index', $data);


    }


    public function delete($Id)
    {
        $result = $this->HorlogesModel->delete($Id);

        header('Refresh:3 ; url=' . URLROOT . '/HorlogesController/index');

        $this->index('flex', 'Record is verwijderd');
    }

    public function create()
    {
        $data = [
            'title' => 'Nieuwe horloge toevoegen',
            'display' => 'none',
            'message' => '',
            'errors' => []
        ];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $errors = [];

            if (empty(trim($_POST['merk']))) {
                $errors['merk'] = 'Voer een merk in';
            } elseif (strlen($_POST['merk']) > 20) {
                $errors['merk'] = 'Merk mag maximaal 20 tekens bevatten';
            }

            if (empty(trim($_POST['model']))) {
                $errors['model'] = 'Voer een model in';
            } elseif (strlen($_POST['model']) > 20) {
                $errors['model'] = 'model mag maximaal 20 tekens bevatten';
            }

            if (empty(trim($_POST['prijs']))) {
                $errors['prijs'] = 'Voer een prijs in';
            } elseif (!is_numeric($_POST['prijs']) || $_POST['prijs'] < 0 || $_POST['prijs'] > 9999.99) {
                $errors['prijs'] = 'voer een geldige prijs in (0 - 9999,99)';
            }

            if (empty(trim($_POST['materiaal']))) {
                $errors['materiaal'] = 'Voer een materiaal in';
            } elseif (strlen($_POST['materiaal']) > 20) {
                $errors['materiaal'] = 'maximaal 20 tekens bevatten';
            }

            if (empty(trim($_POST['gewicht']))) {
                $errors['gewicht'] = 'Voer een gewicht in';
            } elseif (strlen($_POST['gewicht']) > 20) {
                $errors['gewicht'] = 'maximaal 20 tekens bevatten';
            }


            if (empty(trim($_POST['releasedatum']))) {
                $errors['releasedatum'] = 'Voer een releasedatum in';
            } elseif (!DateTime::createFromFormat('Y-m-d', $_POST['releasedatum'])) {
                $errors['releasedatum'] = 'voer een geldige datum in (jjjj-mm-dd)';
            }

            if (empty(trim($_POST['waterdichtheid']))) {
                $errors['waterdichtheid'] = 'Voer het aantal waterdichtheid in';
            } elseif (!is_numeric($_POST['waterdichtheid']) || $_POST['waterdichtheid'] < 0 || $_POST['waterdichtheid'] > 10) {
                $errors['waterdichtheid'] = 'voer een aantal in (0 - 10)';

            }

            if (empty(trim($_POST['horlogetype']))) {
                $errors['horlogetype'] = 'Voer een type horloge in';
            } elseif (strlen($_POST['horlogetype']) > 20) {
                $errors['horlogetype'] = 'horlogetype sneaker mag maximaal 20 tekens bevatten';
            }

            if (!empty($errors)) {
                $data['errors'] = $errors;
            } else {
                $data['display'] = 'flex';
                $data['message'] = 'De gegevens zijn opgeslagen';

                $this->HorlogesModel->create($_POST);

                header('Refresh: 3; URL=' . URLROOT . '/HorlogesController/index');
            }
        }
        $this->view('Horloges/create', $data);  

        
    }

    public function update($id = NULL)
    {
        $data = [
            'title' => 'Wijzig Horloges',
            'display' => 'none',
            'message' => '',
            'errors' => []
        ];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $errors = [];

            if (empty(trim($_POST['merk']))) {
                $errors['merk'] = 'Voer een merk in';
            } elseif (strlen($_POST['merk']) > 50) {
                $errors['merk'] = 'Merk mag maximaal 20 tekens bevatten';
            }

            if (empty(trim($_POST['model']))) {
                $errors['model'] = 'Voer een model in';
            } elseif (strlen($_POST['model']) > 50) {
                $errors['model'] = 'model mag maximaal 20 tekens bevatten';
            }

            if (empty(trim($_POST['prijs']))) {
                $errors['prijs'] = 'Voer een prijs in';
            } elseif (!is_numeric($_POST['prijs']) || $_POST['prijs'] < 0 || $_POST['prijs'] > 100000000000000000000.99) {
                $errors['prijs'] = 'voer een geldige prijs in (0 - 100000000000000000000,99)';
            }

            if (empty(trim($_POST['materiaal']))) {
                $errors['materiaal'] = 'Voer een materiaal in';
            } elseif (strlen($_POST['materiaal']) > 20) {
                $errors['materiaal'] = 'maximaal 20 tekens bevatten';
            }

            if (empty(trim($_POST['gewicht']))) {
                $errors['gewicht'] = 'Voer een gewicht in';
            } elseif (strlen($_POST['gewicht']) > 20) {
                $errors['gewicht'] = 'maximaal 20 tekens bevatten';
            }

            if (empty(trim($_POST['releasedatum']))) {
                $errors['releasedatum'] = 'Voer een releasedatum in';
            } elseif (!DateTime::createFromFormat('Y-m-d', $_POST['releasedatum'])) {
                $errors['releasedatum'] = 'voer een geldige datum in (jjjj-mm-dd)';
            }

            if (empty(trim($_POST['waterdichtheid']))) {
                $errors['waterdichtheid'] = 'Voer het aantal waterdichtheid in';
            } elseif (!is_numeric($_POST['waterdichtheid']) || $_POST['waterdichtheid'] < 0 || $_POST['waterdichtheid'] > 1000000000000000000) {
                $errors['waterdichtheid'] = 'voer een aantal in (0 - 1000000000000000000)';

            }

            if (empty(trim($_POST['horlogetype']))) {
                $errors['horlogetype'] = 'Voer een type horloge in';
            } elseif (strlen($_POST['horlogetype']) > 20) {
                $errors['horlogetype'] = 'horlogetype sneaker mag maximaal 20 tekens bevatten';
            }




            if (!empty($errors)) {
                $data['errors'] = $errors;
            } else {
                $result = $this->HorlogesModel->updateHorloges($_POST);

                $data['display'] = 'flex';
                $data['message'] = 'Het record is succesvol opgeslagen';
                $data['color'] = 'success';
                header("Refresh:3; url=" . URLROOT . "/HorlogesController/index");
            }
        }

        $data['horloge'] = $this->HorlogesModel->getHorlogesById($id);

        $this->view('Horloges/update', $data);
    }


}


