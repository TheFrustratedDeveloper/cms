<table class="table table-bordered table-hover text-center">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>UserName</th>
                                    <th>Profile</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>IS</th>
                                    <th>FOR</th>
                                    <th colspan="3">Options</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                    
                                </tr>
                            </thead>
                            <?php 
                                //view all post 
                                $selectAllfromUsers = "SELECT users.user_id,users.username,users.user_image,users.first_name,users.last_name,users.email,users.role,role.role_title FROM users LEFT JOIN role ON users.for_role = role.role_id;";
                                $showAllfromusers = mysqli_query($connect,$selectAllfromUsers);
                                while($row = mysqli_fetch_assoc($showAllfromusers)){
                                    $usrID = $row['user_id'];
                                    $username = $row['username'];
                                    $profilePic = $row['user_image'];
                                    $fName = $row['first_name'];
                                    $lName = $row['last_name'];
                                    $email = substr($row['email'],0,11);
                                    $role = $row['role'];
                                    $roleTitle = $row['role_title'];
                                    //Print into table                    
                                    echo "<tr>";
                                    echo "<td>$usrID</td>";
                                    echo "<td>$username</td>";
                                    echo "<td><img width='30' height='30' src='../images/users/$profilePic' alt='$profilePic'></td>";
                                    echo "<td>$fName</td>";
                                    echo "<td>$lName</td>";
                                    echo "<td>$email...</td>";
                                    echo "<td>$role</td>";
                                    if($roleTitle == null){
                                        echo "<td>...</td>";
                                    }else{
                                        echo "<td>$roleTitle</td>";
                                    }
                                    
                                    echo "<td class='bg-info'><a class='btn btn-primary' href='users_list.php?adminApprove=$usrID&username=$username'>Admin</a></td>";
                                    echo "<td class='bg-success'><a class='btn btn-success' href='users_list.php?contentW=$usrID&username=$username'>Content Writer</a></td>";
                                    echo "<td class='bg-warning'><a class='btn btn-warning' href='users_list.php?block=$usrID'>Block</a></td>";
                                    echo "<td class='bg-info'><a class='btn btn-info' href='users_list.php?source=editUser&id=$usrID'>Edit</a></td>";
                                    echo "<td class='bg-danger'><a onClick=\"javascript : return confirm('Are you Sure to Delete This ?'); \" class='btn btn-danger' href='users_list.php?delete=$usrID'>Delete</a></td>";
                                    echo "</tr>";
                                }
                                //delete comment
                                deleteUser();
                                //Admin Approve
                                makeAdmin();
                                //Subscriber Approved
                                makeContentC();
                                //blocking user
                                blockThatUser();
                            ?>
</table>