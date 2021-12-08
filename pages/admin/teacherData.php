

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-10 text-center">
            <hr>
            <h3> Teachers Data </h3>
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
                    <th>Subject</th>
                    <th>Experience</th>
                    <th>Skills</th>
                    <th>Price/hr</th>
                    <th>Price/month</th>
                    <th>Number</th>
                    <th>Rating</th>
                    <th>No of Rating's</th>
                    <th>Aadhar No</th>
                    <th>Aadhar Front</th>
                    <th>Aadhar Back</th>
                    <th>Doc</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                #display teacher data 
                $sql=" SELECT * FROM teacher_data WHERE status!='0'";
                $result = mysqli_query($conn, $sql);
                while($row=$result->fetch_assoc()){
                    #print_r($row); ?>
                    <tr>
                        <td> <?= $row['name']; ?></td>
                        <td> <?= $row['uname']; ?></td>
                        <td> <?= $row['email']; ?></td>
                        <td> <?php if($row['gender']==="1"){ echo "Male";}else{ echo "Female";} ?></td>
                        <td> <?= $row['subject']; ?></td>
                        <td> <?= $row['experience']; ?></td>
                        <td> <?= $row['skills']; ?></td>
                        <td> <?= $row['price']; ?></td>
                        <td> <?= $row['priceOrg']; ?></td>
                        <td> <?= $row['number']; ?></td>
                        <td> <?= $row['rating']; ?></td>
                        <td> <?= $row['norating']; ?></td>
                        <td> <?= $row['aadhar_no']; ?></td>
                        <td> <a href="../assets/teacher_data/<?php echo $row['uname'];?>/aadhar_front.jpg" download> Download</a></td>
                        <td> <a href="../assets/teacher_data/<?php echo $row['uname'];?>/aadhar_back.jpg" download> Download</a></td>
                        <td> <a href="../assets/teacher_data/<?php echo $row['uname'];?>/proof_doc.jpg" download> Download</a></td>
                        <?php 
                            if($row['status']==='1'){ ?>
                                <td class='text-success'>Activated</td>
                                <td> 
                                    <?php $uname= $row['uname']?>
                                    <a href="admin_operation.php?uname=<?php echo $uname ?>&status=B&rol=T" class="btn btnR" title="Block" >Block</a>
                                </td>
                            <?php } else if($row['status']==='2'){ ?>
                                <td class='text-danger'>Rejected</td>

                            <?php } else if($row['status']==='3'){ ?>
                                <td class='text-danger'>Blocked</td>
                                <td> 
                                <?php $uname= $row['uname']?>
                                    <a href="admin_operation.php?uname=<?php echo $uname ?>&status=UNB&rol=T" class="btn btnA" title="Block" >Unblock</a>
                                </td>
                            <?php }else if($row['status']==='4'){ ?>
                                <td  class='text-danger'>Under OTP Verification</td>
                                <?php }?>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
</div>
