

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-10 text-center">
            <hr>
            <h3> Student Account Requests</h3>
        </div>
    </div> 
<div class="row justify-content-center">
    <div class="col-md-12 table-responsive-sm ">
    <?php if (isset($_GET['success'])) { ?>
            <p class="text-success"><?php echo $_GET['success']; ?></p>
    <?php unset($_GET['success']);} ?>
        <table class="table table-bordered"  data-sorting="true">
            <thead>
                <tr>
                    <th >Name</th>
                    <th >Username</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Board</th>
                    <th>Grade</th>
                    <th>Number</th>
                    <th>Parents Number</th>
                    <th>State</th>
                    <th>City</th>
                    <th>Aadhar No</th>
                    <th>Aadhar Front</th>
                    <th>Aadhar Back</th>
                    <th>Student ID</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                #display student data 
                $sql=" SELECT * FROM student_data WHERE status='0' ";
                $result = mysqli_query($conn, $sql);
                while($row=$result->fetch_assoc()){
                    #print_r($row); ?>
                    <tr>
                        <td> <?= $row['name']; ?></td>
                        <td> <?= $row['uname']; ?></td>
                        <td> <?= $row['email']; ?></td>
                        <td> <?php if($row['gender']==="1"){ echo "Male";}else{ echo "Female";} ?></td>
                        <td> <?= $row['board']; ?></td>
                        <td> <?= $row['grade']; ?></td>
                        <td> <?= $row['number']; ?></td>
                        <td> <?= $row['pnumber']; ?></td>
                        <td> <?= $row['state']; ?></td>
                        <td> <?= $row['city']; ?></td>
                        <td> <?= $row['aadhar_no']; ?></td>
                        <td> <a href="../assets/student_data/<?php echo $row['uname'];?>/aadhar_front.jpg" download> Download</a></td>
                        <td> <a href="../assets/student_data/<?php echo $row['uname'];?>/aadhar_back.jpg" download> Download</a></td>
                        <td> <a href="../assets/student_data/<?php echo $row['uname'];?>/student_id.jpg" download> Download</a></td>
                        <td class='text-danger'>Not Activated</td>
                        <td> 
                            <?php $uname= $row['uname']?>
                            <a href="admin_operation.php?uname=<?php echo $uname ?>&status=A&rol=S" class="btn btnA" title="Verify" >A</a>
                            <a href="admin_operation.php?uname=<?php echo $uname ?>&status=R&rol=S" class="btn btnR" title="Reject" >R</a>

                              <?php /*  <input value="<?php echo $row['uname']; ?>" name="verify" type="submit" class="btn btn1" >A</input> */?>
                        </td>
                    
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
</div>
