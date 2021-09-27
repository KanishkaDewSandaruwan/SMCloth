<?php require_once 'head.php'; ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                      <div class="row mt-5">
                           <div class="col-md-12 mt-4">
                        <div class="card">
                            <div class="table-responsive">
                                <table class="table v-middle">
                                    <thead>
                                        <tr class="bg-dark">
                                            <th class="border-top-0 text-white">Customer Name</th>
                                            <th class="border-top-0 text-white">Customer Email</th>
                                            <th class="border-top-0 text-white">Subject</th>
                                            <th class="border-top-0 text-white">Message</th>
                                            <th class="border-top-0 text-white">Date</th>
                                            <th class="border-top-0 text-white">Remove Customer</th>
                                        </tr>
                                    </thead>
                                    <?php 
                                    $count=1;
                                      $viewquery = " SELECT * FROM message";
                                      $viewresult = mysqli_query($con,$viewquery);

                                     ?>
                                    <tbody>
                                      <?php while($row = mysqli_fetch_assoc($viewresult)) { ?>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="">
                                                        <h4 class="m-b-0 font-16"><?php echo $row['name']; ?></h4>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><?php echo $row['email']; ?></td>
                                            <td><?php echo $row['subject']; ?></td>
                                            <td>
                                                <label class="label label-danger"><?php echo $row['message']; ?></label>
                                            </td>
                                            <td><?php echo $row['trn_date']; ?></td>
                                            <td><a style="text-decoration: none; color: red; font-size: 15px;" href="delete.php?m_id=<?php echo $row['m_id']; ?>">Delete</a></td>
                                        </tr>
                                        <?php   $count++; } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                                        
                      </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; SM Clothing.2021.</div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>
</html>
