<div class="form">
  <h4>Send us a message</h4>
  <form method="post" id="contact-from" enctype="multipart/form-data">
    <div class="form-group">
      <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
      <div id="nameError"></div>
    </div>
    <div class="form-group">
      <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email">
      <div id="emailError"></div>
    </div>
    <div class="form-group">
      <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject">
      <div id="subjectError"></div>
    </div>
    <div class="form-group">
      <textarea type="text" class="form-control" name="message" id="message" placeholder="Message"></textarea>
      <div id="messageError"></div>
    </div>
    <div class="text-center">
      <button title="Send Message">Send Message</button>
    </div>
      @if (session('message '))
        <div class="alert alert-success">
          <a href="#" data-dismiss="alert"</a> {{ session('message') }}
        </div>
      @endif
  </form>
</div>
