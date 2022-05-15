<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('frontEnd') }}/css/style.css">
  <title>The Beyond Ltd</title>
</head>

<body>
  <!-- Header -->
  <section id="header">
    <div class="header container">
      <div class="nav-bar">
        <div class="brand">
          <a href="#hero">
            <!-- <h1><span>Beyond Holdings</span><span> Ltd</span></h1> -->
            <h1><img src="{{ asset('frontEnd') }}/images/head.png" /></h1>

          </a>
        </div>
        <div class="nav-list">
          <div class="hamburger">
            <div class="bar"></div>
          </div>
          <ul>
            <li><a href="#hero" data-after="Home">Home</a></li>
            <li><a href="#services" data-after="Service">Services</a></li>
            <li><a href="#projects" data-after="Projects">Projects</a></li>
			<li><a href="#memories" data-after="Memories">Memories</a></li>
            <li><a href="#about" data-after="About">About</a></li>
            <li><a href="#contact" data-after="Contact">Contact</a></li>
          </ul>
        </div>
      </div>
    </div>
  </section>
  <!-- End Header -->


  <!-- Hero Section  -->
  <section id="hero">
    <div class="hero container">
      <div>
        <h1>Hello, <span></span></h1>
        <h1>We Are<span></span></h1>
        <!-- <h1>Beyond Holdings Ltd</h1> -->
        <h1><img src="{{ asset('frontEnd') }}/images/new2.png" /></h1>
        <a href="#contact" type="button" class="cta">Visit Us</a>
      </div>
    </div>
  </section>
  <!-- End Hero Section  -->

  <!-- Service Section -->
  <section id="services">
    <div class="services container">
      <div class="service-top">
        <h1 class="section-title">Ser<span>v</span>ices</h1>
        <p>We have been serving varieties of construction developments throuout the Sylhet city from past 10 years.</p>
      </div>
      <div class="service-bottom">
        <div class="service-item">
          <div class="icon"><img src="{{ asset('frontEnd') }}/images/build.jpg" /></div>
          <h2>Building Construction</h2>
          <p>We have been doing building construction as well</p>
        </div>
        <div class="service-item">
          <div class="icon"><img src="{{ asset('frontEnd') }}/images/road.jpg" /></div>
          <h2>Road Development</h2>
          <p>Most of our project is related to road development</p>
        </div>
        <div class="service-item">
          <div class="icon"><img src="{{ asset('frontEnd') }}/images/drain.jpg" /></div>
          <h2>Dranage Development</h2>
          <p>We have the best dranage construction reputation in Sylhet City</p>
        </div>
        <div class="service-item">
          <div class="icon"><img src="{{ asset('frontEnd') }}/images/factory.jpg" /></div>
          <h2>Factory Construction</h2>
          <p>We did develop few factory in outside of Sylhet town</p>
        </div>
      </div>
    </div>
  </section>
  <!-- End Service Section -->

  <!-- Projects Section -->
  <section id="projects">
    <div class="projects container">
      <div class="projects-header">
        <h1 class="section-title">Recent <span>Projects</span></h1>
      </div>
      <div class="all-projects">
        <div class="project-item">
          <div class="project-info">
            <h1>Project Bondor</h1>
            <h2>Our Bondor Project</h2>
            <p>This is one of our best development we did so far!</p>
          </div>
          <div class="project-img">
            <img src="{{ asset('frontEnd') }}/images/pro1.jpg" alt="img">
          </div>
        </div>
        <div class="project-item">
          <div class="project-info">
            <h1>Project Zindabazar</h1>
            <h2>Our Zindabazar Project</h2>
            <p>A huge project handled by us back in 2020</p>
          </div>
          <div class="project-img">
            <img src="{{ asset('frontEnd') }}/images/pro2.jpg" alt="img">
          </div>
        </div>
        <div class="project-item">
          <div class="project-info">
            <h1>Project Chawhatta</h1>
            <h2>Our Chawhatta Project</h2>
            <p>This is one of our running project in 2022</p>
          </div>
          <div class="project-img">
            <img src="{{ asset('frontEnd') }}/images/pro3.jpg" alt="img">
          </div>
        </div>
        <div class="project-item">
          <div class="project-info">
            <h1>Project Baruthkhana</h1>
            <h2>Our Baruthkhana Project</h2>
            <p>This is another running project in baruthkhana</p>
          </div>
          <div class="project-img">
            <img src="{{ asset('frontEnd') }}/images/pro4.jpg" alt="img">
          </div>
        </div>
        <div class="project-item">
          <div class="project-info">
            <h1>Project Pathantula</h1>
            <h2>Our Pathantula Project</h2>
            <p>Dranage development going on in pathantula</p>
          </div>
          <div class="project-img">
            <img src="{{ asset('frontEnd') }}/images/pro5.jpg" alt="img">
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Projects Section -->

  <!-- Memories Section -->
	<section id="memories">
    <div class="projects container">
      <div class="projects-header">
        <h1 class="section-title">MEM<span>O</span>RIES</h1>
      </div>
      <div class="all-projects">
		  
        <div class="project-item">
		 <div class="project-img">
            <img src="{{ asset('frontEnd') }}/images/memo1.jpg" alt="img">
          </div>
          <div class="project-img">
            <img src="{{ asset('frontEnd') }}/images/memo2.jpg" alt="img">
          </div>
        </div>

        <div class="project-item">
		 <div class="project-img">
            <img src="{{ asset('frontEnd') }}/images/memo3.jpg" alt="img">
          </div>
          <div class="project-img">
            <img src="{{ asset('frontEnd') }}/images/memo4.jpg" alt="img">
          </div>
        </div>

		<div class="project-item">
		 <div class="project-img">
            <img src="{{ asset('frontEnd') }}/images/memo5.jpg" alt="img">
          </div>
          <div class="project-img">
            <img src="{{ asset('frontEnd') }}/images/memo6.jpg" alt="img">
          </div>
        </div>

        <div class="project-item">
          <div class="project-info">
            <h1>HADITH</h1>
            <p>It was narrated from Miqdam bin Ma'dikarib (Ar- Zubaidi) that the Messenger of Allah (ﷺ) said: No man earns anything better than that which he earns with his own hands, and what a man spends on himself, his wife, his child and his servant, then it is charity.</p>
          </div>
         
        </div>
      </div>
    </div>
  </section>
  <!-- End Memories Section -->

  

    
  <!-- About Section -->
  <section id="about">
    <div class="about container">
      <div class="col-left">
        <div class="about-img">
          <img src="{{ asset('frontEnd') }}/images/mamun.jpg" alt="img">
        </div>
      </div>
      <div class="col-right">
        <h1 class="section-title">Abdul <span>Mamun</span></h1>
        <h2>Construction Developer</h2>
        <p><b>Phone:<i>  0101010101</i></b></p>
        <p><b>Email:<i>  jkjkj@gmail.com</i></b></p>

        <a href="#" class="cta">Contact Me</a>
      </div>
    </div>
  </section>
  <section id="about">
    <div class="about container">
      <div class="col-left">
        <div class="about-img">
          <img src="{{ asset('frontEnd') }}/images/mahmud.jpg" alt="img">
        </div>
      </div>
      <div class="col-right">
        <h1 class="section-title"><span>Mahmudul</span> Islam</h1>
        <h2>Construction Developer</h2>
        <p><b>Phone:<i>  0101010101</i></b></p>
        <p><b>Email:<i>  jkjkj@gmail.com</i></b></p>

        <a href="#" class="cta">Contact Me</a>
      </div>
    </div>

	<div class="about container">
      <div class="col-left">
        <div class="about-img">
          <img src="{{ asset('frontEnd') }}/images/rahat.jpg" alt="img">
        </div>
      </div>
      <div class="col-right">
        <h1 class="section-title">Nazmul Islam<span> Rahat</span></h1>
        <h2>Construction Developer</h2>
        <p><b>Phone:<i>  0101010101</i></b></p>
        <p><b>Email:<i>  jkjkj@gmail.com</i></b></p>

        <a href="#" class="cta">Contact Me</a>
      </div>
    </div>

	<div class="about container">
      <div class="col-left">
        <div class="about-img">
          <img src="{{ asset('frontEnd') }}/images/tarek.jpg" alt="img">
        </div>
      </div>
      <div class="col-right">
        <h1 class="section-title"><span>Tarek</span> Ahmed</h1>
        <h2>Construction Developer</h2>
        <p><b>Phone:<i>  0101010101</i></b></p>
        <p><b>Email:<i>  jkjkj@gmail.com</i></b></p>

        <a href="#" class="cta">Contact Me</a>
      </div>
    </div>

	<div class="about container">
      <div class="col-left">
        <div class="about-img">
          <img src="{{ asset('frontEnd') }}/images/tipul.jpg" alt="img">
        </div>
      </div>
      <div class="col-right">
        <h1 class="section-title">Rakibul Islam<span> Tipul</span></h1>
        <h2>Construction Developer</h2>
        <p><b>Phone:<i>  0101010101</i></b></p>
        <p><b>Email:<i>  jkjkj@gmail.com</i></b></p>

        <a href="#" class="cta">Contact Me</a>
      </div>
    </div>

	<div class="about container">
      <div class="col-left">
        <div class="about-img">
          <img src="{{ asset('frontEnd') }}/images/raju.jpg" alt="img">
        </div>
      </div>
      <div class="col-right">
        <h1 class="section-title">Mahbubul Karim<span> Raju</span></h1>
        <h2>Construction Developer</h2>
        <p><b>Phone:<i>  0101010101</i></b></p>
        <p><b>Email:<i>  jkjkj@gmail.com</i></b></p>

        <a href="#" class="cta">Contact Me</a>
      </div>
    </div>

	<div class="about container">
      <div class="col-left">
        <div class="about-img">
          <img src="{{ asset('frontEnd') }}/images/salman.jpg" alt="img">
        </div>
      </div>
      <div class="col-right">
        <h1 class="section-title">Shahrukh Islam<span> Salman</span></h1>
        <h2>Construction Developer</h2>
        <p><b>Phone:<i>  0101010101</i></b></p>
        <p><b>Email:<i>  jkjkj@gmail.com</i></b></p>

        <a href="#" class="cta">Contact Me</a>
      </div>
    </div>

	<div class="about container">
      <div class="col-left">
        <div class="about-img">
          <img src="{{ asset('frontEnd') }}/images/junel.jpg" alt="img">
        </div>
      </div>
      <div class="col-right">
        <h1 class="section-title"><span>Junel</span> Ahmed</h1>
        <h2>Construction Developer</h2>
        <p><b>Phone:<i>  0101010101</i></b></p>
        <p><b>Email:<i>  jkjkj@gmail.com</i></b></p>

        <a href="#" class="cta">Contact Me</a>
      </div>
    </div>
  </section>

  <!-- End About Section -->

  <!-- Contact Section -->
  <section id="contact">
    <div class="contact container">
      <div>
        <h1 class="section-title">Contact <span>info</span></h1>
      </div>
      <div class="contact-items">
	    <div class="contact-item">
          <div class="icon"><img src="https://img.icons8.com/bubbles/100/000000/map-marker.png" /></div>
          <div class="contact-info">
            <h1>Address</h1>
            <h2>Mirboxtula, Sylhet, Bangladesh</h2>
          </div>
        </div>
        <div class="contact-item">
          <div class="icon"><img src="https://img.icons8.com/bubbles/100/000000/phone.png" /></div>
          <div class="contact-info">
            <h1>Phone</h1>
            <h2>+88 01768 000 555</h2>
            <!-- <h2>+1 234 123 1234</h2> -->
          </div>
        </div>
        <div class="contact-item">
          <div class="icon"><img src="https://img.icons8.com/bubbles/100/000000/new-post.png" /></div>
          <div class="contact-info">
            <h1>Email</h1>
            <h2>thebeyondltd@gmail.com</h2>
            <!-- <h2>abcd@gmail.com</h2> -->
          </div>
        </div>
        
      </div>
    </div>
  </section>
  <!-- End Contact Section -->

  <!-- Footer -->
  <section id="footer">
    <div class="footer container">
      <div class="brand">
        <h1><span>M</span>uttaki <span>K</span>han</h1>
      </div>
      <h2>Your Complete Web Solution</h2>
      <div class="social-icon">
        <div class="social-item">
          <a href="#"><img src="https://img.icons8.com/bubbles/100/000000/facebook-new.png" /></a>
        </div>
        <div class="social-item">
          <a href="#"><img src="https://img.icons8.com/bubbles/100/000000/instagram-new.png" /></a>
        </div>
        <div class="social-item">
          <a href="#"><img src="https://img.icons8.com/bubbles/100/000000/twitter.png" /></a>
        </div>
        <div class="social-item">
          <a href="#"><img src="https://img.icons8.com/bubbles/100/000000/behance.png" /></a>
        </div>
      </div>
      <p>Copyright © 2022 Muttaki. All rights reserved</p>
    </div>
  </section>
  <!-- End Footer -->
  <script href="{{ asset('frontEnd') }}/css/app.js"></script>
</body>

</html>


<script>
const hamburger = document.querySelector('.header .nav-bar .nav-list .hamburger');
const mobile_menu = document.querySelector('.header .nav-bar .nav-list ul');
const menu_item = document.querySelectorAll('.header .nav-bar .nav-list ul li a');
const header = document.querySelector('.header.container');

hamburger.addEventListener('click', () => {
	hamburger.classList.toggle('active');
	mobile_menu.classList.toggle('active');
});

document.addEventListener('scroll', () => {
	var scroll_position = window.scrollY;
	if (scroll_position > 250) {
		header.style.backgroundColor = '#29323c';
	} else {
		header.style.backgroundColor = 'transparent';
	}
});

menu_item.forEach((item) => {
	item.addEventListener('click', () => {
		hamburger.classList.toggle('active');
		mobile_menu.classList.toggle('active');
	});
});
</script>