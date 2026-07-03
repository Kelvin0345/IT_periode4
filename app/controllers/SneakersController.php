<?php

class SneakersController extends BaseController
{
    private $SneakersModel;

    public function __construct()
    {
        $this->SneakersModel = $this->model('Sneakers');
    }




    public function index($display = 'none0', $message = '')
    {
        /**
         * Haal de resultaat van binnen
         */
        $result = $this->SneakersModel->getAllSneakers();

        // var_dump($result);
        /**
         * data array informatio view pagina
         */
        $data = [
            'title' => 'Overzicht Sneakers',
            'display' => $display,
            'message' => $message,
            'result' => $result


        ];

        /**
         * informatie view page
         */

        $data = [
            'title' => 'Overzicht Sneakers',
            'result' => $result
        ];

        /**
         * view method basecontroller view aangeroepen
         */
        $this->view('Sneakers/index', $data);

    }
    public function delete($Id)
    {
        $result = $this->SneakersModel->delete($Id);

        header('Refresh:3 ; url=' . URLROOT . '/SneakersController/index');

        $this->index('flex', 'Record is verwijderd');
    }

    public function create()
    {
        $data = [

            'title' => 'Nieuwe Sneakers toevoegen',
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

            if (empty(trim($_POST['type']))) {
                $errors['type'] = 'Voer een sneaker type in';
            } elseif (strlen($_POST['type']) > 20) {
                $errors['type'] = 'sneaker mag maximaal 20 tekens bevatten';
            }
            

            if (empty(trim($_POST['prijs']))) {
                $errors['prijs'] = 'Voer een prijs in';
            } elseif (!is_numeric($_POST['prijs']) || $_POST['prijs'] < 0 || $_POST['prijs'] > 9999.99) {
                $errors['prijs'] = 'voer een prijs in (0 - 9999,99)';
            }

            if (empty(trim($_POST['materiaal']))) {
                $errors['materiaal'] = 'Voer een materiaal in';
            } elseif (strlen($_POST['materiaal']) > 20) {
                $errors['materiaal'] = 'maximaal 20 tekens bevatten';
            }

            if (empty(trim($_POST['gewicht']))) {
                $errors['gewicht'] = 'Voer een gewicht in';
            } elseif (!is_numeric($_POST['gewicht']) || $_POST['gewicht'] < 0 || $_POST['gewicht'] > 10) {
                $errors['gewicht'] = 'voer een geldige gewicht in (0 - 80 gram)';

            }

            if (empty(trim($_POST['releasedatum']))) {
                $errors['releasedatum'] = 'Voer een releasedatum in';
            } elseif (!DateTime::createFromFormat('Y-m-d', $_POST['releasedatum'])) {
                $errors['releasedatum'] = 'voer een geldige datum in (jjjj-mm-dd)';
            }

            if (!empty($errors)) {
                $data['errors'] = $errors;
            } else {
                $data['display'] = 'flex';
                $data['message'] = 'De gegevens zijn opgeslagen';

                $this->SneakersModel->create($_POST);

                header('Refresh: 3; URL=' . URLROOT . '/SneakersController/index');
            }
        }
        $this->view('Sneakers/create', $data);

    }


    public function update($id = null)
    {
        $data = [
            'title' => 'Wijzig Sneakers',
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

            if (empty(trim($_POST['type']))) {
                $errors['type'] = 'Voer een type sneaker in';
            } elseif (strlen($_POST['type']) > 20) {
                $errors['type'] = 'Type sneaker mag maximaal 20 tekens bevatten';
            }


            if (empty(trim($_POST['prijs']))) {
                $errors['prijs'] = 'Voer een prijs in';
            } elseif (!is_numeric($_POST['prijs']) || $_POST['prijs'] < 0 || $_POST['prijs'] > 9999.99) {
                $errors['prijs'] = 'voer een prijs in (0 - 9999,99)';
            }

            if (empty(trim($_POST['materiaal']))) {
                $errors['materiaal'] = 'Voer een materiaal in';
            } elseif (strlen($_POST['materiaal']) > 20) {
                $errors['materiaal'] = 'maximaal 20 tekens bevatten';
            }

            if (empty(trim($_POST['gewicht']))) {
                $errors['gewicht'] = 'Voer een gewicht in';
            } elseif (!is_numeric($_POST['gewicht']) || $_POST['gewicht'] < 0 || $_POST['gewicht'] > 1000) {
                $errors['gewicht'] = 'voer een geldige gewicht in (0 - 80 gram)';

            }

            if (empty(trim($_POST['releasedatum']))) {
                $errors['releasedatum'] = 'Voer een releasedatum in';
            } elseif (!DateTime::createFromFormat('Y-m-d', $_POST['releasedatum'])) {
                $errors['releasedatum'] = 'voer een geldige datum in (jjjj-mm-dd)';
            }

            

            if (!empty($errors)) {
                $data['errors'] = $errors;
            } else {

                $result = $this->SneakersModel->updateSneakers($_POST);

                $data['display'] = 'flex';
                $data['message'] = 'Het record is succesvol opgeslagen';
                $data['color'] = 'success';
                header("Refresh:3; url='/SneakersController/index'");

            }


        }

        // haal de sneaker op uit de database

        $data['sneakers'] = $this->SneakersModel->getSneakersId($id);

        $this->view('Sneakers/update', $data);
    }



}






