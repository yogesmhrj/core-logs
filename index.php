<?php

require "autoload.php";

$logData = LogHelper::get();


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Log</title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

	<script src=" https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" ></script>
	<script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

	<style type="text/css">
		
	</style>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h2>
					Logs
				</h2>
				<table class="table table-striped" id="data-table">
					<thead>
					<tr>
						<th>Date</th>
						<th>Type</th>
						<th>Message</th>
					</tr>
					</thead>
					<tbody>
					<?php foreach ($logData as $key => $log): ?>
						<tr>
							<td><?= $log['date'] ?></td>

							<?php $logClass = ""; 
							switch($log['type']){ 							
								case ("debug"):							
									$logClass = "text-bg-primary";
									break;
								case ("error"): 
									$logClass = "text-bg-danger"; 
									break; 
								default: 
									$logClass = "text-bg-secondary"; 
									break; 
								}
							?>						
							<td>		
							<span class="badge <?= $logClass ?>">
									<?= $log['type'] ?>								
							</span>					
								
							</td>
							<td><?= $log['message'] ?></td>
						</tr>
					<?php endforeach; ?>
					</tbody>
				</table>			
			</div>
		</div>
		
	</div>
	
	<script type="text/javascript">
		let table = new DataTable('#data-table');
	</script>
</body>
</html>