<?php include('admin-navbar.php'); ?>

    <!-- Hero Section Begin -->
    <section class="hero-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="hero-text">
                        <h1>JAEPCE Hotel</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut</p>
                        <a href="#" class="primary-btn">Discover Now</a>
                    </div>
                </div>
              <!--   <div class="col-xl-4 col-lg-5 offset-xl-2 offset-lg-1">
                    <div class="booking-form">
                        <h3>Booking Your Hotel</h3>
                        <form action="#">
                            <div class="check-date">
                                <label for="date-in">Check In:</label>
                                <input type="text" class="date-input" id="date-in">
                                <i class="icon_calendar"></i>
                            </div>
                            <div class="check-date">
                                <label for="date-out">Check Out:</label>
                                <input type="text" class="date-input" id="date-out">
                                <i class="icon_calendar"></i>
                            </div>
                            <div class="select-option">
                                <label for="guest">Guests:</label>
                                <select id="guest">
                                    <option value="">2 Adults</option>
                                    <option value="">3 Adults</option>
                                </select>
                            </div>
                            <div class="select-option">
                                <label for="room">Room:</label>
                                <select id="room">
                                    <option value="">1 Room</option>
                                    <option value="">2 Room</option>
                                </select>
                            </div>
                            <button type="submit">Check Availability</button>
                        </form>
                    </div>
                </div> -->

            </div>
        </div>
        <div class="hero-slider owl-carousel">
            <div class="hs-item set-bg" data-setbg="img/hero/hero-1.jpg"></div>
            <div class="hs-item set-bg" data-setbg="img/hero/hero-2.jpg"></div>
            <div class="hs-item set-bg" data-setbg="img/hero/hero-3.jpg"></div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- About Us Section Begin -->
    <section class="aboutus-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-text">
                        <div class="section-title">
                            <h2>About Us</h2>
                        </div>
                        <p class="f-para text-left">Sona.com is a leading online accommodation site. We’re passionate about
                            travel. Every day, we inspire and reach millions of travelers across 90 local websites in 41
                            languages.</p>
                        <p class="s-para text-left">So when it comes to booking the perfect hotel, vacation rental, resort,
                            apartment, guest house, or tree house, we’ve got you covered.</p>
                        <a href="#" class="primary-btn about-btn">Read More</a>

                    
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-pic">
                        <div class="row">
                            <div class="col-sm-6">
                                <img src="img/about/about-1.jpg" alt="">
                            </div>
                            <div class="col-sm-6">
                                <img src="img/about/about-2.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Us Section End -->

   <section class="services-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Why Book With Us?</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-sm-6">
                    <div class="service-item">
                        <i class="flaticon-036-parking"></i>
                        <h4>Travel Plan</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="service-item">
                        <i class="flaticon-033-dinner"></i>
                        <h4>Catering Service</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="service-item">
                        <i class="flaticon-026-bed"></i>
                        <h4>Babysitting</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <hr class="py-3"> 

    <section class="aboutus-page-section spad">
        <div class="container">
            <div class="about-page-text">
                <div class="row">
                 <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Special Offers</h2>
                    </div>
                </div>
                </div>
            </div>
            <div class="about-page-services">
                <div class="row">
                    <div class="col-md-4">
                        <div class="ap-service-item set-bg" data-setbg="img/about/about-p1.jpg" style="background-image: url(&quot;img/about/about-p1.jpg&quot;);">
                            <div class="api-text">
                                <h3>Restaurants Services</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="ap-service-item set-bg" data-setbg="img/about/about-p2.jpg" style="background-image: url(&quot;img/about/about-p2.jpg&quot;);">
                            <div class="api-text">
                                <h3>Travel &amp; Camping</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="ap-service-item set-bg" data-setbg="img/about/about-p3.jpg" style="background-image: url(&quot;img/about/about-p3.jpg&quot;);">
                            <div class="api-text">
                                <h3>Event &amp; Party</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



         <!-- Modal Here -->

    <!-- add class modal -->
<div class="modal fade" id="bookNow" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Book now and enjoy your stay!</h5>
          </div>

      <div class="modal-body">
         <div class="container">
             <form>
              <div class="col-lg-12">
                 
                      <div class="row">

                          <div class="col-sm-12">
                              <div class="form-group">
                                 <label>Check In:</label>
                                     <input type="date" class="form-control">
                                  </div>
                          </div>
                         </div>

                         <div class="row">
                           <div class="col-sm-12">
                              <div class="form-group">
                                 <label>Check Out:</label>
                                     <input type="date" class="form-control">
                                  </div>
                          </div>
                     </div>

                       <div class="row">
                           <div class="col-sm-3">
                              <div class="form-group">
                                 <label>Rooms</label>
                                     <input type="text" class="form-control">
                                  </div>
                          </div>
                           <div class="col-sm-3">
                              <div class="form-group">
                                 <label>Adults</label>
                                     <input type="text" class="form-control">
                                  </div>
                          </div>
                           <div class="col-sm-3">
                              <div class="form-group">
                                 <label>Children</label>
                                     <input type="text" class="form-control">
                                  </div>
                          </div>
                     </div>
                </div>

                 <div class="col-lg-12">
                    <div class="container my-2" style="border:1px solid #dfa974;border-radius: 10px;padding:10px;">
                        <div class="row">
                            <div class="col-sm-12">
                                <p class="text-center text-dark">Do you have any promo code?</p>
                        </div>
                        </div>

                         <div class="row">
                               <div class="col-sm-12">
                                  <div class="form-group">
                                       <input type="text" class="form-control w-100" placeholder="Enter Code">
                                   </div>
                              </div>
                         </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <button class="btn btn-primary">Confirm</button>
                            </div>
                        </div>

                       
                    </div>
               </div>

                 <div class="col-lg-12">
                    <div class="container">
                        

                        <div class="row">
                                <button class="btn btn-primary">Book</button>
                        </div>

                       
                    </div>
               </div>

                 </form>
            </div>
        </div>

</div>

</div>

</div>
<!-- end of section modal -->

