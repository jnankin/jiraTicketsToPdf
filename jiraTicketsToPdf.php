<?
require_once("ticketTemplates.php");

//make sure we have the file
$filename = $argv[1];
if (!file_exists($filename)){
    throw new Exception("The file {$argv[1]} does not exist.");
}

//turn it into a csv
$fileinfo = pathinfo($filename);
$csvName = str_replace($fileinfo['extension'], 'csv', $fileinfo['basename']);
system("ssconvert " . escapeshellarg($filename) . " " . escapeshellarg($csvName));

//write the html
echo "Formatting tickets...\n";
$file = fopen($csvName,"r");

//ignore the first 3 lines
fgetcsv($file); fgetcsv($file); fgetcsv($file);
$titleFields = fgetcsv($file);

$ticketHtml = "";
$counter = 0;
while(!feof($file)){
    $line = fgetcsv($file);

    if (strpos($line[0], "Generated at") === 0 || !$line[0]){
        continue;
    }

    $currentTicketHtml = $ticketTemplate;
    $currentTicketHtml = str_replace("{{ logo }}", $logoHtml, $currentTicketHtml);
    foreach($titleFields as $index => $value){
        $lineValue = $line[$index];
        if ($value == 'Summary'){
            $lineValue = (strlen($lineValue) > 43) ? substr($lineValue,0,40).'...' : $lineValue;
        }
        $currentTicketHtml = str_replace("{{ $value }}", $lineValue, $currentTicketHtml);
    }

    $ticketHtml .= $currentTicketHtml;
    $counter++;

    if ($counter % 2 == 0){
        $ticketHtml .= '<DIV style="page-break-after:always"></DIV>';
    }
    else {
        $ticketHtml .= '<DIV style="margin-bottom: 200px;"></DIV>';
    }
}

file_put_contents("out.html", str_replace("{{ tickets }}", $ticketHtml, $baseTemplate));
fclose($file);

//convert it to pdf
/*echo "Writing pdf...\n";
system("wkhtmltopdf out.html out.pdf");
//unlink("out.html");
*/

unlink($csvName);
echo "Launching browser...";
system("google-chrome out.html");