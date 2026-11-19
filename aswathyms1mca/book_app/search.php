
<?php

include 'db.php';

$search_title = $_GET['search_title'];

$sql = "SELECT * FROM books WHERE title LIKE '%$search_title%'";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {

    echo "<h2>Book Details Found</h2>";

    echo "<table border='1' cellpadding='10'>";

    echo "<tr>
            <th>Accession Number</th>
            <th>Title</th>
            <th>Authors</th>
            <th>Edition</th>
            <th>Publisher</th>
          </tr>";

    while ($row = mysqli_fetch_assoc($result)) {

        echo "<tr>";

        echo "<td>" . $row['accession_no'] . "</td>";
        echo "<td>" . $row['title'] . "</td>";
        echo "<td>" . $row['authors'] . "</td>";
        echo "<td>" . $row['edition'] . "</td>";
        echo "<td>" . $row['publisher'] . "</td>";

        echo "</tr>";
    }

    echo "</table>";

} else {

    echo "<h3>No Book Found!</h3>";

}

echo "<br><a href='index.html'>Go Back</a>";

mysqli_close($conn);

?>
