<?php
while($row = mysqli_fetch_assoc($sql)){
    $output .= ' <a href="chat_area.php?user_id='.$row['Unique_id'].'">
                    <div class="content">
                        <img src="php/dp/'.$row['image'].'" alt="">
                        <div class="details">
                            <span>'.$row['Name'].'</span>
                            <p>Message</p>
                        </div>
                    </div>
                    <div class="status-dot">
                        <i class="fa fa-circle"></i>
                    </div>
</a>';
}

?>