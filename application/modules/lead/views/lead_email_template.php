<table style="width: 800px;font-size: 14px; color: #000;">
                    <tr style="background-color: #f1ac4561;">
                    <td style="width: 50%;padding: 8px 15px;"><b>From </b></td>
                    <td style="width: 50%;padding: 5px 15px;"><?php echo $from_address; ?></td>
                    </tr>
                    <tr style="background-color: #f1ac4561;">
                    <td style="width: 50%;padding: 8px 15px;"><b>Email </b></td>
                    <td style="width: 50%;padding: 5px 15px;"><?php echo $to_address; ?></td>
                    </tr>
                    <tr style="background-color: #f1ac4561;">
                    <td style="width: 50%;padding: 8px 15px;"><b>Parts Description </b></td>
                    <td style="width: 50%;padding: 5px 15px;"><?php echo $parts_description; ?></td>
                    </tr>
                    <?php if ($additional_information != '') 
                    { ?>
                        <tr style="background-color: #f1ac4561;">
                    <td style="width: 50%;padding: 8px 15px;"><b>Additional Information</b></td>
                    <td style="width: 50%;padding: 5px 15px;"><?php echo $additional_information; ?></td>
                    </tr>
                   <?php } ?>
                   
                    <tr style="background-color: #f1ac4561;">
                    <td style="width: 50%;padding: 8px 15px;"><b>Contact Information</b></td>
                    <td style="width: 50%;padding: 5px 15px;"><?php echo $contact_information; ?></td>
                    </tr>
                     </table>