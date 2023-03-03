<?php

/**
 * Class Computers
 * This is a demo Model class.
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */

namespace Mini\Model;

use Mini\Core\Model;

class Computers extends Model
{
    /**
     * Get all songs from database
     */
    public function getAllComputers()
    {
        $sql = "SELECT id, brand, description, link FROM computers";
        $query = $this->db->prepare($sql);
        $query->execute();

        // fetchAll() is the PDO method that gets all result rows, here in object-style because we defined this in
        // core/controller.php! If you prefer to get an associative array as the result, then do
        // $query->fetchAll(PDO::FETCH_ASSOC); or change core/controller.php's PDO options to
        // $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ...
        return $query->fetchAll();
    }

    /**
     * Add a computer to database
     * TODO put this explanation into readme and remove it from here
     * Please note that it's not necessary to "clean" our input in any way. With PDO all input is escaped properly
     * automatically. We also don't use strip_tags() etc. here so we keep the input 100% original (so it's possible
     * to save HTML and JS to the database, which is a valid use case). Data will only be cleaned when putting it out
     * in the views (see the views for more info).
     * @param string $brand Brand
     * @param string $description Description
     * @param string $link Link
     */
    public function addComputer($brand, $description, $link)
    {
        $sql = "INSERT INTO computers (brand, description, link) VALUES (:brand, :description, :link)";
        $query = $this->db->prepare($sql);
        $parameters = array(':brand' => $brand, ':description' => $description, ':link' => $link);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);
    }

    /**
     * Delete a computer in the database
     * Please note: this is just an example! In a real application you would not simply let everybody
     * add/update/delete stuff!
     * @param int $computer_id Id of computer
     */
    public function deleteComputer($computer_id)
    {
        $sql = "DELETE FROM computers WHERE id = :computer_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':computer_id' => $computer_id);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);
    }

    /**
     * Get a computer from database
     * @param integer $computer_id
     */
    public function getComputer($computer_id)
    {
        $sql = "SELECT id, brand, description, link FROM computers WHERE id = :computer_id LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':computer_id' => $computer_id);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);

        // fetch() is the PDO method that get exactly one result
        return $query->fetch();
    }

    /**
     * Update a computer in database
     * // TODO put this explaination into readme and remove it from here
     * Please note that it's not necessary to "clean" our input in any way. With PDO all input is escaped properly
     * automatically. We also don't use strip_tags() etc. here so we keep the input 100% original (so it's possible
     * to save HTML and JS to the database, which is a valid use case). Data will only be cleaned when putting it out
     * in the views (see the views for more info).
     * @param string $brand Brand
     * @param string $description Description
     * @param string $link Link
     * @param int $computer_id Id
     */
    public function updateComputer($brand, $description, $link, $computer_id)
    {
        $sql = "UPDATE computers SET brand = :brand, description = :description, link = :link WHERE id = :computer_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':brand' => $brand, ':description' => $description, ':link' => $link, ':computer_id' => $computer_id);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);
    }

    /**
     * Get simple "stats". This is just a simple demo to show
     * how to use more than one model in a controller (see application/controller/songs.php for more)
     */
    public function getAmountOfComputers()
    {
        $sql = "SELECT COUNT(id) AS amount_of_computers FROM computers";
        $query = $this->db->prepare($sql);
        $query->execute();

        // fetch() is the PDO method that get exactly one result
        return $query->fetch()->amount_of_computers;
    }
}
