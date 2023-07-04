<form action="http://127.0.0.1:8000/process_post" method="POST">
    <div class="row">
        <div class="col">
            <div class="mb-3"><label class="form-label" for="email"><strong>Email Address à:</strong></label>
            <input class="form-control" type="email" id="email" placeholder="user@example.com" name="destinataire">
        </div>
        </div>
        <div class="col">
            <div class="mb-3"><label class="form-label" for="email"><strong>Objet</strong></label>
            <input class="form-control" type="text" id="email"  name="objet">
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        <div class="mb-3"><label class="form-label" for="first_name"><strong>Message</strong></label>
        <!-- <input class="form-control" type="text" id="email"  name="message"> -->
        <textarea class="ckeditor" type="text" rows="4"  name="message">It was a dark and stormy night...</textarea>
        </div>
        </div>
        
    </div>

    <div class="mb-3"><button class="btn btn-primary btn-sm" type="submit">Send Email</button></div>
</form>