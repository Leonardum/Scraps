<?php
/* This file contains the code for the event object and queries. */
class establishment {
	
	private $id;
    private $name;
    private $type;
    private $kitchen;
    private $description;
    private $website;
    private $vegetarian;
	private $vegan;
    private $liveEntertainment;
	private $parking;
    private $addressId;
	
    function __construct($id, $name, $type, $kitchen, $description, $website, $vegetarian, $vegan, $liveEntertainment, $parking, $addressId) {
		$this->id = $id;
		$this->name = $name;
		$this->type = $type;
		$this->kitchen = $kitchen;
		$this->description = $description;
		$this->website = $website;
		$this->vegetarian = $vegetarian;
		$this->vegan = $vegan;
		$this->liveEntertainment = $liveEntertainment;
		$this->parking = $parking;
		$this->addressId = $addressId;
    }
    
    public function getId() {
        return $this->id;
    }
    public function getName() {
        return $this->name;
    }
    public function getType() {
        return $this->type;
    }
    public function getKitchen() {
        return $this->kitchen;
    }
    public function getDescription() {
        return $this->description;
    }
    public function getWebsite() {
        return $this->website;
    }
	public function getVegetarian() {
        return $this->vegetarian;
    }
	public function getVegan() {
        return $this->vegan;
    }
    public function getLiveEntertainment() {
        return $this->liveEntertainment;
    }
	public function getParking() {
        return $this->parking;
    }
	public function getAddressId() {
        return $this->addressId;
    }
	
	
    public function setId($id){
        if (is_int($id)) {
            $this->id = $id;
        }
    }
    public function setName($name) {
        if (is_string($name)) {
            $this->name = $name;
        }
    }
    public function setType($type) {
        if (is_string($type)) {
            $this->type = $type;
        }
    }
    public function setKitchen($kitchen) {
        if (is_string($kitchen)) {
            $this->kitchen = $kitchen;
        }
    }
    public function setDescription($description) {
        if (is_string($description)) {
            $this->description = $description;
        }
    }
    public function setWebsite($website) {
        if (is_string($website) || ($website == NULL)) {
            $this->website = $website;
        }
    }
    public function setVegetarian($vegetarian) {
        if (is_int($vegetarian)) {
            $this->vegetarian = $vegetarian;
        }
    }
    public function setVegan($vegan) {
        if (is_int($vegan)) {
            $this->vegan = $vegan;
        }
    }
	public function setLiveEntertainment($liveEntertainment) {
        if (is_int($liveEntertainment)) {
            $this->liveEntertainment = $liveEntertainment;
        }
	}
    public function setParking($parking) {
        if (is_int($parking)) {
            $this->parking = $parking;
        }
    }
    public function setAddressId($addressId) {
        if (is_int($addressId)) {
            $this->addressId = $addressId;
        }
    }
	
    
	// Save all changes made to the establishment info to the database.
	public function save() {
        /* Check if the establishment already exists in database. If it doesn't create a new record. If it does, update the current record. */
        if (!isset($this->id)) {
            global $db;
            
            $query = "INSERT INTO `establishment` (name, type, kitchen, description, website, vegetarian, vegan, liveEntertainment, parking, address_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
			
            $statement = $db->prepare($query);
            
            if ($statement == FALSE) {
                display_db_error($db->error);
            }
			
			$statement->bind_param("sssssiiiii", $this->name, $this->type, $this->kitchen, $this->description, $this->website, $this->vegetarian, $this->vegan, $this->liveEntertainment, $this->parking, $this->addressId);
			
            $success = $statement->execute();
            
            if ($success) {
                $establishmentId = $db->insert_id;
                $statement->close();
                return $establishmentId;
            } else {
                display_db_error($db->error);
            }
        } else {
            global $db;
            
            $query = "UPDATE `establishment` SET name = ?, type = ?, kitchen = ?, description = ?, website = ?, vegetarian = ?, vegan = ?, liveEntertainment = ?, parking = ?, address_id = ? WHERE establishment_id = ?";
			
            $statement = $db->prepare($query);
            
            if ($statement == FALSE) {
                display_db_error($db->error);
            }
            
            $statement->bind_param("sssssiiiiii", $this->name, $this->type, $this->kitchen, $this->description, $this->website, $this->vegetarian, $this->vegan, $this->liveEntertainment, $this->parking, $this->addressId, $this->id);
            
            $success = $statement->execute();
            
            if ($success) {
                $statement->close();
            } else {
                display_db_error($db->error);
            }
        }
    }
	
	
	// Delete the complete establishment record from the database.
	public function delete() {
        global $db;
        
        $query = "DELETE FROM `establishment` WHERE establishment_id = ?";
        
        $statement = $db->prepare($query);
        
        if ($statement == FALSE) {
            display_db_error($db->error);
        }
        
        $statement->bind_param("i", $this->id);
        
        $success = $statement->execute();
        
        if ($success) {
            $count = $db->affected_rows;
            $statement->close();
            return $count;
        } else {
            display_db_error($db->error);
        }
    }
	
	
	/* Create an establishment object and store all information of the record with the given establishment_id in it. */
	static function get_establishmentById($id) {
        global $db;
        
        $id = $db->escape_string($id);
        
        $query = "SELECT * FROM `establishment` WHERE establishment_id = ?";
        
        $statement = $db->prepare($query);
		
		if ($statement == FALSE) {
			display_db_error($db->error);
		}
        
        $statement->bind_param("i", $id);
        
        $statement->execute();
        
        $statement->bind_result($id, $name, $type, $kitchen, $description, $website, $vegetarian, $vegan, $liveEntertainment, $parking, $addressId);
        
        $statement->fetch();
        
        $establishment = new establishment($id, $name, $type, $kitchen, $description, $website, $vegetarian, $vegan, $liveEntertainment, $parking, $addressId);
        
        $statement->close();
        
        return $establishment;
    }
	
	
	/* Create an establishment array and store all information of the record with the given establishment_id in it. */
	static function get_establishmentArrayById($id) {
        global $db;
        
        $id = $db->escape_string($id);
        
        $query = "SELECT * FROM `establishment` WHERE establishment_id = ?";
		
		$statement = $db->prepare($query);
		
		if ($statement == FALSE) {
			display_db_error($db->error);
		}
        
        $statement->bind_param("i", $id);
        
        $statement->execute();
        
        $result = $statement->get_result();
        
        if ($result == FALSE) {
            display_db_error($db->error);
        }
        
        while ($row = $result->fetch_assoc()) {
            $establishment = $row;
        }
        
        $statement->close();
        
        return $establishment;
    }
	
	
	// Get all the dishes offered at an establishment.
	static function get_dishesOfferedAtEstablishment($id) {
        global $db;
        
        $id = $db->escape_string($id);
        
        $query = "SELECT establishment_has_dish.establishment_id, dish.* FROM `establishment_has_dish`, `dish` WHERE establishment_has_dish.establishment_id = ? AND establishment_has_dish.dish_id = dish.dish_id";
		
		$statement = $db->prepare($query);
		
		if ($statement == FALSE) {
			display_db_error($db->error);
		}
        
        $statement->bind_param("i", $id);
        
        $statement->execute();
        
        $result = $statement->get_result();
        
        if ($result == FALSE) {
            display_db_error($db->error);
        }
		
		$dishes = array();
        
        while ($row = $result->fetch_assoc()) {
            array_push($dishes, array($row['dish_id'], $row['name'], $row['type'], $row['price'], $row['grams']));
        }
        
        $statement->close();
        
		if (empty($dishes)) {
			$dishes = false;
		}
		
        return $dishes;
    }
	
	
	/* Create an array with all the information of the establishments which match the user's criteria and return it. */
	static function get_establishmentsArrayByCriteria($type, $kitchen, $region) {
		
		$establishments = array();
		
		if (isset($type) && isset($kitchen) && isset($region)) {
			global $db;
			
			$type = $db->escape_string($type);
			$kitchen = $db->escape_string($kitchen);
			$region = $db->escape_string($region);
			
			$query = "SELECT * FROM `establishment`, `address` WHERE type = ? AND kitchen = ? AND province = ? AND establishment.address_id = address.address_id";
			
			$statement = $db->prepare($query);
			
			if ($statement == FALSE) {
				display_db_error($db->error);
			}
			
			$statement->bind_param("sss", $type, $kitchen, $region);
			
			$statement->execute();
			
			$result = $statement->get_result();
			
			if ($result == FALSE) {
				display_db_error($db->error);
			}
			
			while ($row = $result->fetch_assoc()) {
				$establishment = $row;
				array_push($establishment, $establishments);
			}
			
			$statement->close();
			
			return $establishments;
		}
    }
}

?>