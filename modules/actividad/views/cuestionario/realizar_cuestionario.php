<?php

use yii\bootstrap\Html;
?>
<div class="text-center" style="margin-bottom: 20px">
    <h1>Realizando Cuestionario #1 </h1>
</div>
<div id="wizard" role="application" class="wizard clearfix vertical">
    <div class="steps clearfix">
        <ul role="tablist">
            <li role="tab" class="first current" aria-disabled="false" aria-selected="true"><a id="wizard-t-0" href="#wizard-h-0" aria-controls="wizard-p-0"><span class="current-info audible">current step: </span><span class="number">1</span></a></li>
            <li role="tab" class="disabled" aria-disabled="true"><a id="wizard-t-1" href="#wizard-h-1" aria-controls="wizard-p-1"><span class="number">2</span></a></li>
            <li role="tab" class="disabled last" aria-disabled="true"><a id="wizard-t-2" href="#wizard-h-2" aria-controls="wizard-p-2"><span class="number">3</span></a></li>
        </ul>
    </div>
    <div class="content clearfix">
        <h3 id="wizard-h-0" tabindex="-1" class="title current">Step 1 Title</h3>
        <section id="wizard-p-0" role="tabpanel" aria-labelledby="wizard-h-0" class="body current" aria-hidden="false">
            <h5 class="bd-wizard-step-title">Pregunta #1</h5>
            <h2 class="section-heading">Identificar la figura </h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.</p>
            <div class="row">
                <div class="col-md-6">
                    <img src="/images/angulo_recto.png" style='height: 100%; width: 100%; object-fit: contain'/> 
                </div>
                <div class="col-md-6 vcenter">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>
                                    Opción  
                                </th>
                                <th>
                                    Descripción
                                </th>
                                <th>
                                    Elección
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    1
                                </td>
                                <td>
                                    Agudo
                                </td>
                                <td>
                                    <?= Html::radio('seleccionar'); ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    2
                                </td>
                                <td>
                                    Recto
                                </td>
                                <td>
                                    <?= Html::radio('seleccionar'); ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    3
                                </td>
                                <td>
                                    Obtuso
                                </td>
                                <td>
                                    <?= Html::radio('seleccionar'); ?>
                                </td>
                            </tr>                
                        </tbody>
                    </table>
                </div>             
            </div>
        </section>
        <h3 id="wizard-h-1" tabindex="-1" class="title">Step 2 Title</h3>
        <section id="wizard-p-1" role="tabpanel" aria-labelledby="wizard-h-1" class="body" style="display: none;" aria-hidden="true">
            <h5 class="bd-wizard-step-title">Step 2</h5>
            <h2 class="section-heading">Enter your Account Details</h2>
            <div class="form-group">
                <label for="firstName" class="sr-only">First Name</label>
                <input type="text" name="firstName" id="firstName" class="form-control" placeholder="First Name">
            </div>
            <div class="form-group">
                <label for="lastName" class="sr-only">Last Name</label>
                <input type="text" name="lastName" id="lastName" class="form-control" placeholder="Last Name">
            </div>
            <div class="form-group">
                <label for="phoneNumber" class="sr-only">Phone Number</label>
                <input type="text" name="phoneNumber" id="phoneNumber" class="form-control" placeholder="Phone Number">
            </div>
            <div class="form-group">
                <label for="emailAddress" class="sr-only">Email Address</label>
                <input type="email" name="emailAddress" id="emailAddress" class="form-control" placeholder="Email Address">
            </div>
        </section>
        <h3 id="wizard-h-2" tabindex="-1" class="title">Step 3 Title</h3>
        <section id="wizard-p-2" role="tabpanel" aria-labelledby="wizard-h-2" class="body" style="display: none;" aria-hidden="true">
            <h5 class="bd-wizard-step-title">Step 3</h5>
            <h2 class="section-heading mb-5">Review your Details and Submit</h2>
            <h6 class="font-weight-bold">Select business type</h6>
            <p class="mb-4" id="business-type">Branding</p>
            <h6 class="font-weight-bold">Enter your Account Details</h6>
            <p class="mb-4"><span id="enteredFirstName">Cha</span> <span id="enteredLastName">Ji-Hun C</span> <br>
                Phone: <span id="enteredPhoneNumber">+230-582-6609</span> <br>
                Email: <span id="enteredEmailAddress">willms_abby@gmail.com</span>
            </p>
        </section>
    </div>
    <div class="actions clearfix">
        <ul role="menu" aria-label="Pagination">
            <li class="disabled" aria-disabled="true"><a href="#previous" role="menuitem">Previous</a></li>
            <li aria-hidden="false" aria-disabled="false"><a href="#next" role="menuitem">Siguiente</a></li>
            <li style="display: none;" aria-hidden="true"><a href="#finish" role="menuitem">Finish</a></li>
        </ul>
    </div>
</div>

