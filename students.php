<?php
require_once 'connection.php';
session_start();
if (isset($_SESSION['user_name'])) {

    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Student List</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">
    </head>

    <body>
    <div class="container my-3">
        <h1 class="text-center">Students List</h1>
        <div class="row my-3">
            <div class="col-6">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Add Student
                </button>
            </div>
            <div class="col-6 text-right">
                <a href="logout.php" class="btn btn-danger" role="button"
                   aria-pressed="true">Logout</a>
            </div>
        </div>
        <form method="get" action="">
            <div class="row my-3">
                <div class="col-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" id="name" class="form-control"
                           value="<?php echo isset($_GET['name']) ? $_GET['name'] : ''; ?>" placeholder="Name"
                           name="name">
                </div>
                <div class="col-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" id="email" class="form-control"
                           value="<?php echo isset($_GET['email']) ? $_GET['email'] : ''; ?>" placeholder="Email"
                           name="email">
                </div>
                <div class="col-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" id="phone" class="form-control" placeholder="Phone"
                           value="<?php echo isset($_GET['phone']) ? $_GET['phone'] : ''; ?>" name="phone">
                </div>
                <div class="col-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" id="address" class="form-control" placeholder="Address"
                           value="<?php echo isset($_GET['address']) ? $_GET['address'] : ''; ?>" name="address">
                </div>
                <div class="col-12 text-right mt-3">
                    <button type="submit" class="btn btn-primary">Search</button>
                    <a href="students.php" class="btn btn-danger" role="button"
                       aria-pressed="true">Clear</a>
                </div>
            </div>
        </form>
        <div id="displayData">
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Serial No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">Email</th>
                    <th scope="col">Address</th>
                    <th scope="col">Status</th>
                    <th scope="col">Operations</th>
                </tr>
                </thead>

                <?php
                //                $sql = "select * from student";
                //search


                /*      if (isset($_GET['name']) && !empty($_GET['name']) ||
                       isset($_GET['email']) && !empty($_GET['email']) ||
                        isset($_GET['phone']) && !empty($_GET['phone']) ||
                         isset($_GET['address']) && !empty($_GET['address'])) {*/

                /*          if(isset($_GET['name']) && !empty($_GET['name'])){
                              $sql .=" where name like '%".$_GET['name']."%'";
                          }

                          if(isset($_GET['email']) && !empty($_GET['email'])){
                              $sql .=" where email like '%".$_GET['email']."%'";
                          }

                          if(isset($_GET['phone']) && !empty($_GET['phone'])){
                              $sql .=" where mobile like '%".$_GET['phone']."%'";
                          }

                          if(isset($_GET['address']) && !empty($_GET['address'])){
                              $sql .=" where address like '%".$_GET['address']."%'";
                          }*/


                //          $sql .= " where name like '%" . $_GET['name'] . "%' AND email like '%" . $_GET['email'] . "%' AND mobile like '%" . $_GET['phone'] . "%' AND address like '%" . $_GET['address'] . "%'";
                //      }

                $sql = "select * from student";
                $has_params = false;
                if (isset($_GET['name']) && !empty($_GET['name'])) {
                    $has_params = true;
                    $sql .= " where name like '%{$_GET['name']}%' ";
                }

                if (isset($_GET['email']) && !empty($_GET['email'])) {
                    if ($has_params) {
                        $sql .= " AND email like '%{$_GET['email']}%' ";
                    } else {
                        $has_params = true;
                        $sql .= " where email like '%{$_GET['email']}%' ";
                    }

                }
                if (isset($_GET['phone']) && !empty($_GET['phone'])) {
                    if ($has_params) {
                        $sql .= " AND mobile like '%{$_GET['phone']}%' ";
                    } else {
                        $has_params = true;
                        $sql .= " where mobile like '%{$_GET['phone']}%' ";
                    }

                }
                if (isset($_GET['address']) && !empty($_GET['address'])) {
                    if ($has_params) {
                        $sql .= " AND address like '%{$_GET['address']}%' ";
                    } else {
                        $has_params = true;
                        $sql .= " where address like '%{$_GET['address']}%' ";
                    }

                }

                echo $sql;
                $result = mysqli_query($con, $sql);

                $number = 1;
                while ($rows = mysqli_fetch_assoc($result)) {

                    $id = $rows['id'];
                    $name = $rows['name'];
                    $mobile = $rows['mobile'];
                    $email = $rows['email'];
                    $address = $rows['address'];
                    $status = $rows['status'];
                    ?>
                    <tr>
                        <td scope="row"><?php echo $number; ?></td>
                        <td><?php echo $name; ?></td>
                        <td><?php echo $mobile; ?></td>
                        <td><?php echo $email; ?></td>
                        <td><?php echo $address; ?></td>
                        <td><?php echo $status; ?></td>

                        <td>
                            <button class="btn btn-primary" onclick="updateuser(<?php echo $id; ?>)">Update</button>
                            <button class="btn btn-danger" onclick="deleteuser(<?php echo $id; ?>)">Delete</button>
                        </td>

                    </tr>
                    <?php
                    $number++;
                }
                ?>
            </table>
        </div>

        <!-- Modal -->
        <div class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog " role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-center" id="exampleModalLabel">Add Student</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="addname" name="name">
                        </div>
                        <div class="form-group">
                            <label for="mobile">Mobile</label>
                            <input type="text" class="form-control" id="addmobile" name="mobile">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="addemail" name="email">
                        </div>


                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control " id="addaddress" name="address">
                        </div>

                        <div class="form-group">
                            <label for="address">Status</label>
                            <select class="form-control" name="status" id="addstatus">
                                <option value="">Select Status</option>
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>

                        </div>
                    </div>
                    <div class="modal-footer">

                        <p class="text-danger" id="feedback"></p>
                        <button type="button" class="btn btn-dark" onclick="addstudent()">Submit</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Update User Modal -->

        <div class="modal fade " id="updatemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog " role="document">

                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-center" id="exampleModalLabel">Update</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group ">
                            <label for="updatename">Name</label>
                            <input type="text" class="form-control" id="updatename" name="name">
                        </div>
                        <div class="form-group">
                            <label for="updatemobile">Mobile</label>
                            <input type="text" class="form-control" id="updatemobile" name="mobile">
                        </div>
                        <div class="form-group ">
                            <label for="updateemail">Email</label>
                            <input type="text" class="form-control" id="updateemail" name="email">
                        </div>

                        <div class="form-group">
                            <label for="address">Status</label>
                            <select class="form-control" name="updatestatus" id="updatestatus">
                                <option value="">Select Status</option>
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>

                        </div>

                        <div class="form-group ">
                            <label for="updateaddress">Address</label>
                            <input type="text" class="form-control " id="updateaddress" name="address">

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" onclick="updatedetails()">Update</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <input type="hidden" id="hiddendata">
                    </div>
                </div>
            </div>
        </div>

        <!--    Delete modal-->

        <div class="modal fade " id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog " role="document">

                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-center" id="exampleModalLabel">Delete</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <h5>Are you sure to Delete?</h5>
                    </div>
                    <div class="modal-footer">

                        <button type="button" class="btn btn-danger" onclick="deletedetails()">Delete</button>

                        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                        <input type="hidden" id="deleteid">
                    </div>
                </div>
            </div>
        </div>

        <!--Modal close-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"></script>

        <script>

            // add student
            function addstudent() {
                var Name = $('#addname').val();
                var Mobile = $('#addmobile').val();
                var Email = $('#addemail').val();
                var Status = $('#addstatus').val();
                var Address = $('#addaddress').val();

                $.ajax({
                    method: "POST",
                    url: 'check_validation.php',
                    data: {name: Name, mobile: Mobile, email: Email, status: Status, address: Address},
                    success: function (data, status) {

                        $('#feedback').html(data)
                        $('#exampleModal').modal('hide')
                        window.location.href = 'students.php';
                        // console.log(status);
                    }
                });
            }

            //delete student
            function deleteuser(deleteid) {
                $('#deleteid').val(deleteid);
                $('#deletemodal').modal('show')
            }

            function deletedetails() {
                var hiddendata = $('#deleteid').val();
                $.ajax({
                    method: "POST",
                    url: 'delete.php',
                    data: {deletesend: hiddendata},
                    success: function (data, status) {

                        $('#deletemodal').modal('hide')

                        window.location.href = 'students.php';
                        // $('#delete').html(data)
                    }
                });
            }

            //updateuser

            function updateuser(updateid) {

                $('#hiddendata').val(updateid);
                $.post("update.php", {updateid: updateid}, function (data, status) {  //post ajax method

                    var userid = JSON.parse(data);

                    $('#updatename').val(userid.name);
                    $('#updatemobile').val(userid.mobile);
                    $('#updateemail').val(userid.email);
                    $('#updatestatus').val(userid.status);
                    $('#updateaddress').val(userid.address);
                });

                $('#updatemodal').modal('show')
            }

            function updatedetails() {

                var updatename = $('#updatename').val();
                var updatemobile = $('#updatemobile').val();
                var updateemail = $('#updateemail').val();
                var updatestatus = $('#updatestatus').val();
                var updateaddress = $('#updateaddress').val();
                var hiddendata = $('#hiddendata').val();

                $.post("update.php", {
                    updatename: updatename,
                    updatemobile: updatemobile,
                    updateemail: updateemail,
                    updatestatus: updatestatus,
                    updateaddress: updateaddress,
                    hiddendata: hiddendata

                }, function (data, status) {
                    $('#updatemodal').modal('hide')
                    window.location.href = 'students.php';
                });
            }

        </script>

    </body>
    </html>

    <?php
} else {
    header("Location:index.php");
}
?>