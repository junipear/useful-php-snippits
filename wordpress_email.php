<style>
table, td, th {
    border: 1px solid #ddd;
   padding: 5px;
   text-align: left;
   
}

tr:nth-child(even){
     background-color: #f2f2f2;
}

table {
  border-collapse: collapse;
  width: 100%;
 
}

th {
  height: 50px;

}

.sexy {
    padding: 20px; 
    margin-bottom: 30px; 
    margin-right: 15%; 
    margin-left: 15%; 
    style=overflow-x: auto; 
    border: 1px solid #ddd; 
    box-shadow: 5px 10px #ddd;
}
</style>
        <div class="sexy"> 
        <?php
            function Clean($string, $min='', $max='')
            {
            $string = strip_tags($string);
            $string = preg_replace("/[^a-zA-Z0-9\+-_# ]/", "", html_entity_decode($string, ENT_QUOTES));
            $string = str_replace(array('\'', '"', '\\', ';', '=', '(', ')', '%'), '', $string);
            $string = filter_var($string, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH | FILTER_FLAG_STRIP_LOW);
            $len = strlen($string);
            if((($min != '') && ($len < $min)) || (($max != '') && ($len > $max)))
            {
            return "";
            }
            else
            {
            return $string;
            }
            }
        
        function CleanEmail($email)
            {
            if (filter_var($email,FILTER_VALIDATE_EMAIL)==FALSE)
            {
            // this failed the first check
            return "";
            }
            else
            {
            // this passed the first check
            /* explode out local and domain */
            list($local,$domain)=explode('@',$email);
            $localLength=strlen($local);
            $domainLength=strlen($domain);
            /* check for proper lengths */
            if ( ( $localLength > 0 && $localLength < 65) && ( $domainLength > 3 && $domainLength < 256) && ( checkdnsrr($domain,'MX') || checkdnsrr($domain,'A') ) )
                {
                // this passed the second check for length and domain and dns tests
                return $email;
                }
            else
                {
                // this failed the second check
                return "";
                }
            }
            }
        
        
            
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            //set all variables
            $companyName = $contactName = $address = $city = $stateProvince = $zipPostal = $addressShipping = $cityShipping = $stateProvinceShipping = $zipPostalShipping = $numberPhone = $numberFax = $number800 = $customerEmail = $website = $businessType = $independent = $partnership = $corporation = $liabilityInsurance = $lIyes = $lIno = $lIna = $salesManager = $sMyes = $sMno  = $sMna  = $salesPeople = $salesInside  = $salesOutside  = $serviceDepartment  = $sDyes  = $sDno  = $sDna  = $servicesqft  = $showroom  = $sRyes  = $sRno  = $sRna  = $showroomsqft  = $warehouse = $wyes  = $wno  = $wna  = $warehousesqft  = $estimateSales  = "";

            $companyName = Clean($_POST["companyName"]);
            $contactName = Clean($_POST["contactName"]);
            $address = Clean($_POST["address"]);
            $city = Clean($_POST["city"]);
            $stateProvince = Clean($_POST["stateProvince"]);
            $zipPostal = Clean($_POST["zipPostal"]);
            $addressShipping = Clean($_POST["addressShipping"]);
            $cityShipping = Clean($_POST["cityShipping"]);
            $stateProvinceShipping = Clean($_POST["stateProvinceShipping"]);
            $zipPostalShipping = Clean($_POST["zipPostalShipping"]);
            $numberPhone = Clean($_POST["numberPhone"]);
            $numberFax = Clean($_POST["numberFax"]);
            $number800 = Clean($_POST["number800"]);
            $customerEmail = CleanEmail($_POST["customerEmail"]);
            $website = Clean($_POST["website"]);
            $businessType = Clean($_POST["businessType"]);
            $independent = Clean($_POST["independent"]);
            $partnership = Clean($_POST["partnership"]);
            $corporation = Clean($_POST["corporation"]);
            $liabilityInsurance = Clean($_POST["liabilityInsurance"]);
            $lIyes = Clean($_POST["lIyes"]);
            $lIno = Clean($_POST["lIno"]);
            $lIna = Clean($_POST["lIna"]);
            $salesManager = Clean($_POST["salesManager"]);
            $sMyes = Clean($_POST["sMyes"]);
            $sMno = Clean($_POST["sMno"]);
            $sMna = Clean($_POST["sMna"]);
            $salesPeople = Clean($_POST["salesPeople"]);
            $salesInside = Clean($_POST["salesInside"]);
            $salesOutside = Clean($_POST["salesOutside"]);
            $serviceDepartment = Clean($_POST["serviceDepartment"]);
            $sDyes = Clean($_POST["sDyes"]);
            $sDno = Clean($_POST["sDno"]);
            $sDna = Clean($_POST["sDna"]);
            $servicesqft = Clean($_POST["servicesqft"]);
            $showroom = Clean($_POST["showroom"]);
            $sRyes = Clean($_POST["sRyes"]);
            $sRno = Clean($_POST["sRno"]);
            $sRna = Clean($_POST["sRna"]);
            $showroomsqft = Clean($_POST["showroomsqft"]);
            $warehouse = Clean($_POST["warehouse"]);
            $warehouse = Clean($_POST["warehouse"]);
            $wyes = Clean($_POST["wyes"]);
            $wno = Clean($_POST["wno"]);
            $wna = Clean($_POST["wna"]);
            $warehousesqft = Clean($_POST["warehousesqft"]);
            $estimateSales = Clean($_POST["estimateSales"]);

            //Write the actual email
            $to = '';
            $subject = "Your Form has been submitted to ".get_bloginfo('name');
            $headers = "From: $customerEmail\r\n";
            $headers .= "Reply-To: $customerEmail\r\n";
            $headers .= "Bcc: email@email.com, email2@email.com, \r\n";
            $headers .= "MIME-Version: 1.0 \r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1 \r\n";


            $message = '<html><body>';
            $message .= '<table rules="all" style="border-color: #666; width: 100%;" cellpadding="10">';
            $message .= "<tr style='background: #eee;'><td colspan='4'><strong>Thank you for requsting more info.</strong></td></tr>";
            $message .= "<tr style='background: #eee;'><td><strong>Company Name: </strong> </td><td>$companyName</td><td><strong>Contact Name: </strong></td><td>$contactName</td></tr>";
            $message .= "<tr><td>Address: </td><td>$address</td><td>Shipping Address</td><td>$addressShipping</td></tr>";
            $message .= "<tr><td>City: </td><td>$city</td><td>City: </td><td>$cityShipping</td></tr>";
            $message .= "<tr><td>State/Province: </td><td>$stateProvince</td><td>State/Province: </td><td>$stateProvinceShipping</td></tr>";
            $message .= "<tr><td>Zip/Postal: </td><td>$zipPostal</td><td>Zip/Postal: </td><td>$zipPostalShipping</td></tr>";
            $message .= "<tr><td>Phone Number: </td><td>$numberPhone</td><td>Email Address: </td><td>$customerEmail</td></tr>";
            $message .= "<tr><td>Fax Number: </td><td>$numberFax</td><td>Website: </td><td>$website</td></tr>";
            $message .= "<tr><td>800 Number: </td><td>$number800</td><td colspan='2'></td></tr>";
            $message .= "<tr><td colspan='2'>Business Type = $businessType</td><td colspan='2'>Liability Insurance =  $liabilityInsurance</td></tr>";
            $message .= "<tr><td>Sales Manager =  $salesManager</td><td>Sales People  $salesPeople</td><td>Inside  $salesInside</td><td>Outside  $salesOutside</td></tr>";
            $message .= "<tr><td colspan='2'>Service Department: $serviceDepartment</td><td colspan='2'>Service Dpt Sq Ft = $servicesqft</td></tr>";
            $message .= "<tr><td colspan='2'>Showroom: $showroom</td><td colspan='2'>Showroom Dpt Sq Ft = $showroomsqft</td></tr>";
            $message .= "<tr><td colspan='2'>Warehouse: $warehouse</td><td colspan='2'>Warehouse Sq Ft = $warehousesqft</td></tr>";
            $message .= "<tr><td colspan='4'>Estimate first year with us $estimateSales</td></tr>";
            $message .= "<tr><td colspan='4' style='text-align:center;'>Footer Info Goes Here<br>Footer address<br>Ph: 555.555.5555</td></tr>";
            $message .= "</table>";
            $message .= "</body></html>";
                 

            wp_mail("mainemail@email.com", $subject, $message, $headers);

            ?>
        <p style="text-align: center;"><h1> Thank you for filling out the form. <br>We will be in touch with you soon.</h1><br><br></p>
        <?php
        }
    
        
        ?>
        <h2 style="line-height:175% !important;">
        Fill out the custom form</h2>
        <form method="post" action="<?php echo the_permalink()?>">
        <table width="100%">
        <tbody><tr>
            <td>Company Name:</td>
            <td><input type="text" name="companyName" maxlength="35" value="" required></td>
            <td>Contact Name:</td>
            <td><input type="text" name="contactName" maxlength="35" value="" required></td>
            </tr>
            <tr>
            <td>Address:</td>
            <td><input type="text" name="address" value="" maxlength="30"  required></td>
            <td>Shipping Address:</td>
            <td><input type="text" name="addressShipping" maxlength="30" value="" ></td>
            </tr>
            <tr>
            <td>City:</td>
            <td><input type="text" name="city" value="" maxlength="30" required></td>
            <td>City:</td>
            <td><input type="text" name="cityShipping" maxlength="30" value=""></td>
            </tr>
            <tr>
            <td>State/Province:</td>
            <td><input type="text" name="stateProvince" value="" maxlength="30" required></td>
            <td>State/Province:</td>
            <td><input type="text" name="stateProvinceShipping" maxlength="30" value=""></td>
            </tr>
            <tr>
            <td>Zip/Postal Code:</td>
            <td><input type="text" name="zipPostal" value="" maxlength="11" required></td>
            <td>Zip/Postal Code:</td>
            <td><input type="text" name="zipPostalShipping" value="" maxlength="11"></td>
            </tr>	
            <tr>
            <td>Phone:</td>
            <td><input type="text" name="numberPhone" pattern="\d{3}[\-]\d{3}[\-]\d{4}" value="" required></td>
            <td>Email:</td>
            <td><input type="email" name="customerEmail" value="" maxlength="35"  required></td>
            </tr>							
            <tr>
            <td>Fax:</td>
            <td><input type="text" name="numberFax" pattern="\d{3}[\-]\d{3}[\-]\d{4}" value=""></td>
            <td>Website:</td>
            <td><input type="text" name="website" value="" maxlength="50" pattern="^(?:http(s)?:\/\/)?[\w.-]+(?:\.[\w\.-]+)+[\w\-\._~:/?#[\]@!\$&'\(\)\*\+,;=.]+$"></td>
            </tr>							
            <tr>
            <td>800 #:</td>
            <td><input type="text" name="number800" pattern="\d{3}[\-]\d{3}[\-]\d{4}"  value=""></td>
            <td></td>
            <td></td>
            </tr>							
            <tr>
            <td>Type of Business:</td>
            <td><select name="businessType" required>
            <option value="Independent Owner">Independent Operator</option>
            <option value="Partnership">Partnership</option>
            <option value="Corporation">Corporation</option>
            </select></td>
            <td>Do you carry product liability insurance?</td>
            <td><select name="liabilityInsurance" required>
            <option value="Yes">Yes</option>
            <option value="No">No</option>
            <option value="NA">N/A</option>
            </select></td>
            </tr>							
            <tr>
            <td>Do you have a sales Manager? </td><td><select name="salesManager" required>
            <option value="Yes">Yes</option>
            <option value="No">No</option>
            <option value="NA">N/A</option>
            </select></td>
            <td> Number of Salespeople: <input type="text" name="salesPeople" size="4" value=""  required></td><td>Inside: <input type="text" name="salesInside" size="4" value="" ><br>Outside: <input type="text" name="salesOutside" size="4" value="" ></td>
            </tr>							
            <tr>
            <td colspan="2">Service Department? <select name="serviceDepartment" required>
            <option value="Yes">Yes</option>
            <option value="No">No</option>
            <option value="NA">N/A</option>
            </select>Square Footage: <input type="text" name="servicesqft" size="8" value=""  required></td>
            <td colspan="2">Showroom? <select name="showroom" required>
            <option value="Yes">Yes</option>
            <option value="No">No</option>
            <option value="NA">N/A</option>
            </select> Square Footage: <input type="text" name="showroomsqft" size="8" value=""  required></td>
            </tr>							
            <tr>
            <td colspan="2">Does present location have a warehouse to stock product? <select name="warehouse" required>
            <option value="Yes">Yes</option>
            <option value="No">No</option>
            <option value="NA">N/A</option>
            </select> </td>
            <td colspan="2">Square Footage: <input type="text" name="warehousesqft" size="8" value=""  required></td>
            </tr>							
            <tr><td colspan="4">Please describe and estimate your first year of sales:</td></tr>
            <tr><td colspan="4"><input type="text" name="estimateSales" value="" style="height:80px;width:100%" required></td></tr>
            <tr><td td colspan="4" style="text-align: center;"><input type="submit" name="submit" style="width: 275px;" value="Submit">    <input type="reset" name="reset" style="width: 275px;" value="Clear"></td></tr>							
        </tbody></table>
</form>
        
        </div>
