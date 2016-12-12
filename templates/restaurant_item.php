<div id="content">
	
	<div id="restaurant information">	
		<?php
			$result = getRestaurantItem($db, array($_GET['id']));
			$categories = getRestaurantFood($db,$_GET['id']);
			if($result['id_owner'] == $_SESSION['id_account']){
				?>
				<input action="edit_restaurant.php" class="button_1 button" type="submit" value="Edit Restaurant">
				<input action="action_delete_restaurant.php" class="button_1 button" type="submit" value="Delete Restaurant">
				<?php
			}
			
			echo '<h1>' . $result['name'] . '</h1>';
			echo '<h3> Rating : ' . $result['stars'] . '</h3>';
			echo '<h4> Address : ' . $result['address'] . '</h4>';
			echo '<p> Description :</p>';
			echo '<p>' . $result['description'] . '</p>';
			
			echo '<p> Average Price : ' . $result['avg_price'] . '</p>';
			
			echo '<p> Function Time : from ' . $result['open_time'] . ' to ' . $result['close_time'];
			if($result['monday']) echo ', Monday';
			if($result['tuesday']) echo ', Tuesday';
			if($result['wednesday']) echo ', Wednesday';
			if($result['thursday']) echo ', Thursday';
			if($result['friday']) echo ', Friday';
			if($result['saturday']) echo ', Saturday';
			if($result['sunday']) echo ', Sunday';
			echo '</p>';
			
			
			echo '<p> Categories : ';
			foreach($categories as $category)
				echo $category['id_category'] . '  ';
			echo '</p>';
				
			echo '<img src="images/'. $result['name'] . '_0" alt="Image" width="500px">'
		?>
	</div>
	<div>
		<h2 class="subtitle"> Comments </h2>
		
		<?php
		
			if($_SESSION['type'] == "reviewer"){
				include('review_form.php');
			}
			
			$reviews = getAllReviews($db, $_GET['id']);
			
			foreach($reviews as $review){
				echo '<div class="review">';
					echo '<p>From: ' . $review['id_reviewer'] . '</p>';
					echo '<p>Score: ' . $review['score'] . '</p>';
					echo '<p>Comment: ' . $review['comment'] . '</p>';
					
					$replies = getReply($db,$review['id_review']);
					
					foreach($replies as $reply){
						echo '<div class="review">';
							echo '<p>From: ' . $reply['id_replyer'] . '</p>';
							echo '<p>Reply: ' . $reply['comment'] . '</p>';
						echo '</div>';
					}
					
					if($_SESSION['id_account'] == $result['id_owner'] || $_SESSION['id_account'] == $review['id_reviewer']){ ?>
						<form action="action_add_reply.php" class = "big_form" method="post">
							<fieldset>
								<legend> Reply </legend>
								
								<?php 
									echo '<input type="hidden" name="id_restaurant" value="' . $review['id_restaurant'] . '">';
									echo '<input type="hidden" name="id_review" value="' . $review['id_review'] . '">';
								?>
								<textArea type="text" class="max_width big_textArea" name="comment"></textArea>
								<input class="button_1 button" type="submit" value="Send" >
							</fieldset>
						</form>
					<?php
					}						
					
				echo '</div>';
			}
		?>
	</div>
	
</div>