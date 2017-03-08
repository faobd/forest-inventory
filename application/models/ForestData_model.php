<?php

    Class Forestdata_model extends CI_Model {

        function __construct() {
            parent::__construct();
        }

     
    	function insert_csv($data, $table) {
           $this->db->insert($table, $data);
         }


         
         public function get_family_species_genus1($family_id)
            {
                $data=$this->db->query("SELECT * FROM (SELECT CONCAT(f.Family,' ',s.Species) NAME,e.*,l.  ID_FAOBiomes,b.FAOBiomes FROM species s
                    LEFT JOIN family f ON s.ID_Family=f.ID_Family
                    LEFT JOIN ef e ON s.ID_Species=e.ID_Species
                    LEFT JOIN location l ON e.ID_Location=l.ID_Location
                    LEFT JOIN faobiomes b ON l.ID_FAOBiomes=b.ID_FAOBiomes
                    WHERE s.ID_Family=$family_id) m")->result();
                    return $data; 
            }






             public function get_family_species_genus($family_id)
            {
                $data=$this->db->query("SELECT * FROM (SELECT CONCAT(f.Family,' ',s.Species) NAME,s.ID_Species FROM species s
                    LEFT JOIN family f ON s.ID_Family=f.ID_Family
                    WHERE s.ID_Family=$family_id) m")->result();
                    return $data; 
            }


               public function get_location_data_type($specis_id)
            {
                $data=$this->db->query("SELECT s.*, e.*,l.*,b.*,d.*,dis.*,zon.* from  species s
                    LEFT JOIN ef e ON s.ID_Species=e.ID_Species
                    LEFT JOIN location l ON e.ID_Location=l.ID_Location
                    LEFT JOIN faobiomes b ON l.ID_FAOBiomes=b.ID_FAOBiomes
                    LEFT JOIN division d ON l.ID_Division=d.ID_Division
                    LEFT JOIN district dis ON l.ID_District =dis.ID_District
                    LEFT JOIN zones zon ON l.ID_Zones =zon.ID_Zones
                    WHERE s.ID_Species=$specis_id;")->result();
                    return $data; 
            }



        

    }
