<?php
// Strict output prevention
ini_set('display_errors', 0);
error_reporting(0);
header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');

// Ensure NO output before PDF generation
ob_start();

// Include necessary files
require_once('tcpdf/tcpdf.php');
require_once('config.php');
include("session.php");

// Verify user authentication
if (empty($userid)) {
    die("User not authenticated");
}

class MYPDF extends TCPDF {
    private $headerLogo;

    public function __construct($headerLogo = '') {
        $this->headerLogo = $headerLogo;
        parent::__construct();
    }

    public function Header() {
        // Green and blue header
        $this->SetFillColor(0, 128, 128); // Teal
        $this->Rect(0, 0, $this->getPageWidth(), 30, 'F');

        // Title
        $this->SetFont('helvetica', 'B', 18);
        $this->SetTextColor(255, 255, 255);
        $this->SetY(10);
        $this->Cell(0, 10, 'Expense Report', 0, 1, 'C', false);

        // Subtitle with user name
        $this->SetFont('helvetica', '', 12);
        $this->SetY(20);
        $this->Cell(0, 10, 'Generated for: ' . $GLOBALS['username'], 0, 1, 'C', false);
    }
    
    public function Footer() {
        $this->SetY(-15);
        $this->SetFont('helvetica', 'I', 8);
        $this->SetTextColor(100, 100, 100);
        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages() . ' | ' . date('Y-m-d H:i:s'), 0, 0, 'C');
    }
}

// Create PDF document
$pdf = new MYPDF();

// Set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor($username);
$pdf->SetTitle('Expense Report');
$pdf->SetSubject('Detailed Expense Breakdown');

// Page setup
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
$pdf->SetMargins(15, 35, 15);
$pdf->SetAutoPageBreak(TRUE, 25);

// Add a page
$pdf->AddPage();

// Fetch expenses with additional details
$query = "SELECT e.*, u.firstname, u.lastname 
          FROM expenses e 
          JOIN users u ON e.user_id = u.user_id 
          WHERE e.user_id = '$userid' 
          ORDER BY e.expensedate DESC";
$exp_fetched = mysqli_query($con, $query);

if (!$exp_fetched) {
    die("Query failed: " . mysqli_error($con));
}

// Prepare expense data
$expenses = [];
$total_expense = 0;
$category_totals = [];

while ($row = mysqli_fetch_array($exp_fetched)) {
    $expenses[] = $row;
    $total_expense += $row['expense'];
    
    // Calculate category totals
    $category = $row['expensecategory'];
    $category_totals[$category] = 
        isset($category_totals[$category]) 
        ? $category_totals[$category] + $row['expense'] 
        : $row['expense'];
}

// Summary Section
$pdf->SetFont('helvetica', 'B', 12);
$pdf->SetTextColor(0, 128, 0); // Green
$pdf->Cell(0, 10, 'Expense Summary', 0, 1, 'L');

// Total Expense Box
$pdf->SetFont('helvetica', '', 10);
$pdf->SetFillColor(224, 255, 224); // Light green
$pdf->SetDrawColor(0, 128, 0); // Green border
$pdf->Cell(60, 10, 'Total Expenses', 1, 0, 'L', true);
$pdf->Cell(0, 10, '$' . number_format($total_expense, 2), 1, 1, 'R');

// Detailed Category Breakdown
$pdf->SetFont('helvetica', 'B', 12);
$pdf->SetTextColor(0, 128, 128); // Teal
$pdf->Cell(0, 10, 'Category Breakdown', 0, 1, 'L');

$pdf->SetFont('helvetica', '', 10);
foreach ($category_totals as $category => $amount) {
    $pdf->SetFillColor(224, 255, 255); // Light teal
    $pdf->Cell(60, 8, $category, 1, 0, 'L', true);
    $pdf->Cell(0, 8, '$' . number_format($amount, 2), 1, 1, 'R');
}

// Expense Details Section
$pdf->AddPage();
$pdf->SetFont('helvetica', 'B', 12);
$pdf->Cell(0, 10, 'Detailed Expense Log', 0, 1, 'L');

// Table Header
$pdf->SetFont('helvetica', 'B', 10);
$pdf->SetFillColor(0, 128, 128); // Teal
$pdf->SetTextColor(255, 255, 255);
$pdf->Cell(30, 10, 'Date', 1, 0, 'C', true);
$pdf->Cell(40, 10, 'Category', 1, 0, 'C', true);
$pdf->Cell(0, 10, 'Amount', 1, 1, 'C', true);

// Expense Rows
$pdf->SetFont('helvetica', '', 10);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFillColor(224, 255, 224); // Alternate green

$alternate = false;
foreach ($expenses as $expense) {
    $pdf->SetFillColor($alternate ? 224 : 240, 255, $alternate ? 224 : 255);
    $alternate = !$alternate;
    
    $pdf->Cell(30, 8, $expense['expensedate'], 1, 0, 'C', true);
    $pdf->Cell(40, 8, $expense['expensecategory'], 1, 0, 'C', true);
    $pdf->Cell(0, 8, '$' . number_format($expense['expense'], 2), 1, 1, 'R', true);
}

// Clear any existing output
ob_end_clean();

// Send headers to ensure no prior output
header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="expense_report_'.date('Y-m-d').'.pdf"');

// Output the PDF
$pdf->Output('expense_report.pdf', 'D');

// Stop further script execution
exit();
?>
