<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf-token" content="lIAk4ww1QWgOS0yljrq1gV3inD6SKPuz9vwN5xgG" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Guía de Chiapas con toda la información necesaria para viajar a Chiapas, reserva hoteles, tours en chiapas, renta de autos y todo para disfrutar de Chiapas." />
    <meta name="author" content="Mundo Chiapas" />
    <title>Selecciona la forma de pago | Mundo Chiapas</title>
    <link rel="shortcut icon" href="https://tours.mundochiapas.com/assets/tours2022/images/icon/favicon.png">
    <link rel="preconnect" crossorigin href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link crossorigin href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet" />
    <!-- bootstrap -->
    <!-- <link href="https://tours.mundochiapas.com/assets/tours2022/css/bootstrap.css" rel="stylesheet" type="text/css" media="screen" /> -->
    <link href="https://tours.mundochiapas.com/assets/tours2022/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="screen" />
    <!-- validatejs -->
    <link rel="stylesheet" href="https://tours.mundochiapas.com/assets/tours2022/validatejs/screen.css">

    <!--fontawesom-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .form-select {
            background-position: right.75rem center;
        }

        .form-check {
            width: 100%;
        }
    </style>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    <!--Form validationEngine Style-->
    <link rel="stylesheet" href="https://tours.mundochiapas.com/assets/tours/css/validationEngine.jquery.css" type="text/css" media="screen" />
    <style>
        body {
            background-color: #f3f6f8;
            /*margin-top:20px;*/
        }

        .radio-form {
            float: none !important;
            margin-right: 0 !important;
        }

        .badge {
            font-size: 1em;
        }

        .container-custom {
            width: 100%;
            padding-left: var(--bs-gutter-x, .75rem);
            padding-right: var(--bs-gutter-x, .75rem);
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>

<body>
    <!--class="container"-->
    <!--style="box-sizing: border-box;"-->
    <div class="container-custom">
        <div class="row">
            <div class="col-sm-12">
                <div class="d-flex align-items-center p-3 my-3 rounded shadow-sm" style="background-color: #ffffff;">
                    <img class="me-3" src="https://tours.mundochiapas.com/assets/tours2022/images/logo.png" alt="Mundo Chiapas" height="50" />
                    <div class="lh-1">
                    </div>
                </div>
            </div>
        </div>
        <!--<h1 class="h3 mb-5">Selecciona la forma de pago que mas te convenga</h1>-->
        <div class="row">
            <div class="col-lg-4">
                <div class="card top-0 mb-3">
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><b>Nombre:</b> <?= $data->customer_name ?></li>
                            <li class="list-group-item"><b>Correo:</b> <?= $data->name ?></li>
                        </ul>
                    </div>
                </div>
                <div class="card top-0 mb-3">
                    <div class="card-footer text-muted">
                        <div id="total" class="d-flex justify-content-between mb-1 h4">
                            <strong>Monto:</strong>
                            <span align="right" width="75px" class="Grand_Total">$ <?= number_format($amount, 2) ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <form action="https://www.mundochiapas.com/tours-en-chiapas/saami/transport/process.php" name="form" id="valid_form" method="post">
                    <?php echo csrf_field(); ?>
                    <input type="text" hidden name="quotesId" id="quotesId" value="<?= base64_encode($quotesId)  ?>">
                    <input type="text" hidden value="<?= number_format($amount, 2, '.', '') ?>" name="PaymentTotal" id="PaymentTotal" />
                    <input type="hidden" value="cc" name="guestPaymentMethod" id="guestPaymentMethod" />

                    <div class="card top-0 mb-3">
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <div class="form-check">
                                        <input type="radio" name="PlanType" value="00" checked="true" class="form-check-input radio-form">
                                        <label class="form-check-label">
                                            Precio en un solo pago
                                        </label>
                                    </div>
                                    <span class="badge bg-success rounded-pill h1">$ <?= number_format($amount, 2) ?></span>
                                </li>
                            </ul>
                        </div>
                        <div class="card-footer">
                            Consulta las tarjetas participantes a meses sin intereses. <a href="#" class="m-l-10" data-bs-toggle="modal" data-bs-target="#modal-sin-intereses"><i class="far fa-question-circle"></i></a>
                        </div>
                    </div>

                    <div id="CCForm" class="card top-0 mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Datos Bancarios</h5>
                            <hr />
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Número de tarjeta:</label>
                                        <div class="input-group">
                                            <input type="text" name="CCNumber" id="CCNumber" class="form-control form-control-sm validate[required]" maxlength="16" />
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i id="CCNumberIcon" class="fas fa-credit-card"></i>
                                                </span>
                                                <input id="CCType" hidden name="CCType" type="text" required="" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-3">
                                        <label class="form-label">Credit Type:</label>
                                        <select class="form-select form-select-sm validate[required]" id="CCTypeCredit" name="CCTypeCredit">
                                            <option value="DB">Débito</option>
                                            <option value="CR">Crédito</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-3">
                                        <label class="form-label">Expiration Date:</label>
                                        <select class="form-select form-select-sm validate[required]" id="CCExpirationMonth" name="CCExpirationMonth">
                                            <option value="">Mes</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-3">
                                        <label class="form-label">Año:</label>
                                        <select class="form-select form-select-sm validate[required]" name="CCExpirationYear" id="CCExpirationYear">
                                            <option value="" selected=""></option>
                                            <option value='2023'> 2023</option>
                                            <option value='2024'> 2024</option>
                                            <option value='2025'> 2025</option>
                                            <option value='2026'> 2026</option>
                                            <option value='2027'> 2027</option>
                                            <option value='2028'> 2028</option>
                                            <option value='2029'> 2029</option>
                                            <option value='2030'> 2030</option>
                                            <option value='2031'> 2031</option>
                                            <option value='2032'> 2032</option>
                                            <option value='2033'> 2033</option>
                                            <option value='2034'> 2034</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-3">
                                        <label class="form-label">CVV:</label>
                                        <input type="text" value="" maxlength="4" name="CCSecurityCode" id="CCSecurityCode" class="form-control form-control-sm validate[required]" />
                                    </div>
                                </div>
                                <div class="col-md-4">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="CCForm" class="card top-0 mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Datos Personales</h5>
                            <hr />
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Nombre:</label>
                                        <input type="text" value="" name="CCFirstName" id="CCFirstName" class="form-control form-control-sm validate[required]" maxlength="60" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Apellido:</label>
                                        <input type="text" value="" name="CCLastName" id="CCLastName" class="form-control form-control-sm validate[required]" maxlength="60" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">País:</label>
                                        <select class="form-select form-select-sm validate[required]" name="CCCountry" id="CCCountry">
                                            <option value="AF">Afghanistan</option>
                                            <option value="AL">Albania</option>
                                            <option value="DZ">Algeria</option>
                                            <option value="AS">American Samoa</option>
                                            <option value="AD">Andorra</option>
                                            <option value="AO">Angola</option>
                                            <option value="AI">Anguilla</option>
                                            <option value="AQ">Antarctica</option>
                                            <option value="AG">Antigua and Barbuda</option>
                                            <option value="AR">Argentina</option>
                                            <option value="AM">Armenia</option>
                                            <option value="AW">Aruba</option>
                                            <option value="AU">Australia</option>
                                            <option value="AT">Austria</option>
                                            <option value="AZ">Azerbaijan</option>
                                            <option value="BH">Bahrain</option>
                                            <option value="BD">Bangladesh</option>
                                            <option value="BB">Barbados</option>
                                            <option value="BY">Belarus</option>
                                            <option value="BE">Belgium</option>
                                            <option value="BZ">Belize</option>
                                            <option value="BJ">Benin</option>
                                            <option value="BM">Bermuda</option>
                                            <option value="BT">Bhutan</option>
                                            <option value="BO">Bolivia</option>
                                            <option value="BA">Bosnia and Herzegovina</option>
                                            <option value="BW">Botswana</option>
                                            <option value="BV">Bouvet Island</option>
                                            <option value="BR">Brazil</option>
                                            <option value="IO">British Indian Ocean Territory</option>
                                            <option value="VG">British Virgin Islands</option>
                                            <option value="BN">Brunei</option>
                                            <option value="BG">Bulgaria</option>
                                            <option value="BF">Burkina Faso</option>
                                            <option value="BI">Burundi</option>
                                            <option value="CI">C?d&#039;Ivoire</option>
                                            <option value="KH">Cambodia</option>
                                            <option value="CM">Cameroon</option>
                                            <option value="CA">Canada</option>
                                            <option value="CV">Cape Verde</option>
                                            <option value="KY">Cayman Islands</option>
                                            <option value="CF">Central African Republic</option>
                                            <option value="TD">Chad</option>
                                            <option value="CL">Chile</option>
                                            <option value="CN">China</option>
                                            <option value="CX">Christmas Island</option>
                                            <option value="CC">Cocos (Keeling) Islands</option>
                                            <option value="CO">Colombia</option>
                                            <option value="KM">Comoros</option>
                                            <option value="CG">Congo</option>
                                            <option value="CK">Cook Islands</option>
                                            <option value="CR">Costa Rica</option>
                                            <option value="HR">Croatia</option>
                                            <option value="CU">Cuba</option>
                                            <option value="CY">Cyprus</option>
                                            <option value="CZ">Czech Republic</option>
                                            <option value="CD">Democratic Republic of the Congo</option>
                                            <option value="DK">Denmark</option>
                                            <option value="DJ">Djibouti</option>
                                            <option value="DM">Dominica</option>
                                            <option value="DO">Dominican Republic</option>
                                            <option value="TL">East Timor</option>
                                            <option value="EC">Ecuador</option>
                                            <option value="EG">Egypt</option>
                                            <option value="SV">El Salvador</option>
                                            <option value="GQ">Equatorial Guinea</option>
                                            <option value="ER">Eritrea</option>
                                            <option value="EE">Estonia</option>
                                            <option value="ET">Ethiopia</option>
                                            <option value="FO">Faeroe Islands</option>
                                            <option value="FK">Falkland Islands</option>
                                            <option value="FJ">Fiji</option>
                                            <option value="FI">Finland</option>
                                            <option value="MK">Macedonia</option>
                                            <option value="FR">France</option>
                                            <option value="GF">French Guiana</option>
                                            <option value="PF">French Polynesia</option>
                                            <option value="TF">French Southern Territories</option>
                                            <option value="GA">Gabon</option>
                                            <option value="GE">Georgia</option>
                                            <option value="DE">Germany</option>
                                            <option value="GH">Ghana</option>
                                            <option value="GI">Gibraltar</option>
                                            <option value="GR">Greece</option>
                                            <option value="GL">Greenland</option>
                                            <option value="GD">Grenada</option>
                                            <option value="GP">Guadeloupe</option>
                                            <option value="GU">Guam</option>
                                            <option value="GT">Guatemala</option>
                                            <option value="GN">Guinea</option>
                                            <option value="GW">Guinea-Bissau</option>
                                            <option value="GY">Guyana</option>
                                            <option value="HT">Haiti</option>
                                            <option value="HM">Heard Island and McDonald Islands</option>
                                            <option value="HN">Honduras</option>
                                            <option value="HK">Hong Kong</option>
                                            <option value="HU">Hungary</option>
                                            <option value="IS">Iceland</option>
                                            <option value="IN">India</option>
                                            <option value="ID">Indonesia</option>
                                            <option value="IR">Iran</option>
                                            <option value="IQ">Iraq</option>
                                            <option value="IE">Ireland</option>
                                            <option value="IL">Israel</option>
                                            <option value="IT">Italy</option>
                                            <option value="JM">Jamaica</option>
                                            <option value="JP">Japan</option>
                                            <option value="JO">Jordan</option>
                                            <option value="KZ">Kazakhstan</option>
                                            <option value="KE">Kenya</option>
                                            <option value="KI">Kiribati</option>
                                            <option value="KW">Kuwait</option>
                                            <option value="KG">Kyrgyzstan</option>
                                            <option value="LA">Laos</option>
                                            <option value="LV">Latvia</option>
                                            <option value="LB">Lebanon</option>
                                            <option value="LS">Lesotho</option>
                                            <option value="LR">Liberia</option>
                                            <option value="LY">Libya</option>
                                            <option value="LI">Liechtenstein</option>
                                            <option value="LT">Lithuania</option>
                                            <option value="LU">Luxembourg </option>
                                            <option value="MO">Macau</option>
                                            <option value="MG">Madagascar</option>
                                            <option value="MW">Malawi</option>
                                            <option value="MY">Malaysia</option>
                                            <option value="MV">Maldives</option>
                                            <option value="ML">Mali</option>
                                            <option value="MT">Malta</option>
                                            <option value="MH">Marshall Islands</option>
                                            <option value="MQ">Martinique</option>
                                            <option value="MR">Mauritania</option>
                                            <option value="MU">Mauritius</option>
                                            <option value="YT">Mayotte</option>
                                            <option selected value="MX">Mexico</option>
                                            <option value="FM">Micronesia</option>
                                            <option value="MD">Moldova</option>
                                            <option value="MC">Monaco</option>
                                            <option value="MN">Mongolia</option>
                                            <option value="MS">Montserrat</option>
                                            <option value="MA">Morocco</option>
                                            <option value="MZ">Mozambique</option>
                                            <option value="MM">Myanmar</option>
                                            <option value="NA">Namibia</option>
                                            <option value="NR">Nauru</option>
                                            <option value="NP">Nepal</option>
                                            <option value="NL">Netherlands</option>
                                            <option value="AN">Netherlands Antilles</option>
                                            <option value="NC">New Caledonia</option>
                                            <option value="NZ">New Zealand</option>
                                            <option value="NI">Nicaragua</option>
                                            <option value="NE">Niger</option>
                                            <option value="NG">Nigeria</option>
                                            <option value="NU">Niue</option>
                                            <option value="NF">Norfolk Island</option>
                                            <option value="KP">North Korea</option>
                                            <option value="MP">Northern Marianas</option>
                                            <option value="NO">Norway</option>
                                            <option value="OM">Oman</option>
                                            <option value="PK">Pakistan</option>
                                            <option value="PW">Palau</option>
                                            <option value="PA">Panama</option>
                                            <option value="PG">Papua New Guinea</option>
                                            <option value="PY">Paraguay</option>
                                            <option value="PE">Peru</option>
                                            <option value="PH">Philippines</option>
                                            <option value="PN">Pitcairn Islands</option>
                                            <option value="PL">Poland</option>
                                            <option value="PT">Portugal</option>
                                            <option value="PR">Puerto Rico</option>
                                            <option value="QA">Qatar</option>
                                            <option value="RE">R?ion</option>
                                            <option value="RO">Romania</option>
                                            <option value="RU">Russia</option>
                                            <option value="RW">Rwanda</option>
                                            <option value="ST">S?Tom?nd Pr?ipe</option>
                                            <option value="SH">Saint Helena</option>
                                            <option value="KN">Saint Kitts and Nevis</option>
                                            <option value="LC">Saint Lucia</option>
                                            <option value="PM">Saint Pierre and Miquelon</option>
                                            <option value="VC">Saint Vincent and the Grenadines</option>
                                            <option value="WS">Samoa</option>
                                            <option value="SM">San Marino</option>
                                            <option value="SA">Saudi Arabia</option>
                                            <option value="SN">Senegal</option>
                                            <option value="SC">Seychelles</option>
                                            <option value="SL">Sierra Leone</option>
                                            <option value="SG">Singapore</option>
                                            <option value="SK">Slovakia</option>
                                            <option value="SI">Slovenia</option>
                                            <option value="SB">Solomon Islands</option>
                                            <option value="SO">Somalia</option>
                                            <option value="ZA">South Africa</option>
                                            <option value="GS">South Georgia &amp; South Sandwich Islands</option>
                                            <option value="KR">South Korea</option>
                                            <option value="ES">Spain</option>
                                            <option value="LK">Sri Lanka</option>
                                            <option value="SD">Sudan</option>
                                            <option value="SR">Suriname</option>
                                            <option value="SJ">Svalbard and Jan Mayen</option>
                                            <option value="SZ">Swaziland</option>
                                            <option value="SE">Sweden</option>
                                            <option value="CH">Switzerland</option>
                                            <option value="SY">Syria</option>
                                            <option value="TW">Taiwan</option>
                                            <option value="TJ">Tajikistan</option>
                                            <option value="TZ">Tanzania</option>
                                            <option value="TH">Thailand</option>
                                            <option value="BS">The Bahamas</option>
                                            <option value="GM">The Gambia</option>
                                            <option value="TG">Togo</option>
                                            <option value="TK">Tokelau</option>
                                            <option value="TO">Tonga</option>
                                            <option value="TT">Trinidad and Tobago</option>
                                            <option value="TN">Tunisia</option>
                                            <option value="TR">Turkey</option>
                                            <option value="TM">Turkmenistan</option>
                                            <option value="TC">Turks and Caicos Islands</option>
                                            <option value="TV">Tuvalu</option>
                                            <option value="VI">US Virgin Islands</option>
                                            <option value="UG">Uganda</option>
                                            <option value="UA">Ukraine</option>
                                            <option value="AE">United Arab Emirates</option>
                                            <option value="GB">United Kingdom</option>
                                            <option value="US">United States</option>
                                            <option value="UM">United States Minor Outlying Islands</option>
                                            <option value="UY">Uruguay</option>
                                            <option value="UZ">Uzbekistan</option>
                                            <option value="VU">Vanuatu</option>
                                            <option value="VA">Vatican City</option>
                                            <option value="VE">Venezuela</option>
                                            <option value="VN">Vietnam</option>
                                            <option value="WF">Wallis and Futuna</option>
                                            <option value="EH">Western Sahara</option>
                                            <option value="YE">Yemen</option>
                                            <option value="YU">Yugoslavia</option>
                                            <option value="ZM">Zambia</option>
                                            <option value="ZW">Zimbabwe</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Estado:</label>
                                        <select class="form-select form-select-sm validate[required]" name="CCState" id="CCState">
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Código Postal:</label>
                                        <input type="text" name="CCPostalCode" id="CCPostalCode" value="" class="form-control form-control-sm validate[required]" maxlength="5" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Ciudad:</label>
                                        <input type="text" value="" name="CCCity" id="CCCity" class="form-control form-control-sm validate[required]" maxlength="50" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Dirección:</label>
                                        <input type="text" value="" name="CCStreet" id="CCStreet" class="form-control form-control-sm validate[required]" maxlength="60" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Correo:</label>
                                        <input type="email" value="" name="CCEmail" id="CCEmail" class="form-control form-control-sm validate[required]" maxlength="255" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Número de Celular:</label>
                                        <input type="text" value="" name="CCPhone" id="CCPhone" class="form-control form-control-sm validate[required]" maxlength="10" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card top-0 mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Política de Cancelación: *</h5>
                            <hr />
                            <div class="mb-3">
                                <div class="form-check">
                                    <input type="checkbox" id="agree" name="agree" value="1" class="form-check-input radio-form validate[required]">
                                    <label class="form-check-label" for="agree">
                                        Acepto la siguiente política de cancelación. ¡No se permiten cancelaciones!
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="rpw text-center">
                        <div class="col-md12">
                            <input type="hidden" name="step2" value="completed" />
                            <input type="submit" class="footer-btn btn btn-success" id="first_btn" value="Click to confirm the reservation" name="action" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-sin-intereses" tabindex="-1" aria-labelledby="modal-sin-interesesLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-sin-interesesLabel">Tarjetas participantes a meses sin intereses.</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="https://tours.mundochiapas.com/assets/tours2022/images/meses-sin-intereses.jpg" class="img-fluid rounded" alt="meses-sin-intereses" />
                </div>
            </div>
        </div>
    </div>
    <!--jquery-->
    <!--<script src="https://tours.mundochiapas.com/assets/tours2022/js/jquery.min.js"></script>-->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <!-- bootstrap -->
    <script src="https://tours.mundochiapas.com/assets/tours2022/js/bootstrap.js"></script>
    <!-- validatejs -->
    <script src="https://tours.mundochiapas.com/assets/tours2022/validatejs/jquery.validate.js"></script>
    <!--datetimepicker-->
    <script src="https://tours.mundochiapas.com/assets/tours2022/datetimepicker/build/jquery.datetimepicker.full.min.js"></script>
    <!--popper-->
    <script src="https://tours.mundochiapas.com/assets/tours2022/popper/dist/umd/popper.min.js"></script>
    <script>
        const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': CSRF_TOKEN
            }
        });
    </script>
    <!--Form validationEngine-->
    <script src="https://tours.mundochiapas.com/assets/tours/js/form_valid_jquery.js" type="text/javascript"></script>
    <script src="https://tours.mundochiapas.com/assets/tours/js/jquery.validationEngine-es.js" type="text/javascript"></script>
    <script src="https://tours.mundochiapas.com/assets/tours/js/jquery.validationEngine.js" type="text/javascript"></script>
    <script>
        /*--------------------------------Form validation------------------------------------*/
        $(document).ready(function() {
            $('#valid_form').validationEngine();
        });
    </script>
    <script type="text/javascript">
        (function($) {
            $(document).ready(function() {
                $('input[name=PlanType]').click(function() {

                    if ($(this).val() == 'Electronic transfer' || $(this).val() == 'oxxo') {
                        $('#CCForm').fadeOut(0);
                        $('#guestPaymentMethod').val('tt');
                        //$('select,input:text', 'form').attr('class', '');
                        $('select,input:text', 'form').removeClass('validate[required]');
                    } else {

                        $('#CCForm').fadeIn(0);
                        $('#guestPaymentMethod').val('cc');
                        //$('select,input:text', 'form').attr('class', 'validate[required]');
                        $('select,input:text', 'form').addClass('validate[required]');
                    }
                });
                // load State
                loadState('Mexico');
            });


        })(jQuery);

        $('#CCCountry').change(function() {
            loadState($('#CCCountry option:selected').text());
        });

        $('#CCNumber').change(function() {
            $.ajax({
                type: 'GET',
                url: '/check_cc/' + $('#CCNumber').val(),
                datatype: 'json',
                cache: false,
                contentType: false,
                processData: false,
                success: function(data) {
                    $('#CCType').val('');
                    console.log(data)
                    if (data.result) {
                        $('#CCNumberIcon').removeClass('fas fa-credit-card');
                        $('#CCNumberIcon').removeClass('fas fa-times');
                        $('#CCNumberIcon').removeClass('fab fa-cc-mastercard');
                        $('#CCNumberIcon').removeClass('fab fa-cc-visa');
                        //alert(data.result);
                        $('#CCType').val(data.result);
                        if (data.result === 'MC') {
                            $('#CCNumberIcon').addClass('fab fa-cc-mastercard');
                        } else {
                            $('#CCNumberIcon').addClass('fab fa-cc-visa');
                        }
                    } else {
                        $('#CCNumberIcon').removeClass('fab fa-cc-mastercard');
                        $('#CCNumberIcon').removeClass('fab fa-cc-visa');
                        $('#CCNumberIcon').removeClass('fas fa-credit-card');
                        $('#CCNumberIcon').addClass('fas fa-times');
                        alert('EL NUMERO DE TARJETA INGRESADA NO ES VALIDA');
                    }
                }
            });
        });

        function loadState(country_name) {
            $('#CCState').html('');
            var html = '<option value="">--- Select ---</option>';
            $.ajax({
                type: 'GET',
                url: 'https://www.universal-tutorial.com/api/getaccesstoken',
                beforeSend: function(xhr) {
                    xhr.setRequestHeader('Accept', 'application/json');
                    xhr.setRequestHeader('api-token', 'UMstePhvoJqjxXhSi6sCt8E0A4AFVl-a79d_N0G9tOnGrqb023jWvW9EXjgxzatFoUU');
                    xhr.setRequestHeader('user-email', 'ismael@mundochiapas.com');
                },
                success: function(data) {
                    $.ajax({
                        type: 'GET',
                        url: 'https://www.universal-tutorial.com/api/states/' + country_name,
                        beforeSend: function(xhr) {
                            xhr.setRequestHeader('Authorization', 'Bearer ' + data.auth_token);
                            xhr.setRequestHeader('Accept', 'application/json');
                        },
                        success: function(data2) {
                            for (i = 0; i < data2.length; i++) {
                                html += '<option value="' + data2[i].state_name + '">' + data2[i].state_name + '</option>';
                            }
                            $('#CCState').html(html);
                        }
                    });
                }
            });
        }
    </script>
</body>

</html><?php /**PATH D:\Projects\wwwroot\Admin\resources\views/customers/payment_form.blade.php ENDPATH**/ ?>