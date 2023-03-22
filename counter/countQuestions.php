<?php

    include 'config.php';

    $sql = "SELECT * FROM questions";
            $query = $conn->query($sql);
            echo "$query->num_rows";

?>