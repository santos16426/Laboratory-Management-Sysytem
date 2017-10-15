<?php
			include('dbcon.php');

		    $query = $connect->prepare("SELECT * FROM product_tbl p LEFT OUTER JOIN user_tbl u ON p.product_user_id=u.user_id LEFT OUTER JOIN producttype_tbl t ON t.producttype_id = p.product_type_id LEFT OUTER JOIN product_status s ON p.product_status = s.productstatus_id  WHERE p.product_status = 2");
			$query->execute();
			$result = $query->get_result();
			$total = mysqli_num_rows($result);

		    $limit = 20;
		    $pages = ceil($total / $limit);
		    $page = min($pages, filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT, array(
			        'options' => array('default'   => 1,'min_range' => 1,),
		    )));

		    $offset = ($page - 1)  * $limit;
		    $start = $offset + 1;
		    $end = min(($offset + $limit), $total);

		    $prevlink = ($page > 1) ? '<a href="?page=1" title="First page">&laquo;</a> <a href="?page=' . ($page - 1) . '" title="Previous page">&lsaquo;</a>' : '<span class="disabled">&laquo;</span> <span class="disabled">&lsaquo;</span>';

		    $nextlink = ($page < $pages) ? '<a href="?page=' . ($page + 1) . '" title="Next page">&rsaquo;</a> <a href="?page=' . $pages . '" title="Last page">&raquo;</a>' : '<span class="disabled">&rsaquo;</span> <span class="disabled">&raquo;</span>';

		    $query = $connect->prepare("
		    	SELECT * FROM product_tbl p LEFT OUTER JOIN user_tbl u ON p.product_user_id=u.user_id LEFT OUTER JOIN producttype_tbl t ON t.producttype_id = p.product_type_id LEFT OUTER JOIN product_status s ON p.product_status = s.productstatus_id  WHERE p.product_status = 2
		        LIMIT 
		            ?
		        OFFSET
		            ?"
		     );

		    $query->bind_param('ii', $limit, $offset);
		    $query->execute();
		    $result = $query->get_result();
		    $row_cnt = mysqli_num_rows($result);		

		    $action = isset($_GET['action']) ? $_GET['action'] : "";
 
		

		    if ($row_cnt > 0) {
		    	echo "<ul class='rig columns-3'>";
					while($row = mysqli_fetch_array($result)){
						
			        }
			    echo "</ul>";
		    }

		    else {
		        echo '<p>No results could be displayed.</p>';
		    }

		    echo '<ul class="cd-pagination no-space move-buttons custom-icons"><li class=button>', $prevlink, '</li>';

		    for($i=1;$i<$pages+1;$i++)
		    {
		    	 echo '<li><a href="?page='. $i .'">', $i ,'</a></li>';
		    }

		    echo '<li class=button>', $nextlink, '</li></ul>';
	    ?>