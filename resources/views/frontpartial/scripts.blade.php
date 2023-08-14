   <!-- ========================= JS here ========================= -->
   <script src="{{ asset('front/js/bootstrap.min.js') }}"></script>
   <script src="{{ asset('front/js/count-up.min.js') }}"></script>
   <script src="{{ asset('front/js/wow.min.js') }}"></script>
   <script src="{{ asset('front/js/tiny-slider.js') }}"></script>
   <script src="{{ asset('front/js/glightbox.min.js') }}"></script>
   <script src="{{ asset('front/js/imagesloaded.min.js') }}"></script>
   <script src="{{ asset('front/js/isotope.min.js') }}"></script>
   <script src="{{ asset('front/js/main.js') }}"></script>
   <script type="text/javascript">
       //========= testimonial 
       tns({
           container: '.testimonial-slider',
           items: 1,
           slideBy: 'page',
           autoplay: false,
           mouseDrag: true,
           gutter: 0,
           nav: false,
           controls: true,
           controlsText: ['<i class="lni lni-arrow-left"></i>', '<i class="lni lni-arrow-right"></i>'],
       });

       //========= glightbox
       GLightbox({
           'href': 'https://www.youtube.com/watch?v=r44RKWyfcFw&fbclid=IwAR21beSJORalzmzokxDRcGfkZA1AtRTE__l5N4r09HcGS5Y6vOluyouM9EM',
           'type': 'video',
           'source': 'youtube', //vimeo, youtube or local
           'width': 900,
           'autoplayVideos': true,
       });

       //============== isotope masonry js with imagesloaded
       imagesLoaded('#container', function() {
           var elem = document.querySelector('.grid');
           var iso = new Isotope(elem, {
               // options
               itemSelector: '.grid-item',
               masonry: {
                   // use outer width of grid-sizer for columnWidth
                   columnWidth: '.grid-item'
               }
           });

           let filterButtons = document.querySelectorAll('.portfolio-btn-wrapper button');
           filterButtons.forEach(e =>
               e.addEventListener('click', () => {

                   let filterValue = event.target.getAttribute('data-filter');
                   iso.arrange({
                       filter: filterValue
                   });
               })
           );
       });
   </script>
   <script>
    //    $.ajax({
    //        type: 'GET',
    //        url: "{{ route('getlistings') }}",
    //        data: {
    //            'category_id': 1
    //        },
    //        dataType: 'json',
    //        error: function(Err) {

    //        },
    //        success: function(result) {
    //            console.log(result);
    //            if (result.status == true) {
    //             //    $('#teachenglish .row').append(result.html);

    //                // Set the cookie name and expiration time
    //                const cookieName = 'impressionCount';
    //                const expiration = new Date(Date.now() + 1 * 60 * 1000); // 1 min from now
    //                // Get the current impression count from the cookie, or set it to 0 if not found
    //                let impressionCount = parseInt(getCookie(cookieName)) || 0;
    //                if (!parseInt(getCookie(cookieName))) {

    //                    impressionCount++;
    //                    setCookie(cookieName, impressionCount, expiration);

    //                    // getting the stats
    //                    var country = 'Unknown';
    //                    var ip = 'Unknown';
    //                    const isMobileDevice = window.innerWidth <= 768;
    //                    fetch("https://ipapi.co/json/")
    //                        .then(response => response.json())
    //                        .then(data => {
    //                            country = data.country_name;
    //                            ip = data.ip;
    //                            console.log(country);
    //                            $.ajax({
    //                                type: 'GET',
    //                                url: "",
    //                                data: {
    //                                    'listing': result.data,
    //                                    'mobile': isMobileDevice,
    //                                    'ip': ip,
    //                                    'country': country
    //                                },
    //                                dataType: 'json',
    //                                error: function(Err) {

    //                                },
    //                                success: function(result) {
    //                                    console.log(result);
    //                                }
    //                            });

    //                        })
    //                        .catch(error => {
    //                            console.log("Error:", error);
    //                        });
    //                }
    //            } else {
    //                console.log(result);
    //            }
    //        }
    //    });

    //   
   </script>

   <script>
       $.ajax({
           type: 'GET',
           url: "{{ route('showlistings') }}",
           data: {
               'category_id': 1
           },
           dataType: 'json',
           error: function(Err) {

           },
           success: function(result) {
            if (result.status == true) {
                   $('#teachenglish .row').append(result.html);

                   const cookieName = 'impressionCount';
                   const expiration = new Date(Date.now() + 1 * 60 * 1000); // 1 min from now
                   let impressionCount = parseInt(getCookie(cookieName)) || 0;

                   if (!parseInt(getCookie(cookieName))) {
                       impressionCount++;
                       setCookie(cookieName, impressionCount, expiration);
                       
                       var country = 'Unknown';
                       var ip = 'Unknown';
                       const isMobileDevice = window.innerWidth <= 768;
                       fetch("https://ipapi.co/json/")
                           .then(response => response.json())
                           .then(data => {
                               country = data.country_name;
                               ip = data.ip;
                               $.ajax({
                                   type: 'GET',
                                   url: "{{ route('recordimpression') }}",
                                   data: {
                                       'listing': result.data,
                                       'mobile': isMobileDevice,
                                       'ip': ip,
                                       'country': country
                                   },
                                   dataType: 'json',
                                   error: function(Err) {

                                   },
                                   success: function(result) {
                                       console.log(result);
                                   }
                               });

                           })
                           .catch(error => {
                               console.log("Error:", error);
                           });
                   }
            }
           }
       });
       function getCookie(name) {
           const match = document.cookie.match(new RegExp(`(^| )${name}=([^;]+)`));
           if (match) return match[2];
       }

       // Function to set a cookie value with a name and expiration date
       function setCookie(name, value, expiration) {
           document.cookie = `${name}=${value};expires=${expiration.toUTCString()};path=/`;
       }
   </script>
   </body>

   </html>
