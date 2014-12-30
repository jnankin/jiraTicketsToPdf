# jiraTicketsToPdf
### Description
Simple script to take an export XLS from jira that contains issues or tickets and make them into printable PDFs.  I didn't want to pay for JIRA Agile, and I still like to have printed tickets.  

You can easily change the template of the printed tickets.  Just take a peek at ticketTemplates.php.  You can put a field in to the ticket template using "{{ fieldName }}", where fieldName is the header of the field in the XLS export.  (e.g. "{{ Key }}" will dump the issue's ID or key.)

### Dependencies
- gnumeric (needed to convert xls to csv)
- wkthmltopdf (if you want to output a pdf)

### Usage
``php jiraTicketsToPdf.php nameOfXlsFile.xls``


