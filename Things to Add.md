
12:53 PM 10/16/2017 Correct Pages names in ADMIN section
06:01 PM 10/17/2017 Add Authors in add posts
07:34 PM 10/22/2017 REAL escape changes needed and mysqli injection protections
07:39 PM 10/22/2017 Need to fix delete things without permisssion 
08:30 PM 10/22/2017 Add contact panel into homepage sidebar
12:32 AM 10/24/2017 Add MODAL into posts,users and categories
01:32 AM 10/26/2017 Fix functions>Edit User for duplications 
04:38 PM 10/26/2017 Edit by Author into edit post page

04:38 PM 10/26/2017 ADMIN-CONTENTWRITERS-SUBSCRIBRS-BLOCKED
15:56 AM 10/30/2017 Add prepared smts 
        category page done


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

fix edit post (status select bar)
fix no subscriber email