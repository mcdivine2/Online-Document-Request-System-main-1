       <?php include('main_header/header.php');?>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
         <?php include('left_sidebar/sidebar.php');?>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="container-fluid  dashboard-content">
                <!-- ============================================================== -->
                <!-- pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                             <h2 class="pageheader-title"><i class="fa fa-fw fa-file"></i> Document Request </h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Document Request</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end pageheader -->
                <!-- ============================================================== -->
               
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header">Request Information</h5>
            <div class="card-body">
                <div id="message"></div>
                <div class="table-responsive">
                    <a href="add-request.php" class="btn btn-sm" style="background-color:#1269AF !important; color:white">
                        <i class="fa fa-fw fa-plus"></i> Add Request
                    </a><br><br>
                    <table class="table table-striped table-bordered first">
                        <thead>
                            <tr>
                                <th scope="col">Control No.</th>
                                <th scope="col">Student ID</th>
                                <th scope="col">Document Name</th>
                                <th scope="col">Total amount</th>
                                <th scope="col">Date Request</th>
                                <th scope="col">Date Releasing</th>
                                <th scope="col">Processing Officer</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                                <th scope="col">Pay</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $student_id = $_SESSION['student_id'];
                                $conn = new class_model();
                                $docrequest = $conn->fetchAll_documentrequest($student_id);
                            ?>
                            <?php foreach ($docrequest as $row) { ?>
                                <tr>
                                    <td><?= $row['control_no']; ?></td>
                                    <td><?= $row['first_name'] .' '. $row['last_name']; ?></td>
                                    <td><?= $row['document_name']; ?></td>
                                    <td><?= $row['price']; ?></td>
                                    <td><?= date("M d, Y", strtotime($row['date_request'])); ?></td>
                                    <td>
                                        <?php 
                                            if ($row['date_releasing'] === "") {
                                                echo "";
                                            } else {
                                                echo date("M d, Y", strtotime($row['date_releasing']));
                                            }
                                        ?>
                                    </td>
                                    <td><?= $row['processing_officer']; ?></td>
                                    <td>
                                        <?php 
                                            if ($row['registrar_status'] === "Pending") {
                                                echo '<span class="badge bg-warning text-white">Pending</span>';
                                            } elseif ($row['registrar_status'] === "Waiting for Payment") {
                                                echo '<span class="badge bg-info text-white">Waiting for Payment</span>';
                                            } elseif ($row['registrar_status'] === "Releasing") {
                                                echo '<span class="badge bg-success text-white">Verified</span>';
                                            } elseif ($row['registrar_status'] === "Received") {
                                                echo '<span class="badge bg-warning text-white">Pending Request</span>';
                                            } elseif ($row['registrar_status'] === "Declined") {
                                                echo '<span class="badge bg-danger text-white">Declined</span>';
                                            }
                                        ?>
                                    </td>
                                    <td class="align-right">
                                        <div class="box">
                                            <div class="four">
                                                <a href="javascript:;" data-id="<?= $row['request_id']; ?>" class="text-secondary font-weight-bold text-xs delete" data-toggle="tooltip" data-original-title="Delete request">
                                                    <i class="fa fa-trash-alt"></i>
                                                </a>
                                            </div>
                                            <div class="three">
                                                <a href="Track-document.php?request=<?= $row['request_id']; ?>&student-number=<?= $row['student_id']; ?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Track document">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#paymentModal" 
                                            data-request-id="<?= $row['request_id']; ?>" 
                                            data-amount="<?= $row['price']; ?>"> <!-- Assuming 'price' is a column in your fetched data -->
                                            <i class="fa fa-credit-card"></i> Pay
                                        </button>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
</div>
    <!-- ============================================================= -->
    <!-- end main wrapper -->
      <!-- ============================================================== -->
<!-- Payment Modal -->
<div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="paymentModalLabel">Confirm Payment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to proceed with the payment for this request?</p>
        <form action="process_payment.php" method="POST" id="paymentForm">
          <input type="hidden" name="request_id" id="request_id">
          <div class="form-group">
            <label for="amount">Amount to Pay</label>
            <input type="text" class="form-control" id="amount" name="amount" readonly>
          </div>
          <!-- Additional fields for payment details can be added here -->
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" form="paymentForm" class="btn btn-success">Confirm Payment</button>
      </div>
    </div>
  </div>
</div>


    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="../asset/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="../asset/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="../asset/vendor/custom-js/jquery.multi-select.html"></script>
    <script src="../asset/libs/js/main-js.js"></script>
    <script src="../asset/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../asset/vendor/datatables/js/dataTables.bootstrap4.min.js"></script>
    <script src="../asset/vendor/datatables/js/buttons.bootstrap4.min.js"></script>
    <script src="../asset/vendor/datatables/js/data-table.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
          var firstName = $('#firstName').text();
          var lastName = $('#lastName').text();
          var intials = $('#firstName').text().charAt(0) + $('#lastName').text().charAt(0);
          var profileImage = $('#profileImage').text(intials);
        });
    </script>
    <script>
    $(document).ready(function() {
        load_data();

        var count = 1;

        function load_data() {
            $(document).on('click', '.delete', function() {

                var request_id = $(this).attr("data-id");
                if (confirm("Are you sure want to remove this data?")) {
                    $.ajax({
                        url: "../init/controllers/delete_request.php",
                        method: "POST",
                        data: {
                            request_id: request_id
                        },
                        success: function(response) {
                            $("#message").html(response);
                        },
                        error: function(response) {
                            console.log("Failed");
                        }
                    })
                }
            });
        }

        // Payment modal functionality
        $('#paymentModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var requestId = button.data('request-id'); // Extract info from data-* attributes
            var amount = button.data('amount'); // Assuming the amount data attribute is passed as well

            var modal = $(this);
            modal.find('#request_id').val(requestId); // Set the request ID in the modal form
            modal.find('#amount').val(amount); // Set the amount in the modal form
        });
    });
</script>

<script>
    $(document).ready(function() {
        function load_unseen_notification(view = '') {
            $.ajax({
                url: "../init/controllers/fetch.php",
                method: "POST",
                data: {
                    view: view
                },
                dataType: "json",
                success: function(data) {
                    $('.dropdown-menu_1').html(data.notification);
                    if (data.unseen_notification > 0) {
                        $('.count').html(data.unseen_notification);
                    }
                }
            });
        }

        // Call the function to load unseen notifications periodically
        setInterval(function() {
            load_unseen_notification();
        }, 5000); // 5 seconds interval
    });
</script>


<script>
$(document).ready(function(){
 
 function load_unseen_notification(view = '')
 {
  $.ajax({
   url:"../init/controllers/fetch.php",
   method:"POST",
   data:{view:view},
   dataType:"json",
   success:function(data)
   {
     $('.dropdown-menu_1').html(data.notification);
    if(data.unseen_notification > 0)
    {
     $('.count').html(data.unseen_notification);
    }
   }
  });
 }
 
 load_unseen_notification();

 $(document).on('click', '.dropdown-toggle', function(){
  $('.count').html('');
  load_unseen_notification('yes');
 });
 
 setInterval(function(){ 
  load_unseen_notification();; 
 }, 4000);
 
});
</script>

</body>
 
</html>