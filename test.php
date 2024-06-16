<?php
/*
Handle creation of domain subwebsite from server that will have same directory for all but each different sub directory
Handle in the change from pending to external/internal
*/
include("../header.php");


$uid = $_SESSION['user']['id'];

$sql = "SELECT * FROM users WHERE id='$uid'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $_SESSION['user'] = $row;
    }
}

if (isset($_POST['others'])) {
    $contact = json_encode($_POST);
    $contact = $conn->real_escape_string($contact);
    $sql = "INSERT INTO webdata (uid, others) VALUES ('$uid', '$contact') ON DUPLICATE KEY UPDATE others='$contact'";
    if ($conn1->query($sql) === TRUE) {
    } else {
        // echo $conn->error;
    }
    $swal = array("Success", "Data Updated", "success");
}

$sql = "SELECT * FROM webdata WHERE uid=$uid";
$result = $conn1->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $website_data = $row;
    }
}
if (!empty($website_data['others'])) {
    $website_data['others'] = json_decode($website_data['others'], true);
}
?>
<style>
    .accordion i {
        font-size: 25px;
        background: #355C7D;
        /* fallback for old browsers */
        background: -webkit-linear-gradient(to left, #4b79a1, #283e51);
        /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(to left, #4b79a1, #283e51);
        /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        padding: 6px 8px;
        border-radius: 10px;
        color: white;
    }

    .accordion button {
        font-size: 18px;
    }

    .accordion div .row {
        font-size: 18px;
    }


    @media screen and (max-width: 576px) {
        .sub_section {
            border-top: 1px solid rgba(0, 0, 0, 0.1);
        }
    }

    a {
        text-decoration: none;
    }

    a.sub_section {
        color: black;
    }
</style>


<style>
    select,
    textarea {
        width: 100%;
        background: transparent;
        border: none;
        outline: none;
    }

    .mail-prod {
        display: flex;
        flex-direction: row;
        align-items: center;
        gap: 10px;
        flex-wrap: nowrap;
        overflow-x: scroll;
        padding: 10px 0px;
    }

    .mail-prod div {
        /* background: blue; */
        /* color: #FFFF; */
        height: 40px;
        padding: 10px 15px;
        flex-shrink: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 30px;
        font-weight: 600;
        box-shadow: 0px 0px 6px 1px rgba(0, 0, 0, 0.1);
    }

    .mail-prod div.active {
        color: blue;
        background: #FFFF;
        border: 1px solid blue;

    }

    @media only screen and (min-width: 768px) {
        .mail-prod {
            overflow-x: initial;
            flex-wrap: wrap;
        }
    }
</style>

<body>
    <div class="container-vh">

        <?php
        include('../sidebar.php')
        ?>
        <div class="main">


            <?php include("../nheader.php"); ?>
            <div class="content">

                <!-- <div class="alert-container">
                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="0.25" y="0.25" width="39.5" height="39.5" rx="19.75" stroke="#A1A1A1" stroke-width="0.5"/>
                        <path d="M12.1089 21.995C11.9317 23.1226 12.724 23.9052 13.694 24.2952C17.413 25.7905 22.5883 25.7905 26.3072 24.2952C27.2773 23.9052 28.0696 23.1226 27.8924 21.995C27.7835 21.3021 27.245 20.7251 26.846 20.1617C26.3234 19.4146 26.2715 18.5997 26.2714 17.7328C26.2714 14.3826 23.4639 11.6667 20.0007 11.6667C16.5374 11.6667 13.7299 14.3826 13.7299 17.7328C13.7298 18.5997 13.6779 19.4146 13.1553 20.1617C12.7564 20.7251 12.2178 21.3021 12.1089 21.995Z" stroke="#3D3D3D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M17.5 27.5C18.1634 28.0182 19.0396 28.3333 20 28.3333C20.9604 28.3333 21.8366 28.0182 22.5 27.5" stroke="#3D3D3D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <rect x="22.25" y="10.25" width="7.5" height="7.5" rx="3.75" fill="#E01717" stroke="#C10A0A" stroke-width="0.5"/>
                        </svg>
                    
                    <div>
                        <p>Please STOP depositing funds into Kuda. They've discontinued virtual account services and may soon disable all accounts. Continuing use risks funds not being credited. </p>
                        <button>Verify BVN</button>
                    </div>
                        
                    <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="0.25" y="0.25" width="27.5" height="27.5" rx="13.75" stroke="#A1A1A1" stroke-width="0.5"/>
                        <path d="M18.6668 9.33334L9.3335 18.6667M9.3335 9.33334L18.6668 18.6667" stroke="#3D3D3D" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        
                </div> -->
                <h1 style="font-size:25px">Others Settings
                </h1>


                <div class="account-container">

                    <form class="form" method="post" action="others.php">
                        <div class="form-container" style="background:white;">





                      

                            <div class="o-con">
                                <h1>Services</h1>

                                <div class="other-settings-container">
                                    <input type="hidden" name="airtimetocash" id="airtimetocash" value="0">
                                    <div class="form-box-other form-box">


                                        <label for="">Airtime To Cash</label>

                                        <div class="input-other-con ">

                                            <div class="input-other <?php echo $website_data['others']['airtimetocash'] == '1'? 'active':null ?> ">
                                                <p>Enabled</p>
                                                <svg width="16" height="16" class="yes-svg" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="8" cy="8" r="5.5" fill="#FEFEFE" stroke="#031897" stroke-width="5" />
                                                </svg>
                                                <svg width="16" class="no-svg" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="8" cy="8" r="7.5" fill="#FEFEFE" stroke="#E3E3E3" />
                                                </svg>

                                                <input type="hidden" placeholder="Enabled" data-id="en" value="1">
                                            </div>

                                            <div class="input-other  <?php echo $website_data['others']['airtimetocash'] == '0'? 'active':null ?> ">
                                                <p>
                                                    Disabled
                                                </p>
                                                <svg width="16" class="no-svg" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="8" cy="8" r="7.5" fill="#FEFEFE" stroke="#E3E3E3" />
                                                </svg>
                                                <svg width="16" height="16" class="yes-svg" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="8" cy="8" r="5.5" fill="#FEFEFE" stroke="#031897" stroke-width="5" />
                                                </svg>

                                                <input type="hidden" placeholder="Enabled" data-id="en" value="0">

                                            </div>
                                        </div>


                                    </div>




                                </div>


                                <div class="other-settings-container">
                                    <input type="hidden" name="airtimepin" id="airtimepin" value="0">
                                    <div class="form-box-other form-box">


                                        <label for="">Airtime PIN Service</label>

                                        <div class="input-other-con">

                                            <div class="input-other  <?php echo $website_data['others']['airtimepin'] == '1'? 'active':null ?> " >
                                                <p>Enabled</p>
                                                <svg width="16" height="16" class="yes-svg" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="8" cy="8" r="5.5" fill="#FEFEFE" stroke="#031897" stroke-width="5" />
                                                </svg>
                                                <svg width="16" class="no-svg" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="8" cy="8" r="7.5" fill="#FEFEFE" stroke="#E3E3E3" />
                                                </svg>

                                                <input type="hidden" placeholder="Enabled" data-id="en" value="1">
                                            </div>

                                            <div class="input-other  <?php echo $website_data['others']['airtimepin'] == '0'? 'active':null ?> ">
                                                <p>
                                                    Disabled
                                                </p>
                                                <svg width="16" class="no-svg" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="8" cy="8" r="7.5" fill="#FEFEFE" stroke="#E3E3E3" />
                                                </svg>
                                                <svg width="16" height="16" class="yes-svg" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="8" cy="8" r="5.5" fill="#FEFEFE" stroke="#031897" stroke-width="5" />
                                                </svg>

                                                <input type="hidden" placeholder="Enabled" data-id="en" value="0">

                                            </div>
                                        </div>


                                    </div>




                                </div>

                                <div class="other-settings-container">
                                    <input type="hidden" name="betting" id="betting" value="0">
                                    <div class="form-box-other form-box">


                                        <label for=""> Betting Wallet Funding Service</label>

                                        <div class="input-other-con">

                                            <div class="input-other <?php echo $website_data['others']['betting'] == '1'? 'active':null ?> ">
                                                <p>Enabled</p>
                                                <svg width="16" height="16" class="yes-svg" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="8" cy="8" r="5.5" fill="#FEFEFE" stroke="#031897" stroke-width="5" />
                                                </svg>
                                                <svg width="16" class="no-svg" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="8" cy="8" r="7.5" fill="#FEFEFE" stroke="#E3E3E3" />
                                                </svg>

                                                <input type="hidden" placeholder="Enabled" data-id="en" value="1">
                                            </div>

                                            <div class="input-other <?php echo $website_data['others']['betting'] == '0'? 'active':null ?> ">
                                                <p>
                                                    Disabled
                                                </p>
                                                <svg width="16" class="no-svg" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="8" cy="8" r="7.5" fill="#FEFEFE" stroke="#E3E3E3" />
                                                </svg>
                                                <svg width="16" height="16" class="yes-svg" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="8" cy="8" r="5.5" fill="#FEFEFE" stroke="#031897" stroke-width="5" />
                                                </svg>

                                                <input type="hidden" placeholder="Enabled" data-id="en" value="0">

                                            </div>
                                        </div>


                                    </div>




                                </div>
                            </div>


                            <div class="o-con">
                                <h1>VIP Access</h1>

                                <div class="other-settings-container">
                                    <input type="hidden" name="VIP" id="VIP" value="automated">
                                    <div class="form-box-other form-box">


                                        <label for="">VIP User Upgrade</label>

                                        <div class="input-other-scroll">

                                            <div class="input-other <?php echo $website_data['others']['VIP'] == 'manual'? 'active':null ?> ">
                                                <p>Manual</p>
                                                <svg width="16" height="16" class="yes-svg" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="8" cy="8" r="5.5" fill="#FEFEFE" stroke="#031897" stroke-width="5" />
                                                </svg>
                                                <svg width="16" class="no-svg" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="8" cy="8" r="7.5" fill="#FEFEFE" stroke="#E3E3E3" />
                                                </svg>

                                                <input type="hidden" placeholder="Enabled" data-id="en" value="manual">
                                            </div>

                                            <div class="input-other <?php echo $website_data['others']['VIP'] == 'payment'? 'active':null ?> ">
                                                <p>
                                                    Payment
                                                </p>
                                                <svg width="16" class="no-svg" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="8" cy="8" r="7.5" fill="#FEFEFE" stroke="#E3E3E3" />
                                                </svg>
                                                <svg width="16" height="16" class="yes-svg" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="8" cy="8" r="5.5" fill="#FEFEFE" stroke="#031897" stroke-width="5" />
                                                </svg>

                                                <input type="hidden" placeholder="Enabled" data-id="en" value="payment">

                                            </div>


                                            <div class="input-other <?php echo $website_data['others']['VIP'] == 'deposit'? 'active':null ?> ">
                                                <p>
                                                    By Deposit
                                                </p>
                                                <svg width="16" class="no-svg" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="8" cy="8" r="7.5" fill="#FEFEFE" stroke="#E3E3E3" />
                                                </svg>
                                                <svg width="16" height="16" class="yes-svg" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="8" cy="8" r="5.5" fill="#FEFEFE" stroke="#031897" stroke-width="5" />
                                                </svg>

                                                <input type="hidden" placeholder="Enabled" data-id="en" value="deposit">

                                            </div>

                                            <div class="input-other <?php echo $website_data['others']['VIP'] == 'automated'? 'active':null ?> ">
                                                <p>
                                                    By Referrals
                                                </p>
                                                <svg width="16" class="no-svg" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="8" cy="8" r="7.5" fill="#FEFEFE" stroke="#E3E3E3" />
                                                </svg>
                                                <svg width="16" height="16" class="yes-svg" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="8" cy="8" r="5.5" fill="#FEFEFE" stroke="#031897" stroke-width="5" />
                                                </svg>

                                                <input type="hidden" placeholder="Enabled" data-id="en" value="automated">

                                            </div>
                                        </div>


                                    </div>




                                </div>


                                <div class="vip_form">




                                </div>

                            </div>

                            <div class="o-con">
                                <h1>Account Verification</h1>

                                <div class="other-settings-container">
                                    <input type="hidden" name="verification" id="verification" value="bvn">
                                    <div class="form-box-other form-box">


                                        <label for="">Verification Methods</label>

                                        <div class="input-other-con">

                                            <div class="input-other <?php echo $website_data['others']['verification'] == 'bvn'? 'active':null ?> ">
                                                <p>BVN Alone</p>
                                                <svg width="16" height="16" class="yes-svg" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="8" cy="8" r="5.5" fill="#FEFEFE" stroke="#031897" stroke-width="5" />
                                                </svg>
                                                <svg width="16" class="no-svg" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="8" cy="8" r="7.5" fill="#FEFEFE" stroke="#E3E3E3" />
                                                </svg>

                                                <input type="hidden" placeholder="Enabled" data-id="en" value="bvn">
                                            </div>

                                            <div class="input-other <?php echo $website_data['others']['verification'] == 'both'? 'active':null ?> ">
                                                <p>
                                                    BVN & NIN
                                                </p>
                                                <svg width="16" class="no-svg" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="8" cy="8" r="7.5" fill="#FEFEFE" stroke="#E3E3E3" />
                                                </svg>
                                                <svg width="16" height="16" class="yes-svg" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="8" cy="8" r="5.5" fill="#FEFEFE" stroke="#031897" stroke-width="5" />
                                                </svg>

                                                <input type="hidden" placeholder="Enabled" data-id="en" value="both">

                                            </div>
                                        </div>


                                    </div>




                                </div>


                                <div class="other-settings-container">
                                    <input type="hidden" name="costbvn" id="costbvn" value="customer">
                                    <div class="form-box-other form-box">


                                        <label for="">Who Bares Cost of BVN Verification</label>

                                        <div class="input-other-con">

                                            <div class="input-other <?php echo $website_data['others']['costbvn'] == 'customer'? 'active':null ?> ">
                                                <p>Customer</p>
                                                <svg width="16" height="16" class="yes-svg" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="8" cy="8" r="5.5" fill="#FEFEFE" stroke="#031897" stroke-width="5" />
                                                </svg>
                                                <svg width="16" class="no-svg" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="8" cy="8" r="7.5" fill="#FEFEFE" stroke="#E3E3E3" />
                                                </svg>

                                                <input type="hidden" placeholder="Enabled" data-id="en" value="customer">
                                            </div>

                                            <div class="input-other <?php echo $website_data['others']['costbvn'] == 'webmaster'? 'active':null ?>" >
                                                <p>
                                                    Webmaster
                                                </p>
                                                <svg width="16" class="no-svg" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="8" cy="8" r="7.5" fill="#FEFEFE" stroke="#E3E3E3" />
                                                </svg>
                                                <svg width="16" height="16" class="yes-svg" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="8" cy="8" r="5.5" fill="#FEFEFE" stroke="#031897" stroke-width="5" />
                                                </svg>

                                                <input type="hidden" placeholder="Enabled" data-id="en" value="webmaster">

                                            </div>
                                        </div>


                                    </div>




                                </div>

                                <div class="other-settings-container">
                                    <input type="hidden" name="costnin" id="costnin" value="customer">
                                    <div class="form-box-other form-box">


                                        <label for="">Who Bares Cost of NIN Verification</label>

                                        <div class="input-other-con">

                                            <div class="input-other <?php echo $website_data['others']['costnin'] == 'customer'? 'active':null ?>">
                                                <p>Customer</p>
                                                <svg width="16" height="16" class="yes-svg" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="8" cy="8" r="5.5" fill="#FEFEFE" stroke="#031897" stroke-width="5" />
                                                </svg>
                                                <svg width="16" class="no-svg" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="8" cy="8" r="7.5" fill="#FEFEFE" stroke="#E3E3E3" />
                                                </svg>

                                                <input type="hidden" placeholder="Enabled" data-id="en" value="customer">
                                            </div>

                                            <div class="input-other <?php echo $website_data['others']['costnin'] == 'webmaster'? 'active':null ?>">
                                                <p>
                                                    Webmaster
                                                </p>
                                                <svg width="16" class="no-svg" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="8" cy="8" r="7.5" fill="#FEFEFE" stroke="#E3E3E3" />
                                                </svg>
                                                <svg width="16" height="16" class="yes-svg" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="8" cy="8" r="5.5" fill="#FEFEFE" stroke="#031897" stroke-width="5" />
                                                </svg>

                                                <input type="hidden" placeholder="Enabled" data-id="en" value="webmaster">

                                            </div>
                                        </div>


                                    </div>




                                </div>
                            </div>

                            <div class="o-con">
                                <h1>Others</h1>

                                <div class="other-settings-container">
                                    <input type="hidden" name="referral" id="referral" value="">
                                    <div class="form-box-other form-box">


                                        <label for="">Referral Program</label>

                                        <div class="input-other-con">

                                            <div class="input-other  <?php echo $website_data['others']['referral'] == '1'? 'active':null ?>">
                                                <p>Enable</p>
                                                <svg width="16" height="16" class="yes-svg" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="8" cy="8" r="5.5" fill="#FEFEFE" stroke="#031897" stroke-width="5" />
                                                </svg>
                                                <svg width="16" class="no-svg" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="8" cy="8" r="7.5" fill="#FEFEFE" stroke="#E3E3E3" />
                                                </svg>

                                                <input type="hidden" placeholder="Enabled" data-id="en" value="1">
                                            </div>

                                            <div class="input-other  <?php echo $website_data['others']['referral'] == '0'? 'active':null ?>">
                                                <p>
                                                    Disable
                                                </p>
                                                <svg width="16" class="no-svg" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="8" cy="8" r="7.5" fill="#FEFEFE" stroke="#E3E3E3" />
                                                </svg>
                                                <svg width="16" height="16" class="yes-svg" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="8" cy="8" r="5.5" fill="#FEFEFE" stroke="#031897" stroke-width="5" />
                                                </svg>

                                                <input type="hidden" placeholder="Enabled" data-id="en" value="0">

                                            </div>
                                        </div>


                                    </div>




                                </div>

                                <div class="form-box">
                                    <label for="">Referral Program Description</label>

                                    <div class="form-input input input-bordered   flex items-center gap-2">
                                        <textarea class=" -sm" id="description" name="ref_desc"><?php echo trim($website_data['others']['ref_desc']); ?></textarea>
                                    </div>
                                </div>

                                <div class="other-settings-container">
                                    <input type="hidden" name="charges" id="charges" value="0">
                                    <div class="form-box-other form-box">


                                        <label for="">Who Bears Automated Deposits Charges?</label>

                                        <div class="input-other-con">

                                            <div class="input-other  <?php echo $website_data['others']['charges'] == '1'? 'active':null ?>">
                                                <p>Customer</p>
                                                <svg width="16" height="16" class="yes-svg" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="8" cy="8" r="5.5" fill="#FEFEFE" stroke="#031897" stroke-width="5" />
                                                </svg>
                                                <svg width="16" class="no-svg" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="8" cy="8" r="7.5" fill="#FEFEFE" stroke="#E3E3E3" />
                                                </svg>

                                                <input type="hidden" placeholder="Enabled" data-id="en" value="1">
                                            </div>

                                            <div class="input-other  <?php echo $website_data['others']['referral'] == '0'? 'active':null ?>">
                                                <p>
                                                    Owmer
                                                </p>
                                                <svg width="16" class="no-svg" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="8" cy="8" r="7.5" fill="#FEFEFE" stroke="#E3E3E3" />
                                                </svg>
                                                <svg width="16" height="16" class="yes-svg" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="8" cy="8" r="5.5" fill="#FEFEFE" stroke="#031897" stroke-width="5" />
                                                </svg>

                                                <input type="hidden" placeholder="Enabled" data-id="en" value="0">

                                            </div>
                                        </div>


                                    </div>




                                </div>

                                <div class="other-settings-container">
                                    <input type="hidden" name="errors" value="0" id="errors">
                                    <div class="form-box-other form-box">


                                        <label for="">Show Website Errors (Virtual Account Generation)</label>

                                        <div class="input-other-con">

                                            <div class="input-other  <?php echo $website_data['others']['errors'] == '1'? 'active':null ?>">
                                                <p>
                                                    Enable
                                                </p>
                                                <svg width="16" class="no-svg" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="8" cy="8" r="7.5" fill="#FEFEFE" stroke="#E3E3E3" />
                                                </svg>
                                                <svg width="16" height="16" class="yes-svg" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="8" cy="8" r="5.5" fill="#FEFEFE" stroke="#031897" stroke-width="5" />
                                                </svg>

                                                <input type="hidden" placeholder="Enabled" data-id="en" value="1">

                                            </div>
                                            <div class="input-other  <?php echo $website_data['others']['errors'] == '0'? 'active':null ?>">
                                                <p>Disable</p>
                                                <svg width="16" height="16" class="yes-svg" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="8" cy="8" r="5.5" fill="#FEFEFE" stroke="#031897" stroke-width="5" />
                                                </svg>
                                                <svg width="16" class="no-svg" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="8" cy="8" r="7.5" fill="#FEFEFE" stroke="#E3E3E3" />
                                                </svg>

                                                <input type="hidden" placeholder="Enabled" data-id="en" value="0">
                                            </div>

                                        </div>


                                    </div>




                                </div>
                                <div class="other-settings-container">
                                    <input type="hidden" name="ref_method" value="0" id="ref_method">
                                    <div class="form-box-other form-box">


                                        <label for="">Referral Method</label>

                                        <div class="input-other-con">

                                            <div class="input-other  <?php echo $website_data['others']['ref_method'] == '0'? 'active':null ?>">
                                                <p>Link</p>
                                                <svg width="16" height="16" class="yes-svg" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="8" cy="8" r="5.5" fill="#FEFEFE" stroke="#031897" stroke-width="5" />
                                                </svg>
                                                <svg width="16" class="no-svg" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="8" cy="8" r="7.5" fill="#FEFEFE" stroke="#E3E3E3" />
                                                </svg>

                                                <input type="hidden" placeholder="Enabled" data-id="en" value="0">
                                            </div>

                                            <div class="input-other  <?php echo $website_data['others']['ref_method'] == '1'? 'active':null ?>">
                                                <p>
                                                    Promo
                                                </p>
                                                <svg width="16" class="no-svg" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="8" cy="8" r="7.5" fill="#FEFEFE" stroke="#E3E3E3" />
                                                </svg>
                                                <svg width="16" height="16" class="yes-svg" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="8" cy="8" r="5.5" fill="#FEFEFE" stroke="#031897" stroke-width="5" />
                                                </svg>

                                                <input type="hidden" placeholder="Enabled" data-id="en" value="1">

                                            </div>
                                        </div>


                                    </div>




                                </div>

                                <?php if (!empty($_SESSION['website']['android'])) {
                                ?>

                                    <div class="form-box">
                                        <div class="alert alert-info" role="alert">
                                            You can enable a landing page for your app, note that you must have set Feature 1 to 3 and Detailed description 1 to 3 texts. You must also setup your Feature images 1 to 3
                                        </div>

                                        <label for="">App Landing Page</label>

                                        <div class="form-input input input-bordered   flex items-center gap-2">
                                            <select class=" -sm" id="app" name="app">
                                                <option value="0" selected>Disable</option>
                                                <option value="1">Enable</option>
                                            </select>
                                        </div>
                                    </div>


                                <?php
                                } ?>

                            </div>


                        </div>
                        <button class="t1" type="submit" name="others">
                            Submit
                        </button>


                    </form>
                    <script>
                        <?php if (!empty($website_data['others'])) { ?>
                            document.getElementById("airtimetocash").value = "<?php echo $website_data['others']['airtimetocash']; ?>";
                            document.getElementById("referral").value = "<?php echo $website_data['others']['referral']; ?>";
                            document.getElementById("betting").value = "<?php echo $website_data['others']['betting']; ?>";
                            document.getElementById("ref_method").value = "<?php echo $website_data['others']['ref_method']; ?>";
                            document.getElementById("charges").value = "<?php echo $website_data['others']['charges']; ?>";
                            document.getElementById("errors").value = "<?php echo $website_data['others']['errors']; ?>";
                            document.getElementById("airtimepin").value = "<?php echo $website_data['others']['airtimepin']; ?>";
                            document.getElementById("verification").value = "<?php echo $website_data['others']['verification']; ?>";
                            document.getElementById("costbvn").value = "<?php echo $website_data['others']['costbvn']; ?>";
                            document.getElementById("costnin").value = "<?php echo $website_data['others']['costnin']; ?>";
                            document.getElementById("VIP").value = "<?php echo $website_data['others']['VIP']; ?>";

                            <?php if (!empty($_SESSION['website']['android'])) { ?>document.getElementById("app").value = "<?php echo $website_data['others']['app']; ?>";
                        <?php } ?>
                        <?php } ?>
                    </script>

                </div>

            </div>

        </div>

    </div>

    <div class="manual" style="display: none;">
        <div class="alert alert-warning vip_manual" role="alert">
            Manual VIP users means you will have to monitor and upgrade your users to VIP manually in the (Customer Menu > View Users > Edit) section (If you wish to have VIP users on your website).
        </div>
    </div>
    <div class="automated" style="display: none; margin-top:10px;">


        <div class="form-box" style=" margin-top:15px;">
            <label for="">Activate VIP When</label>

            <div class="form-input input input-bordered   flex items-center gap-2">
                <select class=" -sm" name="vip_activation">
                    <?php
                    $counter = array(1, 5, 10, 20, 50, 100);
                    foreach ($counter as $key => $value) {
                    ?>

                        <option value="referred_<?php echo $value; ?>" <?php if ($website_data['others']['vip_activation'] == "referred_" . $value) {
                                                                            echo "selected";
                                                                        } ?>>Users have referred at least <?php echo $value; ?> referrals who have deposited at least</option>
                    <?php
                    }
                    ?>
                </select>
            </div>
        </div>

        <div class="form-box" style=" margin-top:15px;">
            <label for="">Minimum amount required for activation</label>


            <div class="form-input input input-bordered   flex items-center gap-2">
                <input type="number" class="" id="data" name="vip_amount" value="<?php echo $website_data['others']['vip_amount']; ?>" placeholder="Enter Amount Here">
            </div>
        </div>

        <div class="other-settings-container">
            <input type="hidden" name="vip_duration" value="3153600000" id="vip_duration">
            <div class="form-box-other form-box">


                <label for="">VIP Duration</label>

                <div class="input-other-scroll">

                    <div class="input-other <?php echo $website_data['others']['vip_duration'] == '2630000'? 'active':null ?>">
                        <p>One Month</p>
                        <svg width="16" height="16" class="yes-svg" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="8" cy="8" r="5.5" fill="#FEFEFE" stroke="#031897" stroke-width="5" />
                        </svg>
                        <svg width="16" class="no-svg" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="8" cy="8" r="7.5" fill="#FEFEFE" stroke="#E3E3E3" />
                        </svg>

                        <input type="hidden" placeholder="Enabled" data-id="en" value="2630000">
                    </div>

                    <div class="input-other <?php echo $website_data['others']['vip_duration'] == '7890000'? 'active':null ?>">
                        <p>
                            Three Months
                        </p>
                        <svg width="16" class="no-svg" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="8" cy="8" r="7.5" fill="#FEFEFE" stroke="#E3E3E3" />
                        </svg>
                        <svg width="16" height="16" class="yes-svg" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="8" cy="8" r="5.5" fill="#FEFEFE" stroke="#031897" stroke-width="5" />
                        </svg>

                        <input type="hidden" placeholder="Enabled" data-id="en" value="7890000">

                    </div>

                    <div class="input-other  <?php echo $website_data['others']['vip_duration'] == '15780000'? 'active':null ?>">
                        <p>
                            Six Months
                        </p>
                        <svg width="16" class="no-svg" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="8" cy="8" r="7.5" fill="#FEFEFE" stroke="#E3E3E3" />
                        </svg>
                        <svg width="16" height="16" class="yes-svg" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="8" cy="8" r="5.5" fill="#FEFEFE" stroke="#031897" stroke-width="5" />
                        </svg>

                        <input type="hidden" placeholder="Enabled" data-id="en" value="15780000">

                    </div>

                    <div class="input-other <?php echo $website_data['others']['vip_duration'] == '31536000'? 'active':null ?>" >
                        <p>
                            1 Year
                        </p>
                        <svg width="16" class="no-svg" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="8" cy="8" r="7.5" fill="#FEFEFE" stroke="#E3E3E3" />
                        </svg>
                        <svg width="16" height="16" class="yes-svg" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="8" cy="8" r="5.5" fill="#FEFEFE" stroke="#031897" stroke-width="5" />
                        </svg>

                        <input type="hidden" placeholder="Enabled" data-id="en" value="31536000">

                    </div>

                    <div class="input-other <?php echo $website_data['others']['vip_duration'] == '3153600000'? 'active':null ?>">
                        <p>
                            Lifetime
                        </p>
                        <svg width="16" class="no-svg" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="8" cy="8" r="7.5" fill="#FEFEFE" stroke="#E3E3E3" />
                        </svg>
                        <svg width="16" height="16" class="yes-svg" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="8" cy="8" r="5.5" fill="#FEFEFE" stroke="#031897" stroke-width="5" />
                        </svg>

                        <input type="hidden" placeholder="Enabled" data-id="en" value="3153600000">

                    </div>
                </div>


            </div>




        </div>

    
        <div class="alert alert-warning vip_manual  " style=" margin-top:15px;" role="alert">
            After the Specified Automated time, the referrals of the user is reset back to zero and the user loses VIP previledges
        </div>

    </div>

    <div class="payment" style="display:none;">
        <div class="alert alert-warning vip_payment" role="alert">
            Your users will have to pay you manually before they can be VIP members
        </div>

        <div class="form-box">
            <label for="">VIP amount</label>
            <div class="form-input input input-bordered   flex items-center gap-2">

                <input type="number" class="" id="data" value="<?php echo $website_data['others']['vip_amount']; ?>" name="vip_amount" placeholder="Enter Amount Here">
            </div>
        </div>
 
        <div class="other-settings-container">
            <input type="hidden" name="vip_duration" value="3153600000" id="vip_duration">
            <div class="form-box-other form-box">


                <label for="">VIP Duration</label>

                <div class="input-other-scroll">

                    <div class="input-other <?php echo $website_data['others']['vip_duration'] == '2630000'? 'active':null ?>">
                        <p>One Month</p>
                        <svg width="16" height="16" class="yes-svg" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="8" cy="8" r="5.5" fill="#FEFEFE" stroke="#031897" stroke-width="5" />
                        </svg>
                        <svg width="16" class="no-svg" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="8" cy="8" r="7.5" fill="#FEFEFE" stroke="#E3E3E3" />
                        </svg>

                        <input type="hidden" placeholder="Enabled" data-id="en" value="2630000">
                    </div>

                    <div class="input-other <?php echo $website_data['others']['vip_duration'] == '7890000'? 'active':null ?>">
                        <p>
                            Three Months
                        </p>
                        <svg width="16" class="no-svg" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="8" cy="8" r="7.5" fill="#FEFEFE" stroke="#E3E3E3" />
                        </svg>
                        <svg width="16" height="16" class="yes-svg" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="8" cy="8" r="5.5" fill="#FEFEFE" stroke="#031897" stroke-width="5" />
                        </svg>

                        <input type="hidden" placeholder="Enabled" data-id="en" value="7890000">

                    </div>

                    <div class="input-other  <?php echo $website_data['others']['vip_duration'] == '15780000'? 'active':null ?>">
                        <p>
                            Six Months
                        </p>
                        <svg width="16" class="no-svg" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="8" cy="8" r="7.5" fill="#FEFEFE" stroke="#E3E3E3" />
                        </svg>
                        <svg width="16" height="16" class="yes-svg" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="8" cy="8" r="5.5" fill="#FEFEFE" stroke="#031897" stroke-width="5" />
                        </svg>

                        <input type="hidden" placeholder="Enabled" data-id="en" value="15780000">

                    </div>

                    <div class="input-other <?php echo $website_data['others']['vip_duration'] == '31536000'? 'active':null ?>" >
                        <p>
                            1 Year
                        </p>
                        <svg width="16" class="no-svg" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="8" cy="8" r="7.5" fill="#FEFEFE" stroke="#E3E3E3" />
                        </svg>
                        <svg width="16" height="16" class="yes-svg" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="8" cy="8" r="5.5" fill="#FEFEFE" stroke="#031897" stroke-width="5" />
                        </svg>

                        <input type="hidden" placeholder="Enabled" data-id="en" value="31536000">

                    </div>

                    <div class="input-other <?php echo $website_data['others']['vip_duration'] == '3153600000'? 'active':null ?>">
                        <p>
                            Lifetime
                        </p>
                        <svg width="16" class="no-svg" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="8" cy="8" r="7.5" fill="#FEFEFE" stroke="#E3E3E3" />
                        </svg>
                        <svg width="16" height="16" class="yes-svg" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="8" cy="8" r="5.5" fill="#FEFEFE" stroke="#031897" stroke-width="5" />
                        </svg>

                        <input type="hidden" placeholder="Enabled" data-id="en" value="3153600000">

                    </div>
                </div>


            </div>




        </div>
        <div class="other-settings-container referrx">
            <input type="hidden" name="vip_reward" value="0" id="vip_reward">
            <div class="form-box-other form-box">


                <label for="">Reward referrer?</label>

                <div class="input-other-scroll">
                    <div class="input-other <?php echo $website_data['others']['vip_reward'] == '0'? 'active':null ?>">
                        <p>0%</p>
                        <svg width="16" height="16" class="yes-svg" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="8" cy="8" r="5.5" fill="#FEFEFE" stroke="#031897" stroke-width="5" />
                        </svg>
                        <svg width="16" class="no-svg" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="8" cy="8" r="7.5" fill="#FEFEFE" stroke="#E3E3E3" />
                        </svg>

                        <input type="hidden" placeholder="Enabled" data-id="en" value="0">
                    </div>


                    <div class="input-other <?php echo $website_data['others']['vip_reward'] == '5'? 'active':null ?>">
                        <p>5%</p>
                        <svg width="16" height="16" class="yes-svg" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="8" cy="8" r="5.5" fill="#FEFEFE" stroke="#031897" stroke-width="5" />
                        </svg>
                        <svg width="16" class="no-svg" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="8" cy="8" r="7.5" fill="#FEFEFE" stroke="#E3E3E3" />
                        </svg>

                        <input type="hidden" placeholder="Enabled" data-id="en" value="5">
                    </div>

                    <div class="input-other <?php echo $website_data['others']['vip_reward'] == '10'? 'active':null ?>">
                        <p>
                            10%
                        </p>
                        <svg width="16" class="no-svg" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="8" cy="8" r="7.5" fill="#FEFEFE" stroke="#E3E3E3" />
                        </svg>
                        <svg width="16" height="16" class="yes-svg" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="8" cy="8" r="5.5" fill="#FEFEFE" stroke="#031897" stroke-width="5" />
                        </svg>

                        <input type="hidden" placeholder="Enabled" data-id="en" value="10">

                    </div>

                    <div class="input-other <?php echo $website_data['others']['vip_reward'] == '20'? 'active':null ?>">
                        <p>
                            20%
                        </p>
                        <svg width="16" class="no-svg" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="8" cy="8" r="7.5" fill="#FEFEFE" stroke="#E3E3E3" />
                        </svg>
                        <svg width="16" height="16" class="yes-svg" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="8" cy="8" r="5.5" fill="#FEFEFE" stroke="#031897" stroke-width="5" />
                        </svg>

                        <input type="hidden" placeholder="Enabled" data-id="en" value="20">

                    </div>

                    <div class="input-other <?php echo $website_data['others']['vip_reward'] == '50'? 'active':null ?>">
                        <p>
                            50%
                        </p>
                        <svg width="16" class="no-svg" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="8" cy="8" r="7.5" fill="#FEFEFE" stroke="#E3E3E3" />
                        </svg>
                        <svg width="16" height="16" class="yes-svg" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="8" cy="8" r="5.5" fill="#FEFEFE" stroke="#031897" stroke-width="5" />
                        </svg>

                        <input type="hidden" placeholder="Enabled" data-id="en" value="50">

                    </div>

                    <div class="input-other <?php echo $website_data['others']['vip_reward'] == '75'? 'active':null ?>">
                        <p>
                            75%
                        </p>
                        <svg width="16" class="no-svg" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="8" cy="8" r="7.5" fill="#FEFEFE" stroke="#E3E3E3" />
                        </svg>
                        <svg width="16" height="16" class="yes-svg" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="8" cy="8" r="5.5" fill="#FEFEFE" stroke="#031897" stroke-width="5" />
                        </svg>

                        <input type="hidden" placeholder="Enabled" data-id="en" value="75">

                    </div>
                </div>


            </div>




        </div>

       
        <div class="other-settings-container referrx">
            <input type="hidden" name="vip_reward_time" value="onetime" id="vip_reward_time">
            <div class="form-box-other form-box">


                <label for="">>Referral reward interval</label>

                <div class="input-other-con">
                    <div class="input-other <?php echo $website_data['others']['vip_reward_time'] == 'onetime'? 'active':null ?>">
                        <p>One Time</p>
                        <svg width="16" height="16" class="yes-svg" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="8" cy="8" r="5.5" fill="#FEFEFE" stroke="#031897" stroke-width="5" />
                        </svg>
                        <svg width="16" class="no-svg" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="8" cy="8" r="7.5" fill="#FEFEFE" stroke="#E3E3E3" />
                        </svg>

                        <input type="hidden" placeholder="Enabled" data-id="en" value="onetime">
                    </div>





                    <div class="input-other <?php echo $website_data['others']['vip_reward_time'] == 'recurring'? 'active':null ?>">
                        <p>
                            Recurring
                        </p>
                        <svg width="16" class="no-svg" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="8" cy="8" r="7.5" fill="#FEFEFE" stroke="#E3E3E3" />
                        </svg>
                        <svg width="16" height="16" class="yes-svg" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="8" cy="8" r="5.5" fill="#FEFEFE" stroke="#031897" stroke-width="5" />
                        </svg>

                        <input type="hidden" placeholder="Enabled" data-id="en" value="recurring">

                    </div>
                </div>


            </div>




        </div>





    </div>

    <div class="deposit" style="display: none;">

        <div class="alert alert-warning vip_payment" role="alert">
            Your users will be given a lifetime VIP membership once they deposit the required amount
        </div><br>
        <div class="form-box">
            <label for="">VIP amount</label>
            <div class="form-input input input-bordered   flex items-center gap-2">

                <input type="number" class="" id="data" value="<?php echo $website_data['others']['vip_amount']; ?>" name="vip_amount" placeholder="Enter Amount Here">
            </div>
        </div>
    </div>



    <!-- <div class="other-settings-container">
        <input type="text" name="airtimetocash" id="airtimetocash">
        <div class="form-box-other">


            <label for="">Airtime To Cash</label>

            <div class="input-other-scroll">

                <div class="input-other">
                    <p>Enabled</p>
                    <input type="hidden" placeholder="Enabled" data-id="en" value="0">
                </div>

                <div class="input-other">
                    <p>Enabled</p>
                    <input type="hidden" placeholder="Enabled" data-id="en" value="0">

                </div>
            </div>


        </div>




    </div> -->





</body>

<style>
    .o-con {
        display: flex;
        flex-direction: column;
        gap: 24px;
        padding: 12px;
        background: #F6F5F5;
        border-radius: 24px;
        margin-top: 19px;
    }

    .o-con h1 {
        padding-bottom: 12px;
        color: #A1A1A1;
        font-size: 24px;
        font-weight: 500;
        color: #151515;
        border-bottom: 1px solid #A1A1A1;
    }


    .from-box-other {
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        gap: 8px;
    }

    .input-other-con {
        display: flex;
        flex-direction: row;
        width: 100%;
        gap: 18px;

    }

    .input-other-scroll {
        display: flex;
        flex-direction: row;
        width: 100%;
        gap: 18px;
        padding: 10px 0;
        overflow-x: scroll;
    }

    .input-other-scroll .input-other {
        width: 170px;
        flex-shrink: 0;
    }

    .input-other {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 12px;
        height: 48px;
        border-radius: 12px;
        width: 100%;
        background: #ffff;
    }

    .input-other.active {
        border: 1px solid #031897;
    }

    .input-other .no-svg {
        display: block;
    }

    .input-other .yes-svg {
        display: none;
    }

    .input-other p,
    .input-other-scroll p {
        font-size: 16px;
        color: #151515;
        font-weight: 500;
    }


    .input-other.active .no-svg {
        display: none;
    }

    .input-other.active .yes-svg {
        display: block;
    }
</style>

<script src="../../js/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
<script src="../../js/main.js"></script>
<script src="../../swal.js" type="text/javascript"></script>

<script>
    $(document).on('click', '.input-other', function() {
        let val = $(this).find("input").val();
        $(this).parent().find('.active').removeClass('active');
        $(this).addClass('active');
        let inp = $(this).parent().parent().parent().find('> input').val(val);
        if (inp.attr('id') == "VIP") {
            $(".vip_form").html($("." + inp.val()).html());
            $('#VIP').change();

 
        }


    })
</script>

<script>
    <?php
    if (isset($swal)) {
    ?>
        Swal.fire({
            title: "<?php echo $swal[0]; ?>",
            html: "<?php echo $swal[1]; ?>",
            icon: "<?php echo $swal[2]; ?>"
        });
    <?php
        unset($swal);
    }
    ?>
</script>
<script>
    $(".vip_form").html($("." + $("#VIP").val()).html());
    $("#VIP").change(function() {
        $(".vip_form").html($("." + $(this).val()).html());
    });

    function ShowRef() {
        if ($("#referral").val() == "1") {
            $(".referrx").show();
        } else {
            $(".referrx").hide();
        }
    }
    ShowRef();
    $("#referral").change(function() {
        ShowRef();
    });

    function Automated() {
        if ($("#automated_payments").val() == "monnify") {
            $(".automatedx").html($("#monnify").html());
        } else {
            $(".automatedx").html($("#paga").html());
        }
    }
</script>
<script src="../jquery.js"></script>
<script>
    var faqs = document.querySelectorAll('.section-header svg');
    var sidebar = document.querySelector('.overlay');
    var closeBtn = document.querySelector('.close');
    var OpenBtn = document.querySelector('.header .menu');

    OpenBtn.addEventListener("click", () => {
        sidebar.style.left = '0%';

        closeBtn.addEventListener('click', () => {
            sidebar.style.left = '-100%'
        })
    })
    const parent = document.querySelector('.overlay');

    parent.addEventListener('click', function(event) {
        if (event.target === this) {
            sidebar.style.left = '-100%'
        }
    });

    const alertSVG = document.querySelector('.alert-container svg.dismiss');
    const alertc = document.querySelector('.alert-container');

    alertSVG.addEventListener('click', function(event) {

        alertc.style.display = 'none';

    });

    faqs.forEach((faq) => {

        faq.addEventListener('click', function() {
            var par = faq.parentElement.parentElement;
            var content = par.querySelector('.section-items');
            if (content.style.display == 'none') {
                content.style.display = 'flex';
                faq.parentElement.style.borderBottom = '0.5px solid #A1A1A1'
                faq.parentElement.style.paddingBottom = '16px';
                faq.style.transform = 'rotate(0deg)';


            } else {
                content.style.display = 'none';
                faq.parentElement.style.border = 'none';
                faq.parentElement.style.paddingBottom = '0';
                faq.style.transform = 'rotate(180deg)';
            }
        })

    })
</script>

</html>