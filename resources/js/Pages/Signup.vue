<template>
  <Head title="Inertia ToDo | Signup" />
  <section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card bg-dark text-white" style="border-radius: 1rem">
            <div class="card-body p-5 text-center">
              <form
                action=""
                method="post"
                @submit.prevent="form.post('/signup')"
              >
                <div class="mb-md-5 mt-md-4 pb-5">
                  <h2 class="fw-bold mb-2 text-uppercase">Signup</h2>
                  <p class="text-white-50 mb-5">Please enter your Details</p>
                  <div class="form-outline form-white mb-4">
                    <label class="form-label" for="typeEmailX">Name</label>
                    <input
                      type="text"
                      v-model="form.name"
                      id="typeEmailX"
                      class="form-control form-control-lg"
                      placeholder="name"
                    />
                    <small class="text-danger" v-if="form.errors.name">{{
                      form.errors.name
                    }}</small>
                  </div>
                  <div class="form-outline form-white mb-4">
                    <label class="form-label" for="typeEmailX">Email</label>

                    <input
                      type="email"
                      v-model="form.email"
                      id="typeEmailX"
                      class="form-control form-control-lg"
                      placeholder="Email"
                    />
                    <small class="text-danger" v-if="form.errors.email">{{
                      form.errors.email
                    }}</small>
                  </div>

                  <div class="form-outline form-white mb-4">
                    <label class="form-label" for="typePasswordX"
                      >Password</label
                    >

                    <input
                      type="password"
                      v-model="form.password"
                      id="typePasswordX"
                      class="form-control form-control-lg"
                      placeholder="Password"
                    />
                    <small class="text-danger" v-if="form.errors.password">{{
                      form.errors.password
                    }}</small>
                  </div>

                  <button
                    class="btn btn-outline-light btn-lg px-5"
                    type="submit"
                  >
                    Signup
                  </button>
                </div>
              </form>
              <div>
                <p class="mb-0">
                  Alrady have a account? <Link href="/">Login</Link>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>


<script setup>
import { useForm, Link, Head } from "@inertiajs/vue3";
const form = useForm({
  email: null,
  password: null,
  name: null,
});
</script>

<style>
.gradient-custom {
  /* fallback for old browsers */
  background: #6a11cb;

  /* Chrome 10-25, Safari 5.1-6 */
  background: -webkit-linear-gradient(
    to right,
    rgba(106, 17, 203, 1),
    rgba(37, 117, 252, 1)
  );

  /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
  background: linear-gradient(
    to right,
    rgba(106, 17, 203, 1),
    rgba(37, 117, 252, 1)
  );
}
</style>
