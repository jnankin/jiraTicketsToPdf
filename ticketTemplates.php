<?
$baseTemplate =<<<EOF
<html>
        <head>
        <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=PT+Sans:regular,bold&subset=latin" />
        <style>
                body {
                    margin: 0px;
                    font-family: 'PT Sans', Arial, Helvetica, sans-serif;
                    font-size: 14px;
                }
                td {
                        width: 200px;
                        font-weight: bold;
                        border: 1px solid black;
                        padding: 10px;
                }
                tr.blank td {
                        height: 100px;
                        vertical-align: top;
                        font-weight: normal;
                }
        </style>
        </head>
        <body>
            {{ tickets }}
        </body>
        </html>
EOF;

$ticketTemplate =<<<EOF
    <div>
        <div style="float: left; padding: 10px; border: 1px solid black; font-size: 36px; font-weight: bold;">{{ Key }}</div>
            <div style="float: left; padding-left: 20px;">
                    <div style="font-size: 24px; padding-bottom: 10px;">{{ Summary }}</div>
                    <strong>Milestone:</strong> {{ Affects Version/s }}
            </div>
        </div>
        
        <div style="clear: both; margin-bottom: 20px;">&nbsp</div>
        <table align="center" style="border-collapse: collapse; border: 1px solid black;">
                <tr>
                    <td>Type</td>
                    <td>Priority</td>
                    <td>Est. Hours</td>
                    <td>QA</td>
                </tr>
                <tr class="blank">
                        <td>{{ Issue Type }}</td>
                        <td>{{ Priority }}</td>
                        <td></td>
                        <td></td>
                </tr>
        </table>

    </div>
EOF;
