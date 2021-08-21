<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leads and Clients</title>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 70%;
  margin-left: 200px;
}

h2{
    text-align: center;
    font-family: arial, sans-serif;

}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
  width: 50%;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>
<br>
<form style="margin-left: 800px" action="update" method="post">
    <input type="date" name="to" required>
    <input type="date" name="from" required>
    <input type="submit" name="update" value="update">
</form>

<?php $data = ''; ?>
<?php if(isset($_POST['update'])){ 
        foreach ($list as $value){
            $data .= '{y: ' . $value['number_of_leads'].', label: ' . '"'.$value['Client_name']. '"' . '},';
        }
} else { ?>
<?php   foreach ($leads as $value){
            $data .= '{y: ' . $value['number_of_leads'].', label: ' . '"'.$value['Client_name']. '"' . '},';
        }
    } ?>

<h2>List of all customers and # of leads</h2>
<table>
  <tr>
    <th>Client Name</th>
    <th>Number of leads</th>
  </tr>
<?php   if(isset($_POST['update'])){ ?>   
<?php   foreach($list as $value2){ ?> 
            <tr>
                <td><?= $value2['Client_name']; ?></td>
                <td><?= $value2['number_of_leads']; ?></td>
            </tr>
<?php }} else { ?>
<?php foreach($top5 as $value2){ ?>  
            <tr>
                <td><?= $value2['Client_name']; ?></td>
                <td><?= $value2['number_of_leads']; ?></td>
            </tr>
<?php  } 
} ?>
  
</table>
<br>

<script>
window.onload = function () {

var options = {
    title: {
        text: "Customer and number of new leads"
    },
    subtitles: [{
        text: "As of November, 2017"
    }],
    animationEnabled: true,
    data: [{
        type: "pie",
        startAngle: 40,
        toolTipContent: "<b>{label}</b>: {y}%",
        showInLegend: "true",
        legendText: "{label}",
        indexLabelFontSize: 16,
        indexLabel: "{label} - {y}%",
        dataPoints: [
<?php   if(isset($_POST['update'])){ ?>
<?php       echo $data; ?>
<?php   }
        else{ ?>
<?php       echo $data; ?>
<?php    } ?>
            // { y: 48.36, label: "Windows 7" },
            // { y: 26.85, label: "Windows 10" },
            // { y: 1.49, label: "Windows 8" },
            // { y: 6.98, label: "Windows XP" },
            // { y: 6.53, label: "Windows 8.1" },
            // { y: 2.45, label: "Linux" },
            // { y: 3.32, label: "Mac OS X 10.12" },
            // { y: 4.03, label: "Others" }
        ]
    }]
};
$("#chartContainer").CanvasJSChart(options);

}
</script>

<div id="chartContainer" style="height: 300px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
<script src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
</body>
</html>