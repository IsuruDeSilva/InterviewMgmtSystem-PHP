<?php

    include 'config.php';

    $sql = "SELECT * FROM candidates";
            $query = $conn->query($sql);
            echo "$query->num_rows";

?>