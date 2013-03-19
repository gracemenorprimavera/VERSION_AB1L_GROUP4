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
		$w=array(30,30,55,25,20,20);
		//Header
		for($i=0;$i<count($header);$i++)
			$this->Cell($w[$i],7,$header[$i],1,0,'C');
		$this->Ln();
		//Data
		foreach ($data as $eachResult) 
		{
			//$this->Cell(30,6,$eachResult["tran_id"],1);
			$this->Cell(30,6,$eachResult["quantity"],1);
			$this->Cell(55,6,$eachResult["product_name"],1);
			$this->Cell(25,6,$eachResult["product_price"],1,0,'C');
			$this->Ln();
		}
	}

	//Better table
	function ImprovedTable($header,$data)
	{
		//Column widths
		$w=array(20,30,55,25,25,25);
		//Header
		for($i=0;$i<count($header);$i++)
			$this->Cell($w[$i],7,$header[$i],1,0,'C');
		$this->Ln();
		//Data

		foreach ($data as $eachResult) 
		{
			//$this->Cell(30,6,$eachResult["tran_id"],1);
			$this->Cell(30,6,$eachResult["quantity"],1);
			$this->Cell(55,6,$eachResult["product_name"],1);
			$this->Cell(25,6,$eachResult["product_price"],1,0,'C');
			$this->Ln();
		}

		//Closure line
		$this->Cell(array_sum($w),0,'','T');
	}

	//Colored table
	function FancyTable($header,$data)
	{
		//Colors, line width and bold font
		$this->SetFillColor(255,0,0);
		$this->SetTextColor(255);
		$this->SetDrawColor(128,0,0);
		$this->SetLineWidth(.3);
		$this->SetFont('','B');
		//Header
		$w=array(20,30,55,25,25,25);
		for($i=0;$i<count($header);$i++)
			$this->Cell($w[$i],7,$header[$i],1,0,'C',true);
		$this->Ln();
		//Color and font restoration
		$this->SetFillColor(224,235,255);
		$this->SetTextColor(0);
		$this->SetFont('');
		//Data
		$fill=false;
			foreach ($data as $eachResult) 
		{
			//$this->Cell(30,6,$eachResult["tran_id"],1);
			$this->Cell(30,6,$eachResult["quantity"],1);
			$this->Cell(55,6,$eachResult["product_name"],1);
			$this->Cell(25,6,$eachResult["product_price"],1,0,'C');
			$this->Ln();
		}
		$this->Cell(array_sum($w),0,'','T');
	}
}

$pdf=new PDF();
//Column titles
$header=array(/*'tran_id',*/'quantity','product_name','product_price');
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
//$pdf->Image('localhost/MiBuSIS/layout/header3.png',80,8,33);
$pdf->Ln(35);
$pdf->BasicTable($header,$resultData);

//*** Table 2 ***//
//$pdf->AddPage();
//$pdf->Image('localhost/MiBuSIS/layout/header3.png',80,8,33);
//$pdf->Ln(35);
//$pdf->ImprovedTable($header,$resultData);

//*** Table 3 ***//
//$pdf->AddPage();
//$pdf->Image('localhost/MiBuSIS/layout/header3.png',80,8,33);
//$pdf->Ln(35);
//$pdf->FancyTable($header,$resultData);

$pdf->Output("MyPDF.pdf","F");
?>

<div class="logout_div">
	<?php echo anchor('portal/index', 'Logout'); ?>
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