<h2>Contact Form</h2>
<form action="/contact" method="get">
    <div class="mb-3">
        <label class="form-label">Subject</label>
        <input type="text" name="subject" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control">
     </div>
    <div class="mb-3">
        <label class="form-label">Body</label>
        <textarea name="body" class="form-control"></textarea>
    </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>