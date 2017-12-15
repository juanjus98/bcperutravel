<table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%">
	<tbody>
		<tr>
			<td align="center" valign="top">
				<div>
					<a href="#">
						<img src="<?php echo $cabeceras['logo'];?>" alt="<?php echo utf8_decode($website['title']);?>" style="max-height: 100px;">
					</a>
				</div>
				<table border="0" cellpadding="0" cellspacing="0" width="600" style="background-color:#fdfdfd;border:1px solid #dcdcdc;border-radius:3px!important; margin-top: 10px;">
					<tbody>
						<tr>
							<td align="center" valign="top">
								<table border="0" cellpadding="0" cellspacing="0" width="100%" style="background-color:<?php echo $cabeceras['color'];?>;border-radius:3px 3px 0 0!important;color:#ffffff;border-bottom:0;font-weight:bold;line-height:100%;vertical-align:middle;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif">
									<tbody>
										<tr>
											<td style="padding:36px 48px;display:block">
												<h2 style="color:#ffffff;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:30px;font-weight:300;line-height:150%;margin:0;text-align:left">
													<?php echo utf8_decode('Reservar - ' . $servicio['nombre_servicio']);?>
												</h2>
											</td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
						<tr>
							<td align="center" valign="top">
								<table border="0" cellpadding="0" cellspacing="0" width="600"><tbody><tr>
									<td valign="top" style="background-color:#fdfdfd">
										<table border="0" cellpadding="20" cellspacing="0" width="100%"><tbody><tr>
											<td valign="top" style="padding:0 40px">
												<div style="padding-top: 40px; color:#737373;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:14px;line-height:150%;text-align:left">
													<p style="margin:0 0 16px">
														<?php echo utf8_decode('Ha recibido una nueva solicitud de reserva. Los detalles se muestran a continuación:');?>
													</p>
													
													<h2 style="color:<?php echo $cabeceras['color'];?>;display:block;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:18px;font-weight:bold;line-height:130%;margin:16px 0 8px;text-align:left">
														<?php echo utf8_decode('Información de contácto:');?>
													</h2>	
													<ul>
														<li>
															<strong>Nombres y Apellidos:</strong> <span  style="color:#505050;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif">
															<?php echo $post['nombres'];?>
														</span>
													</li>
													<li>
														<strong>Correo:</strong> <span  style="color:#505050;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif"><a href="mailto:juanjus98@gmail.com" target="_blank"><?php echo $post['email'];?></a></span>
													</li>
													<li>
														<strong><?php echo utf8_decode('Teléfono:');?></strong> <span  style="color:#505050;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif">
														<?php echo $post['telefono'];?>
													</span>
												</li>
												<!-- <li>
													<strong><?php echo utf8_decode('Celular:');?></strong> <span  style="color:#505050;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif">
													<?php echo $post['celular'];?>
												</span>
											</li> -->
											<!-- <li>
												<strong>Mensaje:</strong> <span  style="color:#505050;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif">
												<?php
												echo str_replace("\n", "<br>", $post['mensaje']);
												?>
											</span>
										</li> -->
									</ul>

									<h2 style="color:<?php echo $cabeceras['color'];?>;display:block;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:18px;font-weight:bold;line-height:130%;margin:16px 0 8px;text-align:left">
										<?php echo utf8_decode('Otros detalles:');?>
									</h2>	
									<ul>

									<?php
										if(!empty($post['fecha_arribo'])){
											?>
											<li>
												<strong>Fecha de viaje:</strong> <span  style="color:#505050;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif">
												<?php echo str_replace("-","/",$post['fecha_arribo']);?>
											</span>
										</li>
										<?php
									}
									?>
								<!-- 	<li>
										<strong><?php echo utf8_decode('País de origen:');?></strong> <span  style="color:#505050;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif">
										<?php echo $post['pais_origen'];?>
									</span>
								</li>
								<li>
									<strong><?php echo utf8_decode('Ciudad:');?></strong> <span  style="color:#505050;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif">
									<?php echo $post['ciudad'];?>
								</span>
							</li> -->
		</ul>
	</div>
</td>
</tr>
<tr>
	<td style="padding: 0 40px;">
		<h2 style="color:<?php echo $cabeceras['color'];?>;display:block;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:18px;font-weight:bold;line-height:130%;margin:16px 0 8px;text-align:left">
			<?php echo utf8_decode('Detalles de Servicio:');?>
		</h2>
		<?php
		$nombre_servicio = $servicio['nombre_servicio'];
		$descripcion_servicio = $servicio['descripcion_servicio'];
		$url_servicio = $servicio['url_servicio'];
		$url_imagen = $servicio['url_imagen'];
		?>
		<table style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:12px;">
			<tr>
				<td>
					<a href="<?php echo $url_servicio;?>" target="_blank">
						<img src="<?php echo $url_imagen;?>" alt="<?php echo utf8_decode($nombre_servicio);?>" style="max-height: 100%;">
					</a>
				</td>
			</tr>
			<tr>
				<td>
					<h2 style="margin:6px 0;"><?php echo $nombre_servicio;?></h2>
					<p><a href="<?php echo $url_servicio;?>" target="_blank"><?php echo utf8_decode('Ver detalles en la página web.');?></a></p>
					<?php echo $descripcion_servicio;?>
				</td>
			</tr>			
		</table>
	</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
<span style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif; font-size: 12px; margin-top:20px; display: block;">
	<font color="#888888">&copy; <?php echo utf8_decode($website['title']);?></font>
</span>
</td>
</tr>
<tr>
	<td align="center" valign="top">
		<table border="0" cellpadding="10" cellspacing="0" width="600"><tbody><tr>
			<td valign="top" style="padding:0">
				<table border="0" cellpadding="10" cellspacing="0" width="100%">
					<tbody>
						<tr>
							<td colspan="2" valign="middle" style="padding:0 48px 48px 48px;border:0;color:#99b1c7;font-family:Arial;font-size:12px;line-height:125%;text-align:center">
								<p><a href="<?php echo "//" . $cabeceras['dominio']; ?>" target="_blank"><?php echo $cabeceras['dominio']; ?></a></p>
							</td>
						</tr>
					</tbody>
				</table>
			</td>
		</tr>
	</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>