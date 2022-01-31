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

          <form @submit.prevent="emailSend()" v-if="isSent === false">
            <div class="form-group">
              <label>Nome</label>
              <input
                v-model="formData.name"
                type="text"
                name="name"
                class="form-control"
              />
            </div>

            <div class="form-group">
              <label>Cognome</label>
              <input
                v-model="formData.surname"
                type="text"
                name="surname"
                class="form-control"
              />
            </div>

            <div class="form-group">
              <label>Indirizzo Email</label>
              <input
                v-model="formData.email"
                type="email"
                name="email"
                class="form-control"
              />
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
                v-model="formData.message"
              ></textarea>
            </div>
            <input type="submit" class="btn btn-primary" value="Invia" />
          </form>

          <div class="alert alert-success" role="alert" v-else>
            Email inviata correttamente.
          </div>
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
  data() {
    return {
      isSent: false,
      formData: {
        name: "",
        surname: "",
        email: "",
        message: "",
      },
    };
  },
  methods: {
    emailSend() {
      window.axios.post("/api/contacts", this.formData).then((resp) => {
        this.isSent = true;
      });
    },
  },
};
</script>

<style>
</style>