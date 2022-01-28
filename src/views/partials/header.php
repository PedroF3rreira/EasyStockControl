<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Easy Stock | <?=$page;?></title>
		<link rel="stylesheet" type="text/css" href="<?=$base;?>/assets/css/style.css">
		<link rel="stylesheet" type="text/css" href="<?=$base;?>/assets/css/home.css">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
	      rel="stylesheet">
	      <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined"
	      rel="stylesheet">

	      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Movimentação');
        data.addColumn('number', 'Entradas');
        data.addColumn('number', 'Saidas');
        
        data.addRows([
          ['entrada', 3,5],
          ['entrada', 3,5],
          
          
          
        ]);

        // Set chart options
        var options = {'title':'How Much Pizza I Ate Last Night',
        			'is3D':true,
                       'width':400,
                       'height':300};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
	</head>
	<body>
		<header class="header">
			<div class="container header-area">
				<div class="header-left">
					<div class="logo">
						<span class="material-icons">settings</span>easy stock control
					</div>
				</div>
				<div class="header-right">
					<div class="user-area">
						<span class="material-icons-outlined">account_circle</span>
						<p><?=$user->name;?></p>
					</div>
				</div>
			</div>
		</header>