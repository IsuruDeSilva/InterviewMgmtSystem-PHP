<?php

    include 'config.php';

    $sql = "SELECT * FROM user";
            $query = $conn->query($sql);
            echo "$query->num_rows";

?>