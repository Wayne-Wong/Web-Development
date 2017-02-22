// JavaScript Document for Software/Applications Purchasing Online Training
// Registration for taking the training

<!--Begin Script to register		 

function validateField( fieldLabelID, field ) {
	
	var fieldLabel = document.getElementById(fieldLabelID).innerHTML;
	var validateFlag = "*";

	/* if the field name is flagged for validation, then the input value cannot be null or empty */
	if( ( fieldLabel.indexOf(validateFlag) >= 0 ) && ( ( field.value == null ) || ( field.value == "" ) ) ) {
		alert( fieldLabel.replace( validateFlag, "" )+' cannot be blank!' );
		return 1;
	}
	
	return 0;

}

function certify(){
	
	var error = 0;

	error += validateField( "labelName", document.registerform.Name );
	error += validateField( "labelEmployeeID", document.registerform.EmployeeID );
	error += validateField( "labelMC", document.registerform.MC );
	error += validateField( "labelEmail", document.registerform.Email );
	error += validateField( "labelSupervisor", document.registerform.Supervisor );
	error += validateField( "labelPhone", document.registerform.Phone );
	error += validateField( "labelFax", document.registerform.Fax ); 

	if( error == 0 ) {
		printCertificate();
	}
	
}

function printCertificate() {
	
	var x=document.getElementById("pageTitle");
	var browserName=navigator.appName;
	var now = new Date();

	newWindow = window.open("","Certificate","menubar=1,scrollbars=1,resizable=1,toolbar=1")
	
	newWindow.document.write('<?xml version="1.0" encoding="US-ASCII"?>\n')

	newWindow.document.write('<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">\n')

	newWindow.document.write('<html xmlns="http://www.w3.org/1999/xhtml">\n')

	newWindow.document.write('<head>\n')

	newWindow.document.write('<title>'+x.innerHTML+' Certificate</title>\n')

	newWindow.document.write('<link type="text/css" rel="stylesheet" href="/internal/training/online/stylesheets/online_style.css" />\n')

	newWindow.document.write('</head>\n')

	newWindow.document.write('<body>\n')

	newWindow.document.write('<div align="center"><img src="http://home.tceq.state.tx.us/internal/training/online/graphics/texSeal.jpg" alt="Great Seal of Texas" width="125" height="124" border="0"/></div>\n')
	
	newWindow.document.write('<div align="center"><h2><i>CONGRATULATIONS!</i></h2><br />\n')
	
	newWindow.document.write('<h1>'+document.registerform.Name.value+'</h1>\n')
	newWindow.document.write('<h2>has successfully completed <strong>'+x.innerHTML+'</strong>.</h2></div><br />\n')
	
	newWindow.document.write('<h3 align="center" style="font-size: 16pt">Employee Data</h3>\n')
	
	newWindow.document.write('<div style="margin-left:30%">\n')
	
	newWindow.document.write('<ul style="font-size: 16pt">\n')
	newWindow.document.write('<li>Name: '+document.registerform.Name.value+'</li>\n')
	newWindow.document.write('<li>Employee ID: '+document.registerform.EmployeeID.value+'</li>\n')
	newWindow.document.write('<li>E-Mail Address: '+document.registerform.Email.value+'@tceq.texas.gov'+'</li>\n')
	
	newWindow.document.write('<li>Date: '+now.toLocaleString()+'</li>\n')
	
	newWindow.document.write('<li>Phone: '+document.registerform.Phone.value+'</li>\n')
	newWindow.document.write('<li>Fax: '+document.registerform.Fax.value+'</li>\n')
	newWindow.document.write('<li>MC: '+document.registerform.MC.value+'</li>\n')
	newWindow.document.write('<li>Supervisor: '+document.registerform.Supervisor.value+'</li>\n')
	newWindow.document.write('</ul>\n')
	
	newWindow.document.write('</div>\n')
		
	/* print the acknowledgement and signature line section if "signature" is set to "True" in register.html */
	if( document.registerform.signature.value == "True" ) {
		newWindow.document.write('<br /><h3 align="center">Acknowledgement</h3>\n')
		newWindow.document.write('<div style="margin-left:15%">\n')
		newWindow.document.write('<p>I acknowledge that I have taken '+x.innerHTML+'.<br /><br />\n')
		newWindow.document.write('______________________________________________________<br />\n')
		newWindow.document.write('(Your signature)</p>\n')
		newWindow.document.write('</div>\n')
	}

	/* print the instructions for receiving credit if "credit" is set to "True" in register.html */
	if( document.registerform.credit.value == "True" ) {
		newWindow.document.write('<div style="margin-left:15%">\n')
		newWindow.document.write('<br /><h3><em>To get credit for the course you must:</em><ul title="Steps required in getting course credit."></h3>\n')
		newWindow.document.write('<li><h3>check your data for accuracy, (If inaccurate, go back and type it in again and re-submit.)</h3></li>\n')
		newWindow.document.write('<li><h3>save this page as a <strong>TEXT</strong> file (Page > Save As > Save as type: Text File, Encoding: Unicode), and</h3></li>\n')
		newWindow.document.write('<li><h3>email the text file to <a href="mailto:Training@tceq.texas.gov">Training@tceq.texas.gov</a>.</h3></li>\n')
		newWindow.document.write('<li><h3>IF this certificate is for PROCARD training, email the text file to <a href="mailto:procard@tceq.texas.gov">procard@tceq.texas.gov</a> ALSO.</h3></li>\n')
		newWindow.document.write('</ul><br />\n')
		newWindow.document.write('</div>\n')
	}

	/*newWindow.document.write('<label style="margin-left:45%"><input type="button" value="Print Page" title="select to print page" onclick="javascript:window.print()" onkeypress="javascript:window.print()" align="middle"/></label>\n')*/
	
	newWindow.document.write('</body>\n')

	newWindow.document.write('</html>')

	newWindow.document.close()
	
}

-->