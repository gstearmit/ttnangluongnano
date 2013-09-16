<?php

// Loop tieu chuan cua WP, hien thi post dua tren cau lenh truy van URL
if(have_posts()) : while(have_posts()) : the_post();
//.......
endwhile; else:
//........
endif;

?>

<?php 
 // su dung query_posts de sua lai cau truc mac dinh cua loop.
// co 5 bai viet hiển hị trên một trang  và id cửa catalogue là 3
    query_posts('posts_per_page=5&cat=3&orderby=rand');
    if(have_posts()) : while(have_posts()) : the_post();
    
    //....
    endwhile; else:
    //....
    endif;
    wp_reset_query();
?>

<?php //su dung $query_string de bao toan cau lenh truy van URL
    global $query_string;
    $posts = query_posts($query_string.'posts_per_page=5&cat=3&orderby=rand');
    if(have_posts()) : while(have_posts()) : the_post();
    
    //....
    endwhile; else:
    
    //....
    endif;
    wp_reset_query();
?>

<?php // su dung Class new WP_Query de chinh sua hoac tao loop moi hoac nhieu loop tren mot trang
    $featured = new WP_Query('posts_per_page=5&cat=3&orderby=rand');
    while($featured->have_posts()) : $featured->the_post();
    //....
    endwhile;
    wp_reset_postdata();
    
?>

<?php //cach thuc an toan nhat de tao mot loop rieng biet hoac nhieu loop tren mot trang
    global $post;
    $args = array('numberposts'=>3, 'category'=>5,6,7, 'orderby'=>'rand');
    $custom_posts = get_posts($args);
    foreach($custom_posts as $post) : setup_postdata($post);
    //...
    endforeach;
    wp_reset_postdata();
    
?>