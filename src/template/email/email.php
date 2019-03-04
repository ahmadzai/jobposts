<?php
if($job_id > 0) {
    ?>
    <p style="padding: 10px;">
        <h4 style="color: dodgerblue">New Job Has Been Posted!</h4>
        <h4 style="color: darkgreen"><?php echo $subject; ?></h4>
        <p><?php echo $body ?></p>
        <p>To confirm or reject it, please press one of below buttons:</p>
        <a target="_blank" style="background-color: #00c0ef;border-radius: 3px;
                                    box-shadow: none;
                                    border: 1px solid #00acd6;
                                    text-align: center;
                                    white-space: nowrap;
                                    vertical-align: middle;
                                    display: inline-block;
                                    padding: 5px 10px;
                                    font-size: 14px;
                                    line-height: 1.5;
                                    text-decoration: none;
                                    color: white"
            href="<?php
            echo 'confirm?id='.base64_encode($job_id)
            //echo $_SERVER['HTTP_HOST'].'/jobposts/public/confirm/?id='.base64_encode($job_id)
            ?>">Confirm</a>
        <a target="_blank" style="background-color: #ba8b00;border-radius: 3px;
                                    box-shadow: none;
                                    border: 1px solid #ba8b00;
                                    text-align: center;
                                    white-space: nowrap;
                                    vertical-align: middle;
                                    display: inline-block;
                                    padding: 5px 10px;
                                    font-size: 14px;
                                    line-height: 1.5;
                                    text-decoration: none;
                                    color: white"
            href="<?php
            echo 'mark_spam?id='.base64_encode($job_id);
            //echo $_SERVER['HTTP_HOST'].'/jobposts/public/mark_spam/?id='.base64_encode($job_id)
            ?>">Reject</a>
    </p>
    <?php
} else {
    ?>
    <p>
        <h4 style="color: dodgerblue">Your Job Post is in Moderation!</h4>
        <p>Your Job Post is in moderation, and will publicly posted after
            reviewing and approving by a moderator</p>
    </p>
<?php
}
?>