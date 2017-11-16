<div class="row topspace">
			<div class="table">
				<div class="rowtable header blue">
					<div class="cell" style='border-color: black; border: 1px; border-right-style: solid;border-left-style: solid;'>No.</div>
				    <div class="cell" style='border-color: black; border: 1px; border-right-style: solid;'>Nama</div>
				    <div class="cell" style='border-color: black; border: 1px; border-right-style: solid;'>Angkatan</div>
				    <div class="cell" style='border-color: black; border: 1px; border-right-style: solid;'>1</div>
				    <div class='cell' style='border-color: black; border: 1px; border-right-style: solid;'>2</div>
				    <div class='cell' style='border-color: black; border: 1px; border-right-style: solid;'>3</div>
				    <div class='cell' style='border-color: black; border: 1px; border-right-style: solid;'>4</div>
				    <div class='cell' style='border-color: black; border: 1px; border-right-style: solid;'>5</div>
				    <div class='cell' style='border-color: black; border: 1px; border-right-style: solid;'>6</div>
				    <div class='cell' style='border-color: black; border: 1px; border-right-style: solid;'>7</div>
				    <div class='cell' style='border-color: black; border: 1px; border-right-style: solid;'>8</div>
				    <div class='cell' style='border-color: black; border: 1px; border-right-style: solid;'>9</div>
				    <div class='cell' style='border-color: black; border: 1px; border-right-style: solid;'>10</div>
				    <div class='cell' style='border-color: black; border: 1px; border-right-style: solid;'>11</div>
				    <div class='cell' style='border-color: black; border: 1px; border-right-style: solid;'>12</div>
				    <div class='cell' style='border-color: black; border: 1px; border-right-style: solid;'>Option</div>
				</div>
				<?php
					include 'koneksi.php';

					$sql = "SELECT * FROM data_absensi ORDER BY nrp";
					$result = mysqli_query($conn, $sql);
					$i=1;
					if (mysqli_num_rows($result) > 0) {
						while ($row = mysqli_fetch_assoc($result)) {
							$j=1;
							echo "<div class='rowtable'>";
							echo "<div class='cell' style='border: 1px; border-right-style: solid; border-left-style: solid; border-bottom-style: solid;'>" . $i . "</div>";
							$resultNama = mysqli_query($conn, "SELECT * FROM data_mahasiswa WHERE nrp=" . $row["nrp"]);
							while ($rowNama = mysqli_fetch_assoc($resultNama)) {
								echo "<div class='cell' style='border: 1px; border-right-style: solid; border-bottom-style: solid;'>" . $rowNama["nama"]. "</div>";
								echo "<div class='cell' style='border: 1px; border-right-style: solid; border-bottom-style: solid;'>" . $rowNama["angkatan"]. "</div>";
							}
							while($j < 13) {
								if($row["minggu_ke" . $j] == 1) {
									echo "<div class='cell' style='border: 1px; border-right-style: solid; border-bottom-style: solid;' align='center'>H</div>";
								} else if($row["minggu_ke" . $j] == 0){
									echo "<div class='cell' style='border: 1px; border-right-style: solid; border-bottom-style: solid;' align='center'>-</div>";
								} else if($row["minggu_ke" . $j] == 2){
									echo "<div class='cell' style='border: 1px; border-right-style: solid; border-bottom-style: solid;' align='center'>I</div>";
								} else if($row["minggu_ke" . $j] == 3){
									echo "<div class='cell' style='border: 1px; border-right-style: solid; border-bottom-style: solid;' align='center'>A</div>";
								}
								$j++;
							}
							echo "<div class='cell' style='border: 1px; border-right-style: solid; border-bottom-style: solid;'><a href='details.php?nrp=$row[nrp]'></span><span class='glyphicon glyphicon-info-sign optionrow'></a>";
							if ($userId !== '') {
								if($userLvl == "admin") {
								echo"<a href='delete.php?nrp=$row[nrp]'><span class='glyphicon glyphicon-trash optionrow'></span></a>";
								}
							}
							echo "</div>" ;
							echo "</div>";
							$i++;
						}
					}
					mysqli_close($conn);
				?>
			</div>
		</div>