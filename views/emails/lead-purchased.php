<html>
	<head>
		<title>Thanks for the lead</title>
	</head>
	<body>
		<table cellpadding="20" cellspacing="20" width="600" style="border:1px solid #000000; border-collapse: collapse">
			<tr>
				<td bgcolor="#eeeeee"><h1>{{site_name}}</h1></td>
			</tr>
			<tr>
				<td>
					<h2>Hi {{submitter}},</h2>
					<p>Thanks for purchasing lead reference: #{{lead_reference}}.</p>
					<p>
						The details are as follows:
						{{body}}
						<dl>
							<dt><strong>Lead Requested At</strong></dt>
							<dd>{{created_at}}</dd>
						</dl>
					</p>
				</td>
			</tr>
		</table>
	</body>
</html>