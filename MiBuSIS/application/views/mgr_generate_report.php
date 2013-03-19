<?php include 'resources.php'; ?>

<html>
<head>
	<title>Mgr Home</title>
</head>
<body>

<?php
require('pdf/fpdf.php');

class PDF extends FPDF
{
	//Load data
	function LoadData($file)
	{
		//Read file lines
		$lines=file($file);
		$data=array();
		foreach($lines as $line)
			$data[]=explode(';',chop($line));
		return $data;
	}

	//Simple table
	function BasicTable($header,$data)
	{
		//Header
		$w=array(15,55,25,25);
		//Header
		for($i=0;$i<count($header);$i++)
			$this->Cell($w[$i],7,$header[$i],1,0,'C');
		$this->Ln();
		//Data
		foreach ($data as $eachResult) 
		{
			$this->Cell(15,6,$eachResult["quantity"],1,0,'C');
			$this->Cell(55,6,$eachResult["product_name"],1);
			$this->Cell(25,6,$eachResult["product_price"],1,0,'C');
			$this->Cell(25,6,$eachResult["subtotal"],1,0,'C');
			$this->Ln();
		}
	}

}

$pdf=new PDF();
//Column titles
$header=array('quantity','product_name','product_price','subtotal');
//Data loading

//*** Load MySQL Data ***//
$objConnect = mysql_connect('localhost', 'root', '') or die("Error Connect to Database");
$objDB = mysql_select_db('mibusis',$objConnect);
$objQuery = mysql_query("SELECT * FROM transactions",$objConnect) or die('Cannot Execute:'. mysql_error());
$resultData = array();
for ($i=0;$i<mysql_num_rows($objQuery);$i++) {
	$result = mysql_fetch_array($objQuery);
	array_push($resultData,$result);
}
//************************//



$pdf->SetFont('Arial','',10);

//*** Table 1 ***//
$pdf->AddPage();
$pdf->SetLeftMargin(45);
$pdf->Image('37775_133264393382068_1100555_n.jpg',80,8,33);
$pdf->Ln(35);
$pdf->BasicTable($header,$resultData);

$pdf->Output("MyPDF.pdf","F");
?>

<div class="logout_emp">
	<?php echo anchor('portal/index', '<img src="'.base_url().'layout/logoutbutton.png" height="45" width="90"/>'); ?>
</div>

<div class="mgr_nav">
	<?php include('mgr_nav.php') ?>
</div>

<div class="mgr_display">
	PDF generated!
	<br>
	<?php
		echo anchor('portal/download', 'Download Report');

	?>
</div>


</body>
</html>