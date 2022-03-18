<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('frontEnd') }}/css/style.css">
  <title>My Website</title>
</head>

<body>
  <!-- Header -->
  <section id="header">
    <div class="header container">
      <div class="nav-bar">
        <div class="brand">
          <a href="#hero">
            <h1><span>Brothers</span> <span>Associate</span></h1>
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
        <h1>Brother's Associate <span></span></h1>
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
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis debitis rerum, magni voluptatem sed
            architecto placeat beatae tenetur officia quod</p>
        </div>
        <div class="service-item">
          <div class="icon"><img src="{{ asset('frontEnd') }}/images/road.jpg" /></div>
          <h2>Road Development</h2>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis debitis rerum, magni voluptatem sed
            architecto placeat beatae tenetur officia quod</p>
        </div>
        <div class="service-item">
          <div class="icon"><img src="{{ asset('frontEnd') }}/images/drain.jpg" /></div>
          <h2>Dranage Development</h2>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis debitis rerum, magni voluptatem sed
            architecto placeat beatae tenetur officia quod</p>
        </div>
        <div class="service-item">
          <div class="icon"><img src="{{ asset('frontEnd') }}/images/factory.jpg" /></div>
          <h2>Factory Construction</h2>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis debitis rerum, magni voluptatem sed
            architecto placeat beatae tenetur officia quod</p>
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
            <h1>Project 1</h1>
            <h2>Coding is Love</h2>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ad, iusto cupiditate voluptatum impedit unde
              rem ipsa distinctio illum quae mollitia ut, accusantium eius odio ducimus illo neque atque libero non sunt
              harum? Ipsum repellat animi, fugit architecto voluptatum odit et!</p>
          </div>
          <div class="project-img">
            <img src="{{ asset('frontEnd') }}/images/img-1.png" alt="img">
          </div>
        </div>
        <div class="project-item">
          <div class="project-info">
            <h1>Project 2</h1>
            <h2>Coding is Love</h2>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ad, iusto cupiditate voluptatum impedit unde
              rem ipsa distinctio illum quae mollitia ut, accusantium eius odio ducimus illo neque atque libero non sunt
              harum? Ipsum repellat animi, fugit architecto voluptatum odit et!</p>
          </div>
          <div class="project-img">
            <img src="./img/img-1.png" alt="img">
          </div>
        </div>
        <div class="project-item">
          <div class="project-info">
            <h1>Project 3</h1>
            <h2>Coding is Love</h2>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ad, iusto cupiditate voluptatum impedit unde
              rem ipsa distinctio illum quae mollitia ut, accusantium eius odio ducimus illo neque atque libero non sunt
              harum? Ipsum repellat animi, fugit architecto voluptatum odit et!</p>
          </div>
          <div class="project-img">
            <img src="./img/img-1.png" alt="img">
          </div>
        </div>
        <div class="project-item">
          <div class="project-info">
            <h1>Project 4</h1>
            <h2>Coding is Love</h2>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ad, iusto cupiditate voluptatum impedit unde
              rem ipsa distinctio illum quae mollitia ut, accusantium eius odio ducimus illo neque atque libero non sunt
              harum? Ipsum repellat animi, fugit architecto voluptatum odit et!</p>
          </div>
          <div class="project-img">
            <img src="./img/img-1.png" alt="img">
          </div>
        </div>
        <div class="project-item">
          <div class="project-info">
            <h1>Project 5</h1>
            <h2>Coding is Love</h2>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ad, iusto cupiditate voluptatum impedit unde
              rem ipsa distinctio illum quae mollitia ut, accusantium eius odio ducimus illo neque atque libero non sunt
              harum? Ipsum repellat animi, fugit architecto voluptatum odit et!</p>
          </div>
          <div class="project-img">
            <img src="./img/img-1.png" alt="img">
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Projects Section -->

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
          <img src="{{ asset('frontEnd') }}/images/tarek.jpg" alt="img">
        </div>
      </div>
      <div class="col-right">
        <h1 class="section-title"><span>Mahmud</span> Ahmed</h1>
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
            <h2>Fatikchhari, Chittagong, Bangladesh</h2>
          </div>
        </div>
        <div class="contact-item">
          <div class="icon"><img src="https://img.icons8.com/bubbles/100/000000/phone.png" /></div>
          <div class="contact-info">
            <h1>Phone</h1>
            <h2>+1 234 123 1234</h2>
            <h2>+1 234 123 1234</h2>
          </div>
        </div>
        <div class="contact-item">
          <div class="icon"><img src="https://img.icons8.com/bubbles/100/000000/new-post.png" /></div>
          <div class="contact-info">
            <h1>Email</h1>
            <h2>info@gmail.com</h2>
            <h2>abcd@gmail.com</h2>
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
        <h1><span>S</span>haif <span>A</span>rfan</h1>
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
      <p>Copyright © 2020 Arfan. All rights reserved</p>
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