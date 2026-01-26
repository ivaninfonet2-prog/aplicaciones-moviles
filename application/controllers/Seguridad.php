<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Seguridad extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->output
            ->set_header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0")
            ->set_header("Pragma: no-cache");
    }
}
