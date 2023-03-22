<?php

    include 'config.php';

    $sql = "SELECT * FROM comments";
            $query = $conn->query($sql);
            echo "$query->num_rows";

?>