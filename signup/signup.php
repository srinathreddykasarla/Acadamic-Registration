<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <title>CSS Registration Form</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <link rel="stylesheet" type="text/css" href="css/default.css"/>
		 <script src="signup.js"></script>
    </head>
    <body>    
        <form action="dataentry.php" class="register" method="post">
            <h1>Sign Up</h1>
            <fieldset class="row1">
                <legend>Account Details
                </legend>
                <p>
                    <label>Email *
                    </label>
                    <input type="text" name="email"/>
                    
                </p>
                <p>
                    <label>Password*
                    </label>
                   <input type="password" name="password"/>
                    <label>Repeat Password*
                    </label>
                   <input type="password" name="repassword"/>
                    <label class="obinfo">
                    </label>
                </p>
            </fieldset>
            <fieldset class="row2">
			<div id='fields'>
                <legend>Personal Details
                </legend>
                <p>
                    <label>First Name *
                    </label>
                    <input type="text" class="long" name="fname"/>
                </p>
				<p>
                    <label>Last Name *
                    </label>
                    <input type="text" class="long" name="lname"/>
                </p>
                <p>
                    <label>Phone *
                    </label>
                    <input type="text" maxlength="10" name="contact"/>
                </p>
				<p>
				<label>Profession *
                    </label>
                    <select name="profession" id = "profession" onchange="addRow('fields')">
				     <option value="select">Profession</option>
                    <option value="student">Student</option>
                    <option value="graduate">Graduate</option>
                    <option value="indpro">Industry Professional</option>
                    <option value="retdefper">Retired Defense Personnel</option>
                    <option value="others">Others</option>
                </select>
                </p>
             </div>
            </fieldset>
            <fieldset class="row3">
                <legend>Further Information
                </legend>
                <p>
                    <label>Gender</label>
                    <input type="radio" value="male" name="gender"/>
                    <label class="gender">Male</label>
                    <input type="radio" value="female" name="gender"/>
                    <label class="gender">Female</label>
                </p>
                <p>
                    <label>Birthdate
                    </label>
                    <select class="date" name="date">
                        <option value="1">01
                        </option>
                        <option value="2">02
                        </option>
                        <option value="3">03
                        </option>
                        <option value="4">04
                        </option>
                        <option value="5">05
                        </option>
                        <option value="6">06
                        </option>
                        <option value="7">07
                        </option>
                        <option value="8">08
                        </option>
                        <option value="9">09
                        </option>
                        <option value="10">10
                        </option>
                        <option value="11">11
                        </option>
                        <option value="12">12
                        </option>
                        <option value="13">13
                        </option>
                        <option value="14">14
                        </option>
                        <option value="15">15
                        </option>
                        <option value="16">16
                        </option>
                        <option value="17">17
                        </option>
                        <option value="18">18
                        </option>
                        <option value="19">19
                        </option>
                        <option value="20">20
                        </option>
                        <option value="21">21
                        </option>
                        <option value="22">22
                        </option>
                        <option value="23">23
                        </option>
                        <option value="24">24
                        </option>
                        <option value="25">25
                        </option>
                        <option value="26">26
                        </option>
                        <option value="27">27
                        </option>
                        <option value="28">28
                        </option>
                        <option value="29">29
                        </option>
                        <option value="30">30
                        </option>
                        <option value="31">31
                        </option>
                    </select>
                    <select name="month">
                        <option value="1">January
                        </option>
                        <option value="2">February
                        </option>
                        <option value="3">March
                        </option>
                        <option value="4">April
                        </option>
                        <option value="5">May
                        </option>
                        <option value="6">June
                        </option>
                        <option value="7">July
                        </option>
                        <option value="8">August
                        </option>
                        <option value="9">September
                        </option>
                        <option value="10">October
                        </option>
                        <option value="11">November
                        </option>
                        <option value="12">December
                        </option>
                    </select>
                    <input class="year" type="text" size="4" maxlength="4" name="byear"/>e.g 1976
                </p>
              
             
                <div class="infobox"><h4>Helpful Information</h4>
                    <p>Please Enter all the fields which are * marked </p>
                </div>
            </fieldset>
            <fieldset class="row4">
                <legend>Terms and Mailing
                </legend>
                <p class="agreement">
                    <input type="checkbox" value="" name="terms"/>
                    <label>*  I accept the <a href="#">Terms and Conditions</a></label>
                </p>
                
            </fieldset>
            <div><button class="button">Register &raquo;</button></div>
        </form>
    </body>
</html>





