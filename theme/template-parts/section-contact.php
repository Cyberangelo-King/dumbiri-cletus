      <section class="contact-section reveal" id="contact" aria-labelledby="contactTitle">
        <div class="contact-intro">
          <p class="eyebrow">Contact</p>
          <h2 id="contactTitle">Let's start a conversation.</h2>
          <p>For speaking, partnerships, podcast invitations, press, and community inquiries.</p>
          <div class="contact-methods">
            <a href="mailto:hello@dumbiricletus.com">hello@dumbiricletus.com</a>
            <a href="#">LinkedIn</a>
            <a href="#">Instagram</a>
          </div>
        </div>
        <form class="contact-form" action="#" method="post">
          <label>
            Name
            <input type="text" name="name" autocomplete="name" required />
          </label>
          <label>
            Email
            <input type="email" name="email" autocomplete="email" required />
          </label>
          <label>
            Inquiry type
            <select name="type" id="inquiryType">
              <option>Speaking engagement</option>
              <option>Podcast invitation</option>
              <option>Media / press</option>
              <option>Community membership</option>
              <option>Partnership</option>
            </select>
          </label>
          <p class="form-helper" id="formHelper">Share the event theme, audience, city, and date if available.</p>
          <label>
            Organization / event date
            <input type="text" name="organization" />
          </label>
          <label>
            Message
            <textarea name="message" rows="5" required></textarea>
          </label>
          <button class="button button--red" type="submit">Send Inquiry <span aria-hidden="true">-&gt;</span></button>
        </form>
      </section>
