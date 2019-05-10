<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
/*
 * InvoicePlane
 *
 * @author      InvoicePlane Developers & Contributors
 * @copyright   Copyright (c) 2012 - 2018 InvoicePlane.com
 * @copyright   Copyright (c) 2019 - Andy Binder
 * @license     https://invoiceplane.com/license.txt
 * @link        https://invoiceplane.com
 */
/**
 * Class Ajax
 */
class Ajax extends Admin_Controller
{
    public $ajax_controller = true;
    
    public function car_query()
    {
        // Load the model & helper
        $this->load->model('clients/mdl_cars');
        
        $response = [];
        // Get the post input
        $query = $this->input->get('query');
        
        if (empty($query)) {
            echo json_encode($response);
            exit;
        }
        
        // Search for cars
        $escapedQuery = $this->db->escape_str($query);
        $escapedQuery = str_replace("%", "", $escapedQuery);
        
        $cars = $this-> mdl_cars
            //->SQL
            ->order_by('car_fahrzeug')
            ->get()
            ->result();
            
        foreach ($cars as $car) {
            $response[] = [
                'id' => $car->car_id,
                'text' => htmlsc(format_car($car)),
            ];
            
        // Return the results
        echo json_encode($response);
    }
    
    /**
     * Get the latest clients
     */
    public function get_latest()
    {
        // Load the model & helper
        $this->load->model('cars/mdl_cars');
        $response = [];
        $clients = $this->mdl_cars
            ->limit(5)
            ->order_by('car_date_created')
            ->get()
            ->result();
        foreach ($cars as $car) {
            $response[] = [
            'id' => $car->car_id,
            'text' => htmlsc(format_car($car)),
            ];
        }
        // Return the results
        echo json_encode($response);
    }
}
        
