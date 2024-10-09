<?php include('main_header/header.php'); ?>

<!-- ============================================================== -->
<!-- Left Sidebar -->
<!-- ============================================================== -->
<?php include('left_sidebar/sidebar.php'); ?>
<!-- ============================================================== -->
<!-- End Left Sidebar -->
<!-- ============================================================== -->

<!-- Wrapper -->
<div class="dashboard-wrapper">
    <div class="container-fluid dashboard-content">
        
        <!-- ============================================================== -->
        <!-- Pageheader -->
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
        <!-- End Pageheader -->
        <!-- ============================================================== -->

        <!-- ============================================================== -->
        <!-- Table -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">Request Information</h5>
                    <div class="card-body">
                        <div id="message"></div>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered first" attribute="data-show-print" type="boolean">
                                <thead>
                                    <tr>
                                        <th>Date Requested</th>
                                        <th>Control No.</th>
                                        <th>Student ID</th>
                                        <th>Document Name</th>
                                        <th>No. of Copies</th>
                                        <th>Mode Request</th>
                                        <th>Date Releasing</th>
                                        <th>Processing Officer</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $conn = new class_model();
                                    $docrequest = $conn->fetchAll_documentrequest();
                                    foreach ($docrequest as $row) { ?>
                                        <tr>
                                            <td><?= date("M d, Y", strtotime($row['date_request'])); ?></td>
                                            <td><?= $row['control_no']; ?></td>
                                            <td><?= $row['student_id']; ?></td>
                                            <td><?= $row['document_name']; ?></td>
                                            <td><?= $row['no_ofcopies']; ?></td>
                                            <td><?= $row['mode_request']; ?></td>
                                            <td>
                                                <?= !empty($row['date_releasing']) ? date("M d, Y", strtotime($row['date_releasing'])) : ''; ?>
                                            </td>
                                            <td><?= $row['processing_officer']; ?></td>
                                            <td>
                                                <?php 
                                                switch ($row['dean_status']) {
                                                    case 'Pending':
                                                        echo '<span class="badge bg-warning text-white">Pending</span>';
                                                        break;
                                                    case 'Waiting for Payment':
                                                        echo '<span class="badge bg-info text-white">Waiting for Payment</span>';
                                                        break;
                                                    case 'Releasing':
                                                        echo '<span class="badge bg-success text-white">Verified</span>';
                                                        break;
                                                    case 'Received':
                                                        echo '<span class="badge bg-warning text-white">Pending Request</span>';
                                                        break;
                                                    case 'Declined':
                                                        echo '<span class="badge bg-danger text-white">Declined</span>';
                                                        break;
                                                }
                                                ?> 
                                            </td>
                                            <td class="align-right">
                                                <?php if ($row['dean_status'] !== 'Released') { ?>
                                                    <a href="edit-request.php?request=<?= $row['request_id']; ?>&student-number=<?= $row['student_id']; ?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                                        <i class="fa fa-edit"></i>
                                                    </a> | 
                                                    <a href="Track-document.php?request=<?= $row['request_id']; ?>&student-number=<?php echo $row['student_id']; ?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                                          <i class="fa fa-eye"></i>
                                                        </a> 
                                                <?php } ?>
                                                <a href="<?php 
                                                switch ($row['dean_status']) {
                                                    case 'Pending':
                                                        echo 'email-form-p.php';
                                                        break;
                                                    case 'Received':
                                                        echo 'email-form-r.php';
                                                        break;
                                                    case 'Waiting for Payment':
                                                        echo 'email-form-wfp.php';
                                                        break;
                                                    case 'Releasing':
                                                        echo 'email-form.php';
                                                        break;
                                                    case 'Declined':
                                                        echo 'email-form-dc.php';
                                                        break;
                                                    case 'Released':
                                                        echo 'email-form-rl.php';
                                                        break;
                                                }
                                                ?>?request=<?= $row['request_id']; ?>&student-number=<?= $row['student_id']; ?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Send Email">
                                                    <i class="fa fa-envelope"></i>
                                                </a> 
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
        <!-- ============================================================== -->
        <!-- End Table -->
        <!-- ============================================================== -->

    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->

<!-- Optional JavaScript -->
<script src="../assets/vendor/jquery/jquery-3.3.1.min.js"></script>
<script src="../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
<script src="../assets/vendor/custom-js/jquery.multi-select.html"></script>
<script src="../assets/libs/js/main-js.js"></script>
<script src="../assets/vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="../assets/vendor/datatables/js/dataTables.bootstrap4.min.js"></script>
<script src="../assets/vendor/datatables/js/buttons.bootstrap4.min.js"></script>
<script src="../assets/vendor/datatables/js/data-table.js"></script>

<script>
    $(document).ready(function() {
        var firstName = $('#firstName').text();
        var lastName = $('#lastName').text();
        var initials = firstName.charAt(0) + lastName.charAt(0);
        $('#profileImage').text(initials);

        // Load unseen notifications
        load_unseen_notification();
        $(document).on('click', '.dropdown-toggle', function() {
            $('.count').html('');
            load_unseen_notification('yes');
        });

        setInterval(function() {
            load_unseen_notification();
        }, 5000);

        function load_unseen_notification(view = '') {
            $.ajax({
                url: "../init/controllers/fetch.php",
                method: "POST",
                data: { view: view },
                dataType: "json",
                success: function(data) {
                    $('.dropdown-menu_1').html(data.notification);
                    if (data.unseen_notification > 0) {
                        $('.count').html(data.unseen_notification);
                    }
                }
            });
        }

        // Delete request
        $(document).on('click', '.delete', function() {
            var request_id = $(this).attr("data-id");
            if (confirm("Are you sure want to remove this data?")) {
                $.ajax({
                    url: "../init/controllers/delete_request.php",
                    method: "POST",
                    data: { request_id: request_id },
                    success: function(response) {
                        $("#message").html(response);
                    },
                    error: function(response) {
                        console.log("Failed");
                    }
                });
            }
        });
    });
</script>

</body>
</html>
