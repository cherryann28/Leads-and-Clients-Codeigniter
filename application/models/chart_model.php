<?php
class Chart_model extends CI_Model{
      function lead_client(){
         return   $this->db->query("SELECT CONCAT(clients.first_name,' ',clients.last_name) as Client_name,
              sites.domain_name as website,count(*) as number_of_leads
              FROM leads
              JOIN sites
              ON sites.site_id = leads.site_id
              JOIN clients
              ON clients.client_id = sites.client_id
              GROUP BY Client_name")->result_array();
      }
 
      function top5_lead(){
         return   $this->db->query("SELECT CONCAT(clients.first_name,' ',clients.last_name) as Client_name,
             sites.domain_name as website,count(*) as number_of_leads
             FROM leads
             JOIN sites
             ON sites.site_id = leads.site_id
             JOIN clients
             ON clients.client_id = sites.client_id
             GROUP BY Client_name  
             ORDER BY number_of_leads DESC LIMIT 5 ")->result_array();
      }
 
      function update_date($to,$from){
         return   $this->db->query("SELECT  CONCAT(clients.first_name,' ',clients.last_name) as Client_name,
             sites.domain_name as website,count(*) as number_of_leads,joined_datetime
             FROM leads
             JOIN sites
             ON sites.site_id = leads.site_id
             JOIN clients
             ON clients.client_id = sites.client_id    
             WHERE joined_datetime between '$to' and '$from'
             GROUP BY client_name ")->result_array();
      } 
}
?>