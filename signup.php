<?php include 'header.php' ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Sign Up</title>
    </head>
    <body>
        <section class="banner-area other-page">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>Sign Up</h1>
                        <a href="index.php">Home</a> <span>|</span> <a>Sign Up</a>
                    </div>
                </div>
            </div>
        </section>

        <br/><br/>
        <section class="contact-form section-padding3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-1 mb-5 mb-lg-0"></div>
                    <div class="col-lg-11">
                        <nav>
                          <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-patient-tab" data-toggle="tab" href="#nav-patient" role="tab" aria-controls="nav-patient" aria-selected="true">Patient</a>
                            <a class="nav-item nav-link" id="nav-doctor-tab" data-toggle="tab" href="#nav-doctor" role="tab" aria-controls="nav-doctor" aria-selected="false">Doctor</a>
                            <a class="nav-item nav-link" id="nav-medicalshop-tab" data-toggle="tab" href="#nav-medicalshop" role="tab" aria-controls="nav-medicalshop" aria-selected="false">Medical Shop</a>
                            <a class="nav-item nav-link" id="nav-laboratory-tab" data-toggle="tab" href="#nav-laboratory" role="tab" aria-controls="nav-laboratory" aria-selected="false">Laboratory</a>
                          </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                          <div class="tab-pane fade show active" id="nav-patient" role="tabpanel" aria-labelledby="nav-patient-tab">
                              <br/>
                              <form action="signup_controller.php" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="form-group col-lg-4">
                                        <input type="hidden" name="category" value = "1">
                                        <input type="text" name="patient_fname" placeholder="First Name" class="form-control" title="First Name contains only alphabets." required />    
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <input type="text" name="patient_mname" placeholder="Middle Name" class="form-control"  title="Middle Name contains only alphabets." required />    
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <input type="text" name="patient_lname" placeholder="Last Name" class="form-control"  title="Last Name contains only alphabets." required />    
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <input type="text" name="patient_username" placeholder="Username" class="form-control" title="Username contains only alphabets. The size should be 6 to 15 characters." required />    
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <input type="password" name="patient_password" placeholder="Password" class="form-control" pattern="^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$" title="Minimum eight characters, at least one letter, one number and one special character. And size in between 8 to 15 characters." required />    
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <input type="email" name="patient_email" placeholder="Email Address" class="form-control" title="Email must be start with alphabets or digits and must have @ and dot symbols." required />    
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <input type="text" name="patient_phoneno" required placeholder="Phone Number" class="form-control" pattern="^[9|8|7|6][0-9]{9,12}" title="Phone Number must be start with 9 or 8 or 7 or 6 and size in between 10 to 13 digits." />    
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <textarea name="patient_address" rows="5" placeholder="Home Address" class="form-control" required></textarea>    
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h3>Date of Birth</h3>
                                            </div>
                                            <div class="col-lg-6">
                                                <input type="date" name="patient_dateofbirth" required placeholder="Date of Birth" title="Date Of Birth" class="form-control" />
                                            </div>
                                        </div>    
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <select name="patient_bloodgroup" class="form-control mb-30" required>
                                            <option value="">Select Blood Group</option>
                                            <option value="A+">A+</option>
                                            <option value="A-">A-</option>
                                            <option value="B+">B+</option>
                                            <option value="B-">B-</option>
                                            <option value="O+">O+</option>
                                            <option value="O-">O-</option>
                                            <option value="AB+">AB+</option>
                                            <option value="AB-">AB-</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-2">
                                        <h3>Gender : </h3>
                                    </div>
                                    <div class="form-group col-lg-2">
                                        <label>    
                                            <input type="radio" required name="patient_gender" value="Male"/> Male
                                        </label>
                                    </div>
                                    <div class="form-group col-lg-2">
                                        <label>
                                            <input type="radio" required name="patient_gender" value="Female"/> Female
                                        </label>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <input type="file" required name="patient_profile_image" class="form-control">
                                    </div>
                                </div>
                                <input type="submit" name="Sign Up" value="Sign Up" class="btn btn-primary col-lg-4">
                            </form>
                          </div>
                          
                          <div class="tab-pane fade" id="nav-doctor" role="tabpanel" aria-labelledby="nav-doctor-tab">
                              <br/>
                              <form action="signup_controller.php" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="form-group col-lg-12">
                                        <input type="hidden" name="category" value = "2">
                                        <input type="text" name="doctor_name" placeholder="Full Name" class="form-control" title="Name contains must be alphabets" required />    
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <input type="text" name="username" placeholder="Username" class="form-control" title="Username contains only alphabets. The size in between 6 to 15 characters." required />    
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <input type="password" name="password" placeholder="Password" class="form-control" pattern="^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$" title="Minimum eight characters, at least one letter, one number and one special character. And size in between 8 to 15 characters." required />    
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <input type="text" name="doctor_email" placeholder="Email Address" class="form-control"  title="Email must be start with alphabets and digits and must contains @ and dots." required />    
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <input type="text" name="doctor_phoneno" placeholder="Phone Number" class="form-control" pattern="^[9|8|7|6][0-9]{9,12}" title="Phone number must be start with 9 or 8 or 7 or 6 and size in between 10 to 13 digits." required />    
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <textarea name="doctor_address" rows="5" placeholder="Home Address" class="form-control" required></textarea>    
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <textarea name="doctor_information" rows="5" placeholder="Write about your degree and experience..." class="form-control" required></textarea>    
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <textarea name="specialization" rows="5" placeholder="Write about your specialization..." class="form-control" required></textarea>    
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <textarea name="education" rows="5" placeholder="Write about your education..." class="form-control" required></textarea>    
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <input type="file" name="doctor_profile_image" class="form-control" required/>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <div class="row">
                                            <div class="col-lg-6"><h3>Treatment Time : </h3></div>
                                            <div class="col-lg-6">
                                                <input type="text" placeholder="In minutes" name="treatment_time" class="form-control" required pattern="^[\d]+$" title="Must be digits" />
                                            </div>    
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <div class="row">
                                            <div class="col-lg-6"><h3>Opening Time : </h3></div>
                                            <div class="col-lg-6">
                                                <input type="time" name="opening_time" class="form-control" required/>
                                            </div>    
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <div class="row">
                                            <div class="col-lg-6"><h3>Closing Time : </h3></div>
                                            <div class="col-lg-6">
                                                <input type="time" name="closing_time" class="form-control" required/>
                                            </div>    
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <h3>Break Time : </h3>
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <input type="time" name="break_start_time" class="form-control" required />
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <input type="time" name="break_end_time" class="form-control" required />
                                    </div>
                                    

                                </div>
                                <input type="submit" class="btn btn-primary col-lg-4" name="Sign Up" value="Sign Up" />
                            </form>
                          </div>
                          
                          <div class="tab-pane fade" id="nav-medicalshop" role="tabpanel" aria-labelledby="nav-medicalshop-tab">
                              <br/>
                              <form action="signup_controller.php" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="form-group col-lg-12">
                                        <input type="hidden" name="category" value = "3">
                                        <input type="text" name="medical_shop_name" placeholder="Medical Shop Name" class="form-control" required title="Medical Shop name should contains only alphabets, ., _, -, and spaces." />    
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <input type="text" name="username" placeholder="Username" class="form-control" required title="Username must be alphabets and, size in between 5 to 15 characters." />    
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <input type="password" name="password" placeholder="Password" class="form-control" required pattern="^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$" title="Minimum eight characters, at least one letter, one number and one special character. And size in between 8 to 15 characters." />    
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <input type="text" name="medical_shop_email" placeholder="Email Address" class="form-control"  title="Email must be start with alphabets and digits and must contains @ and dots." required/>    
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <input type="text" name="medical_shop_phoneno" placeholder="Phone Number" class="form-control" pattern="^[9|8|7|6][0-9]{9,12}" title="Phone number must be start with 9 or 8 or 7 or 6 and size in between 10 to 13 digits." required />    
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <textarea name="medical_shop_address" rows="5" placeholder="Medical Shop Address" class="form-control" required ></textarea>    
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <input type="file" title="Profile Image" name="medical_shop_profile_image" class="form-control" required>
                                    </div>
                                    <div class="form-group col-lg-3">
                                        <input type="time" title="Starting Time" name="medical_shop_time_schedule_start" class="form-control" required>
                                    </div>
                                    <div class="form-group col-lg-3">
                                        <input type="time" title="Ending Time" name="medical_shop_time_schedule_end" class="form-control" required>
                                    </div>
                                </div>
                                <input name="signup" value="Sign Up" type="submit" class="btn btn-primary col-lg-4">
                            </form>
                          </div>
                          
                          <div class="tab-pane fade" id="nav-laboratory" role="tabpanel" aria-labelledby="nav-laboratory-tab">
                              <br/>
                              <form action="signup_controller.php" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="form-group col-lg-12">
                                        <input type="hidden" name="category" value = "4">
                                        <input type="text" name="laboratory_name" placeholder="Full Name" class="form-control" required title="Laboratory Name must have alphabets, ., -, _ and spaces." />    
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <input type="text" name="username" placeholder="Username" class="form-control" required title="Username contains only alphabets. The size in between 6 to 15 characters." />    
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <input type="password" name="password" placeholder="Password" class="form-control" required  pattern="^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$" title="Minimum eight characters, at least one letter, one number and one special character. And size in between 8 to 15 characters."/>    
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <input type="text" name="laboratory_email" placeholder="Email Address" required class="form-control"  title="Email must be start with alphabets and digits and must contains @ and dots." />    
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <input type="text" name="laboratory_phoneno" placeholder="Phone Number" class="form-control" required  pattern="^[9|8|7|6][0-9]{9,12}" title="Phone number must be start with 9 or 8 or 7 or 6 and size in between 10 to 13 digits."/>    
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <textarea name="laboratory_address" rows="5" placeholder="Home Address" class="form-control" required></textarea>    
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <input type="file" title="Profile Image" name="laboratory_profile_image" class="form-control" required>
                                    </div>
                                    <div class="form-group col-lg-3">
                                        <input type="time" title="Starting Time" name="laboratory_time_schedule_start" class="form-control" required>
                                    </div>
                                    <div class="form-group col-lg-3">
                                        <input type="time" title="Ending Time" name="laboratory_time_schedule_end" class="form-control" required>
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-primary col-lg-4" value="Sign Up" />
                            </form>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php include 'footer.php'; ?>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    </body>
</html>