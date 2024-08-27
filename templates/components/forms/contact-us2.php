<form id="contactForm" action="#" method='post'>
	<label for="email">
		Name </label>

	<div class="input">

		<input class="data" type="text" name="name" id="name" placeholder="name"  >
	</div>
	<label for="email">
		Email </label>

	<div class="input">

		<input class="data" type="email" name="email" id="email" placeholder="email" required>
	</div>


	<label for="number">
		Phone number
	</label>

	<div class="input">
		<input class="data" type="tel" name="number" id="number" placeholder="Phone number" required>
	</div>

	<label for="describe">
		what are you looking for
	</label>
<div class="input">
		<textarea class="data" name="describe" id="describe" cols=" 30" rows="6" placeholder="Describe"></textarea>
	</div>


<!-- 
	<label for="agreement" class="flex-row">
		<input type="checkbox" name="agreement" id="agreement" value="true" checked>
		I want you to inform me about new products and new offers
	</label> -->

	<div class="cf-turnstile" data-sitekey="0x4AAAAAAAduRsbVAHyEFDb5" data-callback="javascriptCallback"></div>
	<button id="contact-form-submit" class="submit" variant="primary" type="submit">
		 Send Message <i class="iconsax" icon-name="send-1"></i>
	</button>
 
</form>