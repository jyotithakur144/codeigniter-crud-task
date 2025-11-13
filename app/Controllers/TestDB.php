<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use Config\Database;

class TestDB extends Controller
{
    public function index()
    {
        try {
            $db = Database::connect();
            $query = $db->query("SELECT DATABASE() AS db_name");
            $row = $query->getRow();

            if ($row) {
                echo "Connected to database: " . $row->db_name;
            } else {
                echo "Connected, but could not fetch database name.";
            }
        } catch (\Throwable $e) {
            echo "Database connection failed: " . $e->getMessage();
        }
    }
}
