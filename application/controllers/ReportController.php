<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ReportController extends CI_Controller
{

    public function index()
    {

        $json_url = 'http://103.226.55.159/json/data_rekrutmen.json';

        // Fetch JSON data from the URL
        $json_data = file_get_contents($json_url);

        // Convert JSON to PHP array
        $data = json_decode($json_data, true);


        // Access and work with the JSON data
        $form_responses = $data['Form Responses 1'];
        $record_count = count($form_responses);

        // Initialize empty arrays to store counts and sums for "posisi_yang_dipilih" and "satuan_kerja"
        $posisi_counts = array();
        $satuan_kerja_counts = array();

        // Loop through the data
        foreach ($form_responses as $response) {
            // Access individual values
            $posisi_yang_dipilih = $response['posisi_yang_dipilih'];
            $satuan_kerja = strtolower($response['satuan_kerja']); // Convert to lowercase
            $pernah_membuat_mobile_apps = strtolower($response['pernah_membuat_mobile_apps']); // Convert to lowercase

            // Check if the position exists in the array, if not, initialize it with a count of 1
            if (!isset($posisi_counts[$posisi_yang_dipilih])) {
                $posisi_counts[$posisi_yang_dipilih] = 1;
            } else {
                // If the position exists, increment its count by 1
                $posisi_counts[$posisi_yang_dipilih]++;
            }

            // Check if the work unit exists in the array, if not, initialize it with a count of 1 and sum of 1
            if (!isset($satuan_kerja_counts[$satuan_kerja])) {
                $satuan_kerja_counts[$satuan_kerja] = 1;
            } else {
                // If the work unit exists, increment its count by 1 and increment its sum by 1
                $satuan_kerja_counts[$satuan_kerja]++;
            }

            // Check if the work unit exists in the array, if not, initialize it with a count of 1 and sum of 1
            if (!isset($mobile[$pernah_membuat_mobile_apps])) {
                $mobile[$pernah_membuat_mobile_apps] = 1;
            } else {
                // If the work unit exists, increment its count by 1 and increment its sum by 1
                $mobile[$pernah_membuat_mobile_apps]++;
            }
        }

        $sum_satker = count($satuan_kerja_counts);

        // Display the counts for each position
        // print_r($satuan_kerja_counts);
        // print_r($mobile);
        // die();

        $data['posisi'] = $posisi_counts;
        $data['satker_total'] = $sum_satker;
        $data['satker'] = $satuan_kerja_counts;
        $data['mobile'] = $mobile;

        $data['rekrut'] = $form_responses;
        $data['content'] = 'report/index';
        $data['total_peserta'] = $record_count;

        $data['controller'] = 'ReportController';


        // var_dump($data); die;
        $this->load->view('templates/header');
        $this->load->view('templates/body', $data);
        $this->load->view('templates/footer');
    }
}
