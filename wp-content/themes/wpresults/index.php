<?php
/**
 * Template Name: index
 * The index template
 *
 */
  get_header();?>

  <div class="callout jumbotron">
  	<div class="container">
  		<h1>THE TOP WORDPRESS SITES CHOOSE US.</h1>
      <p class="lead">We work with the top WordPress sites on the planet. They trust WP Results with their WordPress web site design, programming, and maintenance. Discover what we can do for you.</p>
		<section style="display:none;" class="liquid-slider" id="portfolio-slider">	
				<div class="portfolio-slider-post">
          <img src="<?php echo get_template_directory_uri() . '/images/quantumrewards-screenshot.png';?>" class="img-responsive" alt="Fandango" />
				</div>
        <div class="portfolio-slider-post">
          <img src="<?php echo get_template_directory_uri() . '/images/wnd-screenshot01.png';?>" class="img-responsive" alt="WND" />
        </div>
		</section>
  	</div>
  </div>

  <div id="about" class="container marketing">
  	<div class="row">
      <h2 class="section-title">What we mean by results</h2>
  		<div class="col-sm-4">
        <div class="marketing-icon">
          <i class="fa fa-coffee"></i>
        </div>
  			<h3>We mean Awake</h3>
  			<p>Fortune 500 companies, blogs, and dozens of individual investors with big dreams (and modest budgets) choose us because we listen and know the difference. When you talk with your project manager, you will know the difference too. When someone is really listening and understanding your goals, you can sleep well at night.</p>
  		</div>
  		<div class="col-sm-4">
        <div class="marketing-icon">
          <i class="fa fa-book"></i>
        </div>
  			<h3>We mean Knowledgeable</h3>
  			<p>WordPress runs 18% of the internet for a good reason, but where its limitations pose roadblocks for your business, we provide bridges. We understand the complexities you face and how to provide you with the immediate and long-term solutions you need. We provide results by programming your custom plugins and themes, solving those legacy issues or even updating your interface or shopping cart.</p>
  		</div>
  		<div class="col-sm-4">
        <div class="marketing-icon">
          <i class="fa fa-undo"></i>
        </div>
  			<h3>We mean Agile</h3>
  			<p>Your project moves forward predictably and steadily using our "sprint" process. Each sprint acts as a check-point along the way so you can always be assured that you get the exactly the results you need. You tell us where you want to go, and we get you there step by step.</p>
  		</div>
  	</div>

    <div class="row">
      <div class="col-sm-4">
        <div class="marketing-icon">
          <i class="fa fa-users"></i>
        </div>
        <h3>We mean Service</h3>
        <p>We match you with a Senior Developer who understands your business and has the freedom to focus exclusively on your project. We take care of everything so all they have left to do is code your precise vision into a reality, on-time and on-budget.</p>
      </div>
      <div class="col-sm-4">
        <div class="marketing-icon">
          <i class="fa fa-desktop"></i>
        </div>
        <h3>We mean Experienced</h3>
        <p>With decades of experience and millions of dollars in projects under our belt, we have seen and done it all. We understand that your website is your life-blood and when it goes down you’re essentially out of business. Our unparalleled industry and WordPress knowledge means you miss out on all the hard knocks and setbacks that would otherwise be in your future. Sorry about that!</p>
      </div>
      <div class="col-sm-4">
        <div class="marketing-icon">
          <i class="fa fa-money"></i>
        </div>
        <h3>We mean Affordable</h3>
        <p>Because we provide our Senior Developers with an environment where their every need is accounted for, all they have left to do is hold planning and review calls with you, our valued customer, and… program. And when a programmer is free to program, you get the results you need at the best price possible.</p>
      </div>
    </div>

  </div>
  <div class="container">
    <div class="row">
      <h2 class="section-title">Testimonials</h3>
      <div class="col-sm-12">
        <blockquote>
          <p class="quote">
            Ben wins at life and at web development.  I came to him in a pickle with a lackluster website, and he rebuilt it into something that I and my clients can be proud of.  Not only was he inordinately patient with me while I tried to explain my vision for the site, but he is also pretty intuitive with making tweaks and upgrades--he seems to know what I'll want before I know it myself.  WP Results has provided my company with a stellar online image.  I couldn't imagine going with anyone else.
          </p>
          <small>Mary Holt, Owner Radley's Boo Photography</small>
        </blockquote>
      </div>
    </div>
  </div>


<?php get_footer();?>