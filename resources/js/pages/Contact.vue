<template>
  <div>
    <Header
      :title="'Contattaci!'"
      :subtitle="'Qui puoi contattarci.'"
      :imageUrl="'img/contact-us.png'"
    ></Header>
    <main>
      <section>
        <div class="container py-5">
          <h2>Compila il seguente form per contattarci.</h2>

          <form method="post" action="api/contacts">
            <div class="form-group">
              <label>Nome</label>
              <input type="text" name="name" class="form-control" />
            </div>

            <div class="form-group">
              <label>Cognome</label>
              <input type="text" name="surname" class="form-control" />
            </div>

            <div class="form-group">
              <label>Indirizzo Email</label>
              <input type="email" name="email" class="form-control" />
              <small class="form-text text-muted"
                >Non condivideremo il tuo indirizzo email con nessuno.</small
              >
            </div>

            <div class="form-group">
              <label>Messaggio</label>
              <textarea
                name="message"
                id="message"
                cols="30"
                rows="10"
                class="form-control"
                style="resize: none"
              ></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </section>
    </main>
  </div>
</template>

<script>
import Header from "../components/Header.vue";
export default {
  name: "Contact",
  components: { Header },
};
</script>

<style>
</style>