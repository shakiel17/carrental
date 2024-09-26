           <center>
           <div style="width:816px;">
           <?php
            $name="";
            $fullname="";
            $address="";
            $datestart="";
            $datereturn="";
            $contactno="";
            $vehicle="";
            $car_rate="";
            $dayagreed="";
            $monthagreed="";
            $daysigned="";
            $monthsigned="";
            $yearsigned="";
            $odometer="";
            $plateno="";
            $fuel="";
            $destination="";            
            $payment_terms="";
            $washing="";
            $tendered="";
            $queryMain=$this->Rental_model->db->query("SELECT * FROM agreement WHERE book_id='$id'");
            if($queryMain->num_rows() > 0){
                $item=$queryMain->row_array();
                $name=$item['rented_by'];
                $address=$item['address'];
                $contactno=$item['contactno'];
                $vehicle=$item['car_id'];
                $odometer=$item['odometer'];
                $plateno=$item['plateno'];
                $fuel=$item['fuel_type'];
                $destination=$item['destination'];
                $car_rate=$item['rate'];
                $payment_terms=$item['payment_terms'];
                $washing=$item['washing'];
                $tendered=$item['totalamount'];
                $datestart=date('m/d/Y',strtotime($item['date_rented']))." ".date('h:i A',strtotime($item['time_rented']));
                $datereturn=date('m/d/Y',strtotime($item['date_return']))." ".date('h:i A',strtotime($item['time_return']));
                $dayagreed=date('d',strtotime($item['datearray']));
                $monthagreed=date('F',strtotime($item['datearray']));
                $monthsigned=date('F',strtotime($item['datearray']));
                $daysigned=date('d',strtotime($item['datearray']));
                $yearsigned=date('Y',strtotime($item['datearray']));                
                $date_start=$item['date_rented'];
                $time_start=$item['time_rented'];
                $date_return=$item['date_return'];
                $time_return=$item['time_return'];
            }else{
                $query = $this->Rental_model->db->query("SELECT * FROM booking WHERE id='$id'");
                $book=$query->row_array();
                $username=$book['customer_id'];
                $car_id=$book['car_id'];
                $destination=$book['destination'];
                $datestart=date('m/d/Y',strtotime($book['date_started']))." ".date('h:i A',strtotime($book['time_started']));
                $datereturn=date('m/d/Y',strtotime($book['date_return']))." ".date('h:i A',strtotime($book['time_return']));
                $query2 = $this->Rental_model->db->query("SELECT * FROM customer WHERE username='$username'");
                $user=$query2->row_array();
                $name=$user['lastname'].", ".$user['firstname']." ".$user['middlename'];
                $address=$user['address'];
                $contactno=$user['contactno'];
                $query3 = $this->Rental_model->db->query("SELECT * FROM cars WHERE id='$car_id'");
                $car=$query3->row_array();
                $vehicle=$car['description'];
                $car_rate=$car['amount'];
                $dayagreed=date('d');
                $monthagreed=date('F');
                $daysigned=date('d');
                $monthsigned=date('F');
                $yearsigned=date('Y');
                $payment_terms=$book['payment_type'];
                $date_start=$book['date_started'];
                $time_start=$book['time_started'];
                $date_return=$book['date_return'];
                $time_return=$book['time_return'];
               
            }            
            ?>            
            <?=form_open_multipart(base_url()."save_agreement");?>
            <input type="hidden" name="date_rented" value="<?=$date_start;?>">
            <input type="hidden" name="date_return" value="<?=$date_return;?>">
            <input type="hidden" name="time_rented" value="<?=$time_start;?>">
            <input type="hidden" name="time_return" value="<?=$time_return;?>">
            <input type="hidden" name="book_id" value="<?=$id;?>">
            <input type="hidden" name="payment_terms" value="<?=$payment_terms;?>">                                
                    <table width="100%" border="0">
                        <tr>
                            <td align="center">
                                <img src="<?=base_url();?>design/admin/images/logo.jpg" width="160" height="80" style="border-radius:50%;">
                            </td>                            
                        </tr>
                        <tr>
                            <td align="center" style="font-size: 14px;">
                                <b>DOM RENT A CAR KIDAPAWAN CAR RENTAL SERVICES</b>
                                <br>
                                <i>2398 Villamarzo Street, Kidapawan City, Philippines 9400</i>
                            </td>                            
                        </tr>
                    </table>
                    ------------------------------------------------------------------------------------------------------------------------------------------------------------
                     <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td colspan="2" align="center">
                                <b>RENTAL AGREEMENT</b>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <b>KNOW ALL MEN BY THESE PRESENTS:</b>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center">
                                &nbsp;
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" align="justify">
                                This Car Rental Agreement made and entered this <input type='text' name="day" style="width:50px;border:0;border-bottom:1px solid black;text-align:center;" value="<?=$dayagreed;?>"> day of <input type='text' name="month" style="width:150px;border:0;border-bottom:1px solid black;text-align:center;" value="<?=$monthagreed;?>"> executed by and between Mr./Mrs./Ms. <input type='text' name="renter" style="width:250px;border:0;border-bottom:1px solid black;text-align:center;" value="<?=$name;?>"> (Renter) with contact number <input type='text' name="contactno" style="width:150px;border:0;border-bottom:1px solid black;text-align:center;" value="<?=$contactno;?>">
                                with an address of <input type='text' name="address" style="width:300px;border:0;border-bottom:1px solid black;text-align:center;" value="<?=$address;?>"> (renter) and DOM RENT A CAR KIDAPAWAN CAR RENTAL SERVICES (company) with an address of 2398 Villamarzo Street, Kidapawan City.
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center">
                                &nbsp;
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <b>DETAILS: <i style="color:red;">(TO BE FILLED OUT BY THE STAFF)</i></b>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>VEHICLE: <input type='text' name="vehicle" style="width:200px;border:0;border-bottom:1px solid black;" value="<?=$vehicle;?>">
                            </td>
                            <td>
                                <b>ODOMETER: <input type='text' name="odometer" style="width:100px;border:0;border-bottom:1px solid black;" value="<?=$odometer;?>">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>PLATE NUMBER: <input type='text' name="plateno" style="width:200px;border:0;border-bottom:1px solid black;" value="<?=$plateno;?>">
                            </td>
                            <td>
                                <b>FUEL: <input type='text' name="fuel" style="width:100px;border:0;border-bottom:1px solid black;" value="<?=$fuel;?>">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>DESTINATION: <input type='text' name="destination" style="width:200px;border:0;border-bottom:1px solid black;" value="<?=$destination;?>">
                            </td>
                            <td>
                                <b>RATE: <input type='text' name="rate" style="width:100px;border:0;border-bottom:1px solid black;" value="<?=$car_rate;?>">
                            </td>
                        </tr>

                        <tr>
                            <td colspan="2" align="center">
                                &nbsp;
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <b>TERMS OF PAYMENT</b>
                            </td>
                        </tr>
                        <?php
                        $gcash="____";
                        $cash="____";
                        if($payment_terms=="GCash"){
                            $gcash="<u> &nbsp;&check;&nbsp; </u> ";
                        }
                        if($payment_terms=="Cash"){
                            $cash="<u> &nbsp;&check;&nbsp;  </u> ";
                        }
                        ?>
                        <tr>
                            <td colspan="2">
                                <b>CASH: <?=$cash;?> GCASH:<?=$gcash;?> WASHING: <input type='text' name="washing" style="width:50px;border:0;border-bottom:1px solid black;" value="<?=$washing;?>"> 
                            </td>                            
                        </tr>

                        <tr>
                            <td colspan="2" align="center">
                                &nbsp;
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <b>TOTAL AMOUNT TENDERED </b><input type='text' name="tendered" style="width:100px;border:0;border-bottom:1px solid black;" value="<?=$tendered;?>">
                            </td>
                        </tr>         
                        
                        <tr>
                            <td colspan="2" align="center">
                                &nbsp;
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <b>RENTAL PERIOD</b>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <b>DATE AND TIME STARTED: <input type='text' name="datetimestarted" style="width:200px;border:0;border-bottom:1px solid black;text-align:center;" value="<?=$datestart;?>"> DATE AND TIME RETURNED: <input type='text' name="datetimereturned" style="width:200px;border:0;border-bottom:1px solid black;text-align:center;" value="<?=$datereturn;?>"></b>
                            </td>                            
                        </tr>

                        <tr>
                            <td colspan="2" align="center">
                                &nbsp;
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <b>FUEL CONSUMPTION:</b>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <i>The fuel be shouldered by the renter and the vehicle shall be returned in full tank fuel capacity.</i>
                            </td>                            
                        </tr>
                        <tr>
                            <td colspan="2">
                                <b>EXCESS HOURS:</b>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <i>The use of vehicle beyond the agreed time of specified shall be subject to a penalty rate per hour depends on the vehicle rented.<br>
                                No fraction time is allowed for the 24 hours rental period. Minimum rate of P200 for Sedan, P300 for SUV and P400 for van per hour.
                                </i>
                            </td>                            
                        </tr>
                        <tr>
                            <td colspan="2">
                                <b>MILEAGE LIMIT:</b>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <i>The renter is only allowed to use the 300 kilometers limit for 24 hours. Extended kilometers will be charged P5 per kilometer.
                                </i>
                            </td>                            
                        </tr>
                        <tr>
                            <td colspan="2">
                                <b>RENTAL EXTENSION:</b>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <i>The renter is required to call or inform the management to request for extension 2 hours prior to the specified return time.
                                </i>
                            </td>                            
                        </tr>
                        <tr>
                            <td colspan="2">
                                <b>DESTINATION AND ROUTES:</b>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <i>The renter is required to call and notify the company regarding the diversion of routes or destination stored above.<br>
                                Failure to inform and answer the company's call for numerous times, the company will automatically report the renter and the vehicle to the respective authority.
                                </i>
                            </td>                            
                        </tr>
                        <tr>
                            <td colspan="2">
                                <b>IN CASE OF THE DAMAGE VEHICLE:</b>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <i>The cost of repairs for any damage will be the complete responsibility of the renter, he/she should shoulder all the repair cost of the damages, unless otherwise agreed to by the comapny.<br>
                                The renter must secure a Police report, photo copy of the driver's license and pay the daily rate while the vehicle is being repaired depending on the rented vehicle.<br>
                                The renter should be responsible for the return of the vehicle the same condition as when received by them, subject to reasonable wear and tear.<br>
                                The renter should advise the company of any damage to the car right after his/her discovery of such damage and provide a full written report of the circumstances of the loss or damage and furnish the company with any particulars or evidence as may reasonably be required by the company or the company's insurer.
                                </i>
                            </td>                            
                        </tr>
                        <tr>
                            <td colspan="2">
                                <b>LOSS OR THEFT:</b>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <i>If the rented vehicle mysteriously disappears or its stolen from the renter where he/she have not taken reasonable steps to ensure the vehicle's safety, the renter will be liable for and agree to conpensate the company for the greater of Replacement cost (without deduction for deprecation).
                                </i>
                            </td>                            
                        </tr>
                        <tr>
                            <td colspan="2">
                                <b>FLAT TIRES WHILE ON RENTAL:</b>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <i>The renter will shoulder the vulcanizing charges.
                                </i>
                            </td>                            
                        </tr>

                        <tr>
                            <td colspan="2">
                                <b>LOST/DAMAGE KEYS:</b>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <i>There will be a charge of 5,000 should the renter fail to return the keys.
                                </i>
                            </td>                            
                        </tr>
                        
                        <tr>
                            <td colspan="2">
                                <b>RELEASE OF LIABILITY:</b>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <i>DOM RENT A CAR KIDAPAWAN CAR RENTAL SERVICES IS NOT LIABLE FOR ANY LOSS OF ANY VALUABLES LEFT IN THE CAR.<BR>
                                THE RENTER HEREBY UNDERTAKE AND GUARANTEES THAT THE CAR SHALL BE USED OPERATED FOR LAWFUL PURPOSES AND IN STRICT CONFORMITY WITH ALL APPLICABLE LAWS, ORDINANCES, AND REGULATIONS.<BR>
                                IF THE RENTER USED OR PERMITS THE USE OF THE VEHICLE FOR ANY UNLAWFUL PURPOSE / APPREHENSION, HE/SHE SHALL RENDER DOM RENTA A CAR KIDAPAWAN CAR RENTAL SERVICES HARMLESS FROM ANY AND ALL CONNECTED THEREWITH, DOME RENT A CAR KIDAPAWAN CAR RENTAL SERVICES SHALL NOT BE RESPONSIBLE AND LIABLE FOR ANY UNFORSEEN HAPPENINGS BEYOND HUMAN CONTROL DURING THE DURATION OF THIS CONTRACT (e.g. broken bridges, unpassed roads, etc. caused by commotion, typhoon or any other natural calamities) THAT MAY DAMAGE OR PREVENT THE CAR FROM REACHING THE DESTINATION ON TIME.
                                </i>
                            </td>                            
                        </tr>
                        <tr>
                            <td colspan="2">
                                <b>COURSE OF ACTION:</b>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <i>In the event that the Renter does violate stipulation on this Agreement, DOM RENT A CAR KIDAPAWAN CAR RENTAL SERVICES may request and demand the restoration and  the return of the vehicle before the termination of this Agreement.<br>
                                It is understood that the renter shall defray all Court's costs, attorney's fee and legal interest.<br>
                                That both parties herein agree to adopt all stipulation terms and conditions appearing on the front page of theis Agreement as an integral part hereof.
                                </i>
                            </td>                            
                        </tr>
                        <tr>
                            <td colspan="2" align="center">
                                &nbsp;
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <i>Agreed and recognized this <input type='text' name="signedday" style="width:50px;border:0;border-bottom:1px solid black; text-align:center;" value="<?=$daysigned;?>"> day of <input type='text' name="signedmonth" style="width:150px;border:0;border-bottom:1px solid black; text-align:center;" value="<?=$monthsigned;?>">, <input type='text' name="signedyear" style="width:50px;border:0;border-bottom:1px solid black; text-align:center;" value="<?=$yearsigned;?>"></i>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center">
                                &nbsp;
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center">
                                &nbsp;
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <u><?=$name;?></u>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <i>Name and Signature (renter)</i>
                            </td>
                        </tr>                        
                    </table>                
                    <div>
                        <center>