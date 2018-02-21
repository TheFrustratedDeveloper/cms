

                mysqli_prepare($connect," ");
                mysqli_stmt_bind_param($stmt,"is",$postID,$postName);
                mysqli_execute($stmt);
                mysqli_stmt_bind_result($stmt,$postID,$blah,$blah);
                while(mysqli_stmt_fetch($stmt)){

                }

                mysqli_prepare($connect," ");
                mysqli_stmt_bind_param($stmt,"is",$postID,$postName);
                mysqli_stmt_execute($stmt);


                prepare
                bind_param
                execute