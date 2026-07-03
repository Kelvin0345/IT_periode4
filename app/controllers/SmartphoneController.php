<?php

class SmartphoneController extends BaseController
{
    private $smartphoneModel;
    
    public function __construct()
    {
        $this->smartphoneModel = $this->model('Smartphone');
    }
    



    public function index($display='none', $message='')
    {
        /**
         * Haal de resultaat van binnen
         */
        $result = $this->smartphoneModel->getAllSmartphones();
    
        // var_dump($result);
        /**
         * data array informatio view pagina
         */
        $data = [
            'title'   => 'Overzicht Smartphones',
            'display' =>  $display,
            'message' =>  $message,
            'result'  =>  $result
        ];

        /**
         * informatie view page
         */
        $data = [
            'title' => 'Overzicht Smartphones',
            'result' => $result
        ];
        



        /**
         * view method basecontroller view aangeroepen
         */
        $this->view('smartphone/index', $data);

    
    
    }
    public function delete($Id)
    {
        $result = $this->smartphoneModel->delete($Id);

        header('Refresh:3 ; url=' . URLROOT . '/smartphoneController/index');

        $this->index('flex', 'Record is verwijderd');
    }

    public function create()
    {
        $data = [
            'title'     => 'Nieuwe smartphone toevoegen' ,
            'display'   => 'none' ,
            'message'   =>  '',
            'errors'    =>  []
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
            } elseif (!is_numeric($_POST['prijs']) || $_POST['prijs'] < 100 || $_POST['prijs'] > 9999.99) {
                $errors['prijs'] = 'voer een geldige prijs in (100 - 9999,99)';
            }
            
            if (empty(trim($_POST['geheugen']))) {
                $errors['geheugen'] = 'Voer een geheugen in';
            } elseif (!is_numeric($_POST['geheugen']) || $_POST['geheugen'] < 40 || $_POST['geheugen'] > 4000) {
                $errors['geheugen'] = 'voer een geldige geheugen in (0 - 4000 GB)';
            }
        
            if (empty(trim($_POST['besturingssysteem']))) {
                $errors['besturingssysteem'] = 'Voer een besturingssysteem in';
            } elseif (strlen($_POST['besturingssysteem']) > 50) {
                $errors['besturingssysteem'] = 'maximaal 50 tekens bevatten';
            }

            if (empty(trim($_POST['schermgrootte']))) {
                $errors['schermgrootte'] = 'Voer een schermgrootte in';
            } elseif (!is_numeric($_POST['schermgrootte']) || $_POST['schermgrootte'] < 0 || $_POST['schermgrootte'] > 10) {
                $errors['schermgrootte'] = 'voer een geldige schermgrootte in (0 - 10 inch)';
                
            }

            if (empty(trim($_POST['releasedatum']))) {
                $errors['releasedatum'] = 'Voer een releasedatum in';
            } elseif (!DateTime::createFromFormat('Y-m-d', $_POST['releasedatum'])) {
                $errors['releasedatum'] = 'voer een geldige datum in (jjjj-mm-dd)';
            }   
            
            if (empty(trim($_POST['megapixels']))) {
                $errors['megapixels'] = 'Voer het aantal megapixels in';
            } elseif (!is_numeric($_POST['megapixels']) || $_POST['megapixels'] < 10 || $_POST['megapixels'] > 200) {
                $errors['megapixels'] = 'voer een aantal in (10 - 200)';
                
            }

            if (!empty($errors)) {
                $data['errors'] = $errors;
            } 
            else {
                $data['display'] = 'flex';
                $data['message'] = 'De gegevens zijn opgeslagen';

                $this->smartphoneModel->create($_POST);

                header('Refresh: 3; URL=' . URLROOT . '/smartphoneController/index');
            }            
           
        }
        $this->view('smartphone/create', $data);
    
    }   

    public function update($id=NULL)
    {
        $data = [
            'title' => 'Wijzig smartphone',
            'display' => 'none',
            'message' => '',
            'errors'  => []   

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
            } elseif (!is_numeric($_POST['prijs']) || $_POST['prijs'] < 100 || $_POST['prijs'] > 9999.99) {
                $errors['prijs'] = 'voer een geldige prijs in (100 - 9999,99)';
            }
            
            if (empty(trim($_POST['geheugen']))) {
                $errors['geheugen'] = 'Voer een geheugen in';
            } elseif (!is_numeric($_POST['geheugen']) || $_POST['geheugen'] < 40 || $_POST['geheugen'] > 4000) {
                $errors['geheugen'] = 'voer een geldige geheugen in (40 - 4000 GB)';
            }
        
            if (empty(trim($_POST['besturingssysteem']))) {
                $errors['besturingssysteem'] = 'Voer een besturingssysteem in';
            } elseif (strlen($_POST['besturingssysteem']) > 50) {
                $errors['besturingssysteem'] = 'maximaal 50 tekens bevatten';
            }

            if (empty(trim($_POST['schermgrootte']))) {
                $errors['schermgrootte'] = 'Voer een schermgrootte in';
            } elseif (!is_numeric($_POST['schermgrootte']) || $_POST['schermgrootte'] < 3 || $_POST['schermgrootte'] > 10) {
                $errors['schermgrootte'] = 'voer een geldige schermgrootte in (3 - 10 inch)';
                
            }

            if (empty(trim($_POST['releasedatum']))) {
                $errors['releasedatum'] = 'Voer een releasedatum in';
            } elseif (!DateTime::createFromFormat('Y-m-d', $_POST['releasedatum'])) {
                $errors['releasedatum'] = 'voer een geldige datum in (jjjj-mm-dd)';
            }   
            
            if (empty(trim($_POST['megapixels']))) {
                $errors['megapixels'] = 'Voer het aantal megapixels in';
            } elseif (!is_numeric($_POST['megapixels']) || $_POST['megapixels'] < 10 || $_POST['megapixels'] > 200) {
                $errors['megapixels'] = 'voer een aantal in (10 - 200)';
                
            } 
            
            if (!empty($errors)) {
                $data['errors'] = $errors;
            } else {
                
                // Hier komt de code om de gewijzigde data op te slaan

                $result = $this->smartphoneModel->updateSmartphone($_POST);
                    
                $data['display'] = 'flex';
                $data['message'] = 'Het record is succesvol opgeslagen';
                $data['color'] = 'success';
                header("Refresh:3; url='/smartphoneController/index'");
            }
        }

        // laat de model de data ophalen uit de database
        $data['smartphone'] = $this->smartphoneModel->getSmartphoneId($id);

        $this->view('smartphone/update', $data);

    }

}

    




