Database Name  -    CMS
Tables Name    -        category
                        , posts
                        , comments
                        
                        
                        
                        
                        
                        
                        
                        category
                            cat_id          int         3   primary key     auto_increment
                            cat_title       varchar     32
                        
                        posts
                            post_id         int         3   primary key     auto_increment 
                            cat_id          int         3
                            post_title      varchar     32
                            post_author     varchar     32
                            post_date       date
                            post_img        text
                            post_content    text
                            post_tag        varchar     50
                            post_cmt_count  int         4
                            post_status     varchar     20                                     default:draft

                        comments
                            cmt_id          int         3   primary key     auto_increment
                            cmt_post_id     int         3
                            cmt_author      varchar     32
                            cmt_email       varchar     64  null
                            cmt_content     text
                            cmt_status      varchar     32                                      default:draft
                            cmt_date        date

API USED : GOOGLE CHARTS, TINYMCE