<?php
// connect to database
require_once 'C:\xampp\htdocs\fodmang\database\database.php';
// get data for dropdown options
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
$article = $_GET['Nom'];
$sql = "SELECT * FROM bkarchive WHERE Nom = '$article'";
$result = mysqli_query($con, $sql);
$html = "";
$mpdf = new Mpdf(['autoLangToFont' => true]);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $uniqueID = $row['N']." ".$row['Nom'];
        $save_path = 'C:\xampp\htdocs\fodmang\controller\qrcodes';
        
        $html .= "<tr>";
        $html .= "<td style='font-family: DejaVu Sans'>" . $row['N'] . "</td>";
        $html .= "<td>";
        QRcode::png($uniqueID, $save_path . $uniqueID . '.png');
        $html .= "<img src='$save_path$uniqueID.png' alt='QRCode'>";
        $html .= "</td>";
        $html .= "</tr>";
    } 
    $mpdf->WriteHTML("<table border='1' style='width:100%'><tr><th>N° inventaire</th><th>QR Code</th></tr>$html</table>");
    $mpdf->Output();
} else {
    echo "0 results";
}
include 'C:\xampp\htdocs\fodmang\views\footer.php'; ?>

