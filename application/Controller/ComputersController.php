<?php

/**
 * Class ComputersController
 * This is a demo Controller class.
 *
 * If you want, you can use multiple Models or Controllers.
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */

namespace Mini\Controller;

use Mini\Model\Computers;

class ComputersController
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/computers/index
     */
    public function index()
    {
        // Instance new Model (Computers)
        $Computer = new Computers();
        // getting all computers and amount of computers
        $computers = $Computer->getAllComputers();
        $amount_of_computers = $Computer->getAmountOfComputers();

       // load views. within the views we can echo out $computers and $amount_of_computers easily
        require APP . 'view/_templates/header.php';
        require APP . 'view/computers/index.php';
        require APP . 'view/_templates/footer.php';
    }

    /**
     * ACTION: addComputer
     * This method handles what happens when you move to http://yourproject/computers/addcomputer
     * IMPORTANT: This is not a normal page, it's an ACTION. This is where the "add a computer" form on computers/index
     * directs the user after the form submit. This method handles all the POST data from the form and then redirects
     * the user back to computers/index via the last line: header(...)
     * This is an example of how to handle a POST request.
     */
    public function addComputer()
    {
        // if we have POST data to create a new computer entry
        if (isset($_POST["submit_add_computer"])) {
            // Instance new Model (Computer)
            $Computer = new Computers();
            // do addComputer() in model/model.php
            $Computer->addComputer($_POST["brand"], $_POST["description"],  $_POST["link"]);
        }

        // where to go after computer has been added
        header('location: ' . URL . 'computers/index');
    }

    /**
     * ACTION: deleteComputer
     * This method handles what happens when you move to http://yourproject/computers/deletebook
     * IMPORTANT: This is not a normal page, it's an ACTION. This is where the "delete a computer" button on books/index
     * directs the user after the click. This method handles all the data from the GET request (in the URL!) and then
     * redirects the user back to computers/index via the last line: header(...)
     * This is an example of how to handle a GET request.
     * @param int $computer_id Id of the to-delete computer
     */
    public function deleteComputer($computer_id)
    {
        // if we have an id of a computer that should be deleted
        if (isset($computer_id)) {
            // Instance new Model (computer)
            $Computer = new Computers();
            // do deleteComputer() in model/model.php
            $Computer->deleteComputer($computer_id);
        }

        // where to go after computer has been deleted
        header('location: ' . URL . 'computers/index');
    }

     /**
     * ACTION: editComputer
     * This method handles what happens when you move to http://yourproject/computers/editcomputer
     * @param int $computer_id Id of the to-edit computer
     */
    public function editComputer($computer_id)
    {
        // if we have an id of a computer that should be edited
        if (isset($computer_id)) {
            // Instance new Model (Computer)
            $Computer = new Computers();
            // do getComputer() in model/model.php
            $computer = $Computer->getComputer($computer_id);

            // in a real application we would also check if this db entry exists and therefore show the result or
            // redirect the user to an error page or similar

            // load views. within the views we can echo out $computer easily
            require APP . 'view/_templates/header.php';
            require APP . 'view/computers/edit.php';
            require APP . 'view/_templates/footer.php';
        } else {
            // redirect user to computers index page (as we don't have a computer_id)
            header('location: ' . URL . 'computers/index');
        }
    }

    /**
     * ACTION: updateComputer
     * This method handles what happens when you move to http://yourproject/computer/updatecomputer
     * IMPORTANT: This is not a normal page, it's an ACTION. This is where the "update a computer" form on books/edit
     * directs the user after the form submit. This method handles all the POST data from the form and then redirects
     * the user back to computer/index via the last line: header(...)
     * This is an example of how to handle a POST request.
     */
    public function updateComputer()
    {
        // if we have POST data to create a new book entry
        if (isset($_POST["submit_update_computer"])) {
            // Instance new Model (Computers)
            $Computer = new Computers();
            // do updateComputer() from model/model.php
            $Computer->updateComputer($_POST["brand"], $_POST["description"],  $_POST["link"], $_POST['computer_id']);
        }

        // where to go after computer has been added
        header('location: ' . URL . 'computers/index');
    }

    /**
     * AJAX-ACTION: ajaxGetStats
     * TODO documentation
     */
    public function ajaxGetStats()
    {
        // Instance new Model (Computers)
        $Computer = new Computers();
        $amount_of_computers = $Computer->getAmountOfComputers();

        // simply echo out something. A supersimple API would be possible by echoing JSON here
        echo $amount_of_computers;
    }

}
