<html>
	<head>
		<title>Welcome to Simple Solutions Accounting</title>
	</head>
	<body>
		<table cellpadding="20" cellspacing="20" width="600" style="border:1px solid #000000; border-collapse: collapse">
			<tr>
				<td bgcolor="#eeeeee"><h1>Simple Solutions Accounting</h1></td>
			</tr>
			<tr>
                            <td>
                            <h4>Hi {{submitter}},</h4>
                            <p>To complete your Accounting Portal sign-up you need to create a password. Click on the link below to get a new password with your sign-up details.</p>
                            </td>
			</tr>
                        
                        <tr>
                            <td>                          
                            <p>Your sign-up details:</p>
                            <p><strong>Username </strong>{{submitter}}</p>
                            <p><strong>Email </strong>{{email}}</p>                            
                            </td>
			</tr>                        
                        
			<tr>
                            <td>
                            <p><a href="{{admin_login}}/wp-login.php?action=lostpassword">Get password</a></p>
                            </td>
			</tr>
		</table>
	</body>
</html>