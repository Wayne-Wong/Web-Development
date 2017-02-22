<?php
	require('dbconnect.php');
	
	$sel_query="Select * from accounts WHERE type='revenue' ORDER BY amount DESC";
	$revenue_result = mysql_query($sel_query);
	$sel_query="Select * from accounts WHERE type='expense' ORDER BY amount DESC";
	$expense_result = mysql_query($sel_query);
	$sel_query="Select * from accounts WHERE type='asset' ORDER BY amount";
	$asset_result = mysql_query($sel_query);
	$sel_query="Select * from accounts WHERE type='liability' ORDER BY amount";
	$liability_result = mysql_query($sel_query);
	$sel_query="Select * from accounts WHERE type='stock' ORDER BY amount";
	$stock_result = mysql_query($sel_query);
?>



<!DOCTYPE html>
<html>
<head>
	<style>

	</style>
</head>
<body>
	<table style="width:60%; border-collapse:collapse; border:1px solid black;">
		<center style="width:60%; background-color:#00ff00;"><h1>Income Statement</h1></center>
		<tr>
			<td width="40%"><b>Revenue</b></td>
			<td width="10%"></td>
			<td width="10%"></td>
		</tr>
		<?php
			$row_num = mysql_num_rows($revenue_result);
			if($row_num > 0){
				for($i=0; $i<$row_num; $i++){
					$row = mysql_fetch_assoc($revenue_result);
					$total_revenue = $total_revenue + $row['amount'];
					if($i == $row_num-1){
						echo "
							<tr>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$row['name']."</td>
								<td style='border-bottom:1px solid black;'><center>$".$row['amount']."</center></td>
								<td></td>						
							</tr>
						";
					}else{
						echo "
							<tr>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$row['name']."</td>
								<td><center>$".$row['amount']."</center></td>
								<td></td>						
							</tr>
						";
					}
				}
				echo "
					<tr>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Total Revenue:</td>
						<td></td>
						<td><center>$".$total_revenue."</center></td>						
					</tr>
				";
			}
		?>
		<tr><td></td><td></td><td></td></tr>
		<tr><td></td><td></td><td></td></tr>
		<tr><td></td><td></td><td></td></tr>
		<tr><td></td><td></td><td></td></tr>
		<tr><td></td><td></td><td></td></tr>
		<tr><td></td><td></td><td></td></tr>
		<tr>
			<td><b>Expense</b></td>
			<td></td>
			<td></td>
		</tr>
		<?php
			$row_num = mysql_num_rows($expense_result);
			if($row_num > 0){
				for($i=0; $i<$row_num; $i++){
					$row = mysql_fetch_assoc($expense_result);
					$total_expense = $total_expense + $row['amount'];
					if($i == $row_num-1){
						echo "
							<tr>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$row['name']."</td>
								<td style='border-bottom:1px solid black;'><center>$".$row['amount']."</center></td>
								<td></td>						
							</tr>
						";
					}else{
						echo "
							<tr>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$row['name']."</td>
								<td><center>$".$row['amount']."</center></td>
								<td></td>						
							</tr>
						";
					}
				}
				echo "
					<tr>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Total Expense:</td>
						<td></td>
						<td style='border-bottom:1px solid black;'><center>$".$total_expense."</center></td>						
					</tr>
				";
			}
		?>
		<tr><td></td><td></td><td></td></tr>
		<tr><td></td><td></td><td></td></tr>
		<tr><td></td><td></td><td></td></tr>
		<?php
			$net_income = $total_revenue - $total_expense;
			if($net_income < 0){
				echo "
					<tr>
						<td><b>Net Income/loss</b></td>
						<td></td>
						<td style='border-bottom:2px solid black; color:red;'><center>($".($net_income*-1).")</center></td>						
					</tr>
				";
			}else{
				echo "
					<tr>
						<td><b>Net Income/loss</b></td>
						<td></td>
						<td style='border-bottom:2px solid black;'><center>$".$net_income."</center></td>						
					</tr>
				";
			}
		?>
		<tr><td></td><td></td><td></td></tr>
		<tr><td></td><td></td><td></td></tr>
		<tr><td></td><td></td><td></td></tr>
	</table>
	<br><br><br><br>
	
	<table style="width:60%; border-collapse:collapse; border:1px solid black;">
		<center style="width:60%; background-color:#00ff00;"><h1>Balance Sheet</h1></center>
		<tr>
			<td width="40%"><b>Asset</b></td>
			<td width="10%"></td>
			<td width="10%"></td>
		</tr>
		<?php
			$row_num = mysql_num_rows($asset_result);
			if($row_num > 0){
				for($i=0; $i<$row_num; $i++){
					$row = mysql_fetch_assoc($asset_result);
					$total_asset = $total_asset + $row['amount'];
					if($i == $row_num-1){
						echo "
							<tr>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$row['name']."</td>
								<td style='border-bottom:1px solid black;'><center>$".$row['amount']."</center></td>
								<td></td>						
							</tr>
						";
					}else{
						echo "
							<tr>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$row['name']."</td>
								<td><center>$".$row['amount']."</center></td>
								<td></td>						
							</tr>
						";
					}
				}
				echo "
					<tr>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Total Asset:</td>
						<td></td>
						<td style='border-bottom:2px solid black;'><center>$".$total_asset."</center></td>						
					</tr>
				";
			}
		?>
		<tr><td></td><td></td><td></td></tr>
		<tr><td></td><td></td><td></td></tr>
		<tr><td></td><td></td><td></td></tr>
		<tr><td></td><td></td><td></td></tr>
		<tr><td></td><td></td><td></td></tr>
		<tr><td></td><td></td><td></td></tr>
		<tr>
			<td><b>Liability</b></td>
			<td></td>
			<td></td>
		</tr>
		<?php
			$row_num = mysql_num_rows($liability_result);
			if($row_num > 0){
				for($i=0; $i<$row_num; $i++){
					$row = mysql_fetch_assoc($liability_result);
					$total_liability = $total_liability + $row['amount'];
					if($i == $row_num-1){
						echo "
							<tr>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$row['name']."</td>
								<td style='border-bottom:1px solid black;'><center>$".$row['amount']."</center></td>
								<td></td>						
							</tr>
						";
					}else{
						echo "
							<tr>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$row['name']."</td>
								<td><center>$".$row['amount']."</center></td>
								<td></td>						
							</tr>
						";
					}
				}
				echo "
					<tr>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Total Liability:</td>
						<td></td>
						<td><center>$".$total_liability."</center></td>						
					</tr>
				";
			}
		?>
		<tr><td></td><td></td><td></td></tr>
		<tr><td></td><td></td><td></td></tr>
		<tr><td></td><td></td><td></td></tr>
		<tr>
			<td><b>Owner's Equity</b></td>
			<td></td>
			<td></td>
		</tr>
		<?php
			if($net_income < 0){
				echo "
					<tr>
						<td>Net Income/loss</td>
						<td style='color:red;'><center>($".($net_income*-1).")</center></td>
						<td></td>							
					</tr>
				";
			}else{
				echo "
					<tr>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Net Income/loss</td>
						<td><center>$".$net_income."</center></td>	
						<td></td>					
					</tr>
				";
			}
			$row_num = mysql_num_rows($stock_result);
			if($row_num > 0){
				for($i=0; $i<$row_num; $i++){
					$row = mysql_fetch_assoc($stock_result);
					$total_stock = $total_stock + $row['amount'];
					if($i == $row_num-1){
						echo "
							<tr>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$row['name']."</td>
								<td style='border-bottom:1px solid black;'><center>$".$row['amount']."</center></td>
								<td></td>						
							</tr>
						";
					}else{
						echo "
							<tr>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$row['name']."</td>
								<td><center>$".$row['amount']."</center></td>
								<td></td>						
							</tr>
						";
					}
				}
				echo "
					<tr>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Total Owner's Equity:</td>
						<td></td>
						<td style='border-bottom:1px solid black;'><center>$".$total_stock."</center></td>						
					</tr>
				";
			}
		?>
		<tr><td></td><td></td><td></td></tr>
		<tr><td></td><td></td><td></td></tr>
		<tr><td></td><td></td><td></td></tr>
		<?php
			$total_liability_stock = $total_liability + $total_stock + $net_income;
			echo "
				<tr>
					<td><b>Total Liability and Owner's Equity</b></td>
					<td></td>
					<td style='border-bottom:2px solid black;'><center>$".$total_liability_stock."</center></td>						
				</tr>
			";
		?>
		<tr><td></td><td></td><td></td></tr>
		<tr><td></td><td></td><td></td></tr>
		<tr><td></td><td></td><td></td></tr>
	</table>
</body>
</html>
<?php
	$update="UPDATE accounts SET amount=0 WHERE type='revenue' OR type='expense'";
	mysql_query($update) or die(mysql_error());

	$sel_query="Select * from accounts WHERE name='retained earnings'";
	$result = mysql_query($sel_query);
	$row = mysql_fetch_array($result);
	$new_amount = $row['amount'] + $net_income;
	$update="UPDATE accounts SET amount='$new_amount' WHERE name='retained earnings'";
	mysql_query($update) or die(mysql_error());
		
	

?>