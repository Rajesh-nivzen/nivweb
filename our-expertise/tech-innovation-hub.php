<!DOCTYPE html>
<html lang="en">

<?php include '../includes/layout.php';?>

  <body>
    <div id="wapper">
      <div class="header-wapper">
        <div class="container">

        <?php include '../includes/header.php';?>

        </div>
      </div>
      <div class="innerbanner">
        <div class="container">
          <div class="d-flex justify-content-between align-items-center">
            <div class="inrpgtitle">
            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo $projectFolderName ?>">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Tech Innovation Hub</li>
                                </ol>
                            </nav>
              <h1>Tech Innovation Hub</h1>
              <p>
                Strategically build and leverage digital technologies to boost
                business results and user experiences
              </p>
            </div>
            <div class="bnrimg">
              <img src="../images/Tech-Innovation-Hub.png" alt="" />
            </div>
          </div>
        </div>
      </div>
      <div class="about-react">
        <div class="container">
          <div class="normaltxt">
            Our Tech Innovation Hub is a collaborative space where engineers, developers, and creative thinkers come together to experiment and innovate. We partner with startups, enterprises, and industry leaders to explore new possibilities and develop transformative digital products.
            Transforming industries with secure, transparent, and decentralized solutions that revolutionize everything from finance to supply chain management.

          </div>
          <div class="row">
            <div class="col col-12 col-md-6">
              <div class="content-part">
                <h3>Why Choose Our Tech Innovation Hub for Your Web Development Needs?</h3>
                <p>
                  At Nivzen Technologies, innovation isn't just a buzzword—it's the driving force behind everything we do. The Tech Innovation Hub is where cutting-edge ideas, emerging technologies, and creative problem-solving converge to build groundbreaking solutions for our clients.


                  <br /><br />
                  Building immersive experiences that redefine customer engagement, training, and entertainment, providing a new dimension to user interaction.Connecting the physical and digital worlds to drive automation, increase efficiency, and offer real-time data insights across industries.

                </p>
              </div>
            </div>
            <div class="col col-12 col-md-6 text-center">
              <div class="image-part">
                <img src="../images/expertize-page/img-Tech-Innovation-Hub.png" alt="" />
              </div>
            </div>
          </div>
        </div>
      </div>

      <?php include '../inquery.php';?>

    

            <div class="discussProject">
              <div class="container">
                <h3>Let's Discuss Your Project</h3>
                <p>
                  Get free consultation and let us know your project idea to turn it
                  into an amazing digital product.
                </p>
                <a href="../contact-us.php">
                <button class="border-gradient">
                  <span>Contact Us</span>
                </button>
              </a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <?php include '../includes/footer.php';?>

    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>
    <script>
      $(document).ready(function () {
        var centerIndex = Math.floor($(".custom-carousel .owl-item").length / 2); // Calculate center index

        $(".custom-carousel").owlCarousel({
          loop: true,
          margin: 10,
          autoWidth: true,
          nav: true,
          navText: ["<button class='prev'>&#9664;</button>", "<button class='next'>&#9654;</button>"],
          responsive: {
            0: {
              items: 1
            },
            600: {
              items: 1
            },
            1000: {
              items: 1
            }
          },
          startPosition: centerIndex
        });

        $(".custom-carousel .item").click(function () {
       
          $(".custom-carousel .item").removeClass("active");

         
          $(this).toggleClass("active");

          
          var clickedItemId = $(this).attr("data-id");

         
          var details = "Fetched details for item " + clickedItemId;

        
          $("#details-container").html(details);
        });
      });
    </script>
  
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> 

    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script>
    

      jQuery(function ($) {
       
        var doAnimations = function () {
      
          var offset = $(window).scrollTop() + $(window).height(),
            $animatables = $(".animatable");

         
          if ($animatables.length == 0) {
            $(window).off("scroll", doAnimations);
          }

       
          $animatables.each(function (i) {
            var $animatable = $(this);
            if ($animatable.offset().top + $animatable.height() - 20 < offset) {
              $animatable.removeClass("animatable").addClass("animated");
            }
          });
        };

        
        $(window).on("scroll", doAnimations);
        $(window).trigger("scroll");

        $(".ward").owlCarousel({
          loop: false,
          margin: 0,
          nav: false,
          responsive: {
            0: {
              items: 3,
            },
            600: {
              items: 4,
            },
            1000: {
              items: 6,
            },
            1300: {
              items: 6,
            },
          },
        });
      });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>

    <script>

      $.validator.addMethod("phoneValidation", function(value, element) {
          return this.optional(element) || /^[+]?[0-9\s\-()]{10,13}$/.test(value);
      }, "Please enter a valid phone number (10-13 digits, optional +, spaces, dashes, or parentheses).");



    $("#inquery-post").validate({
        rules: {
            'name': {
                required: true,
            },
            'email': {
                required: true ,
                email: true ,
               
            },
            'phone': {
                required: true,
                phoneValidation: true 
            },
            'desc': {
                required: true
            }
        }
    });

    $("#inquery-post").submit(function(event) {
        event.preventDefault();
      
        if ($(this).valid()) {
          $('#inq_text').text('Processing...'); 
            $.ajax({
                url: '<?php echo $projectFolderName?>/submit-inquery.php',
                type: 'POST',
                data: $(this).serialize(), 
                success: function(response) {
                    const obj = JSON.parse(response);
                    if (obj && obj.message) {
                        $("#alertMsg").html(`
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                ${obj.message}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        `);
                        $('#inq_text').text('Inquiry Sent'); 

                        $('#inquery-post')[0].reset();
                    } 
                }
            });
        }
    });
    </script>
  
  </body>

</html>