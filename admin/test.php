
<?php
											include("assets/functions2.php");			
											$officelist = selectListSQL2("SELECT * FROM offices ORDER BY transid ASC");
											//$employeelist = selectListSQL2("SELECT * FROM employee");
											//print_r($employeelist);
											foreach ($officelist as $rows => $link) {
												$officeid = $link['transid'];
												$officename = $link['office'];
												
												echo "$officename<br />";
											
											}
											
											$officelist = selectListSQL2("SELECT * FROM offices ORDER BY transid ASC");
											//$employeelist = selectListSQL2("SELECT * FROM employee");
											//print_r($employeelist);
											foreach ($officelist as $rows => $link) {
												$officeid = $link['transid'];
												$officename = $link['office'];
												
												echo "$officename<br />";
											
											}
										?>