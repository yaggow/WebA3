<h2>Order Table</h2>
<?php 
		echo "<table>";
		echo "<tr><th>First Name</th><th>Last Name</th><th>Login</th><th>Email</th></tr>";
		
		foreach ($customers as $customer) {
			echo "<tr>";
			echo "<td>" . $customer->first . "</td>";
			echo "<td>" . $customer->last . "</td>";
			echo "<td>" . $customer->login . "</td>";
			echo "<td>" . $customer->email . "</td>";
				
			echo "<td>" . anchor("customers/delete/$customer->id",'Delete',"onClick='return confirm(\"Do you really want to delete this record?\");'") . "</td>";
			echo "<td>" . anchor("customers/edit/$customer->id",'Edit') . "</td>";
				
			echo "</tr>";
		}
		echo "<table>";
?>	