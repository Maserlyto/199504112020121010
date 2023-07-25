$(function () {
    $('.my-tooltip').tooltip();
    $('#satker_all').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
    });
    $('#rekrut').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
  });
    $('#satker_cuti').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
  });
  
  var select_check = document.querySelectorAll('.select2');

  if (select_check.length > 0) {
  $(function () {
    $('.select2').select2()
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    });
  });
  } 

  var daterange_check = document.querySelectorAll('.daterange');

  if (daterange_check.length > 0) {
    $(function () {
      $('#ajukan_cuti').daterangepicker();
      $('#edit_cuti').daterangepicker();
      $('#tgl_pengawasan').daterangepicker();
      $('#tanggal_mulai').daterangepicker();
    });
  } 

  var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
  var pieData = {
    labels: [
      'PHP',
      'Javascript',
      'Java',
      'Python',
      'Flutter'
    ],
    datasets: [
      {
        data: [700, 500, 400, 600, 300],
        backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc']
      }
    ]
  }
  var pieOptions = {
    legend: {
      display: false
    }
  }
  var pieChart = new Chart(pieChartCanvas, {
    type: 'doughnut',
    data: pieData,
    options: pieOptions
  })


});
var Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000
});
function isFieldEmpty(value) {
  return value === undefined || (typeof value === 'string' && value.trim() === '');
}

function isFileEmpty(file) {
  return file === undefined || file.size === 0;
}

function checkFields(formData, status) {
  for (var [key, value] of formData.entries()) {
    if (isFieldEmpty(value)) {
      return false;
    }

    // Check if the value is a File object (for file uploads)
    if(status){
      if (value instanceof File) {
        if (isFileEmpty(value)) {
          return false;
        }
      }
    }
  }
  return true;
}

function populateFields(recordId, controller, fields) {
  
  // Retrieve the record data from the server using AJAX and populate the form fields
  $.ajax({
    url: controller + '/get_record',
    type: 'POST',
    data: { id: recordId },
    dataType: 'json',
    success: function(response) {
      $.each(fields, function(index, value) {
        var fieldElement = $('#' + value);

        if (fieldElement.is('select')) {
          // Handle <select> input
          fieldElement.val(response[value]).trigger('change'); // Set selected value and trigger change event
        }else if (fieldElement.is('.daterange')) {
          fieldElement.daterangepicker({
            opens: 'left',
            // Add any other DateRangePicker options as needed
          });
          var initialStartDate = moment(response.tanggal_mulai);
          var initialEndDate = moment(response.tanggal_selesai);
          fieldElement.data('daterangepicker').setStartDate(initialStartDate);
          fieldElement.data('daterangepicker').setEndDate(initialEndDate);
          fieldElement.val(initialStartDate.format('MM/DD/YYYY') + ' - ' + initialEndDate.format('MM/DD/YYYY'));
        } else {
          // Handle other input types
          fieldElement.val(response[value]);
        }
      });
    }
  });
}
function deleteRecord(recordId, controller){
  // Show SweetAlert confirmation dialog
  Swal.fire({
    title: 'Are you sure?',
    text: "You won't be able to revert this!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#d33',
    cancelButtonColor: '#3085d6',
    confirmButtonText: 'Yes, delete it!'
  }).then((result) => {
    if (result.isConfirmed) {
      // If user confirms the deletion, perform AJAX delete request
      $.ajax({
        url: controller + '/delete/' + recordId,
        type: 'POST',
        dataType: 'json',
        success: function(response) {
          if (response.success) {
            // Show success toast notification
            Toast.fire({
              icon: 'success',
              title: response.message
            })
            setTimeout(() => {
              location.reload();
            }, 1000);
          } else {
            // Show error toast notification
            toastr.error('Failed to delete record.');
          }
        },
        error: function(xhr, status, error) {
          // Show error toast notification
          toastr.error('An error occurred while deleting the record.');
        }
      });
    }
  });
  
}

//Update Data With Ajax
document.querySelectorAll('.updtBtn').forEach((button) => {
  button.addEventListener('click', (event) => {
    event.preventDefault();
    var form = document.querySelector("#form_edit");
    var formData = new FormData(form);
    const { controller } = button.dataset;   
    if(checkFields(formData,false)){
      $.ajax({
        url: controller + '/edit',
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
          var respars = JSON.parse(response);
          // If the response is successful, display a success message
          if (respars.success) {
            Toast.fire({
              icon: 'success',
              title: '&nbsp;Anda Berhasil Merubah Data Surat!'
            })
            setTimeout(() => {
              location.reload();
            }, 1000);
          } else {
            alert('fail')
            // If the response is an error, display an error message
            // swal("Error inserting data!", { icon: "error" });
          }
        },
        error: function(error) {
          // If there is an error, display an error message
          swal("Error inserting data!", { icon: "error" });
        }
      });
    }else{
      alert('isi dlu semuanya ya');
    }
  });
});


//Create Data With Ajax
document.querySelectorAll('.addBtn').forEach((button) => {
  button.addEventListener('click', (event) => {
    event.preventDefault();
    var form = document.querySelector("#form_add");
    var formData = new FormData(form);
    const { controller } = button.dataset;   
    console.log(formData.entries())
    if(checkFields(formData,true)){
      $.ajax({
        url: controller + '/create',
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
          var respars = JSON.parse(response);
          // If the response is successful, display a success message
          if (respars.success) {
            Toast.fire({
              icon: 'success',
              title: '&nbsp;Anda Berhasil Menambah Surat!'
            })
            setTimeout(() => {
              location.reload();
            }, 1000);
          } else {
            alert('fail')
            // If the response is an error, display an error message
            // swal("Error inserting data!", { icon: "error" });
          }
        },
        error: function(error) {
          // If there is an error, display an error message
          swal("Error inserting data!", { icon: "error" });
        }
      });
    }else{
      alert('isi dlu semuanya ya');
    }
  });
});

document.querySelectorAll('.deltBtn').forEach((button) => {
  button.addEventListener('click', () => {
    const { id, controller } = button.dataset;
    deleteRecord(id, controller);
  });
});

const edtButtons = document.querySelectorAll('.edtBtn');
// Attach event listener to each delete button
edtButtons.forEach((button) => {
  button.addEventListener('click', function() {
    // Show SweetAlert2 confirmation modal
    var recordId = $(this).data('id');
    var controller = $(this).data('controller');
    var fields = $(this).data('fields');
    populateFields(recordId, controller, fields);
  });
});

//Display PDF Data With Ajax
document.querySelectorAll('.disPdf').forEach((button) => {
  button.addEventListener('click', (event) => {
    alert('display');
  });
});

const pdfUploads = document.querySelectorAll('.pdf');
// Attach event listener to each delete button
pdfUploads.forEach((button) => {
  button.addEventListener('change', function() {
    var file = this.files[0];
    var label = document.querySelector('.custom-file-label');
    if (file) {
        var fileName = file.name;
        var fileExtension = fileName.split('.').pop().toLowerCase();

        if (fileExtension === 'pdf') {
            label.textContent = fileName;
        } else {
            label.textContent = 'Choose file';
            this.value = ''; // Clear the selected file
            alert('Hanya Boleh Memasukkan File Pdf');
        }
    } else {
        label.textContent = 'Choose file';
    }
  });
});










// Get all delete buttons
const deleteButtons = document.querySelectorAll('.deleteBtn');

// Attach event listener to each delete button
deleteButtons.forEach((button) => {
  button.addEventListener('click', function() {
    // Show SweetAlert2 confirmation modal
    Swal.fire({
      title: 'Konfirmasi Penghapusan',
      text: 'Anda Yakin Ingin Menghapus Data Ini?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#d33',
      cancelButtonColor: '#3085d6',
      confirmButtonText: 'Hapus',
    }).then((result) => {
      if (result.isConfirmed) {
        // Perform delete operation here

        // Show success notification
        Swal.fire('Deleted!', 'The item has been deleted.', 'success');
      }
    });
  });
});

// Get all delete buttons
const konfirButtons = document.querySelectorAll('.konfirBtn');

// Attach event listener to each delete button
konfirButtons.forEach((button) => {
  button.addEventListener('click', function() {
    Swal.fire({
      title: 'Konfirmasi Cuti?',
      text: 'Mohon periksa kembali semua data pengajuan cuti terlampir. Pastikan semua informasi sudah sesuai.',
      icon: 'warning',
      showDenyButton: true,
      showCancelButton: true,
      confirmButtonText: 'Terima',
      denyButtonText: `Tolak`,
      cancelButtonText: `Batal`,
      customClass: {
        confirmButton: 'btn btn-primary',
        denyButton: 'btn btn-secondary',
        cancelButton: 'btn btn-secondary'
      },
    }).then((result) => {
      /* Read more about isConfirmed, isDenied below */
      if (result.isConfirmed) {
        Swal.fire('Saved!', '', 'success')
      } else if (result.isDenied) {
        Swal.fire('Changes are not saved', '', 'info')
      }
    })
  });
});

// Get all delete buttons
const editButtons = document.querySelectorAll('.editBtn');

// Attach event listener to each delete button
editButtons.forEach((button) => {
  button.addEventListener('click', function() {
    // Show SweetAlert2 confirmation modal
    Swal.fire({
      title: 'Apakah Anda Yakin Ingin Mengubah Data Cuti Ini?',
      text: 'Silahkan perkisa kembali dan pastikan sudah sesuai',
      icon: 'warning',
      showDenyButton: true,
      showCancelButton: true,
      confirmButtonText: 'Terima',
      denyButtonText: `Tolak`,
      cancelButtonText: `Batal`,
      customClass: {
        confirmButton: 'btn btn-primary',
        denyButton: 'btn btn-secondary',
        cancelButton: 'btn btn-secondary'
      },
    }).then((result) => {
      if (result.isConfirmed) {
        // Perform delete operation here

        // Show success notification
        Swal.fire('Deleted!', 'The item has been deleted.', 'success');
      }
    });
  });
});

const absenButtons = document.querySelectorAll('.absenBtn');

// Attach event listener to each delete button
absenButtons.forEach((button) => {
  button.addEventListener('click', function() {
    // Show SweetAlert2 confirmation modal
    Swal.fire({
      title: 'Absensi Hadir Kegiatan Rapat Ini?',
      text: 'Silahkan perkisa kembali dan pastikan sudah sesuai',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Hadir',
      cancelButtonText: `Batal`,
      customClass: {
        confirmButton: 'btn btn-primary',
        cancelButton: 'btn btn-secondary'
      },
    }).then((result) => {
      if (result.isConfirmed) {
        // Perform delete operation here

        // Show success notification
        Swal.fire('Deleted!', 'The item has been deleted.', 'success');
      }
    });
  });
});
