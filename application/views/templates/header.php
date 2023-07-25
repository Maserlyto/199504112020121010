<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Starter</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo base_url('plugins/fontawesome-free/css/all.min.css'); ?>">
  <?php
  $styleMappings = [
    'datacuti' => [
      unserialize(DATATABLES_STYLES),
      unserialize(SWAL_STYLES),
      unserialize(SELECT2_STYLES),
      unserialize(DATERANGE_STYLES)
    ],
    'satker' => [
      unserialize(SWAL_STYLES),
      unserialize(DATATABLES_STYLES)
    ],
    'persetujuan' => [
      unserialize(SWAL_STYLES),
      unserialize(DATATABLES_STYLES)
    ],
    'perpim' => [
      unserialize(SWAL_STYLES),
      unserialize(DATATABLES_STYLES)
    ],
    'atasan' => [
      unserialize(SWAL_STYLES),
      unserialize(SELECT2_STYLES),
      unserialize(DATATABLES_STYLES)
    ],
    'kegiatan' => [
      unserialize(SWAL_STYLES),
      unserialize(SELECT2_STYLES),
      unserialize(DATATABLES_STYLES)
    ],
    'refbid' => [
      unserialize(SWAL_STYLES),
      unserialize(SELECT2_STYLES),
      unserialize(DATATABLES_STYLES)
    ],
    'refsub' => [
      unserialize(SWAL_STYLES),
      unserialize(SELECT2_STYLES),
      unserialize(DATATABLES_STYLES)
    ],
    'surtug' => [
      unserialize(SWAL_STYLES),
      unserialize(SELECT2_STYLES),
      unserialize(DATATABLES_STYLES),
      unserialize(DATERANGE_STYLES)
    ]
  ];

  $activePage = 'satker';


  $styles = isset($styleMappings[$activePage]) ? $styleMappings[$activePage] : [];

  foreach ($styles as $style) {
    echo include_styles($style);
  }


  ?>
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('public/css/adminlte.min.css'); ?>">
  <style>
    .badge-large {
      font-size: 1rem;
      /* Adjust the font size as needed */
      padding: 0.2rem 0.5rem;
      /* Adjust the padding as needed */
    }
  </style>
</head>