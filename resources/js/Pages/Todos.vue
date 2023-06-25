<template>
  <Head title="Inertia ToDo | Task List" />
  <section class="vh-100" style="background-color: #e2d5de">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-xl-10">
          <div class="card" style="border-radius: 15px">
            <div class="card-body p-5 clearfix">
              <h6 class="mb-3">Awesome Todo List
                <Link class="btn btn-danger float-right" method="post" href="/logout">Logout</Link>
              </h6>
              <div
                class="alert"
                :class="{
                  'alert-success': $page.props.flash.status,
                  
                }"
              >
                {{ $page.props.flash.message }}
              </div>
              <form
                class="d-flex justify-content-center align-items-center mb-4"
                @submit.prevent="form.post('/add')"
              >
                <div class="form-outline flex-fill">
                  <input
                    type="text"
                    v-model="form.task"
                    id="form3"
                    class="form-control form-control-lg"
                    placeholder="What do you need to do today?"
                  />
                  <small class="text-danger" v-if="form.errors.task">{{
                    form.errors.task
                  }}</small>
                </div>
                <button
                  type="submit"
                  class="btn btn-primary btn-lg ms-2"
                  :disabled="form.processing"
                >
                  Add
                </button>
              </form>

              <ul class="list-group mb-0">
                <li
                  v-for="todo in todos"
                  :key="todo.id"
                  class="list-group-item d-flex justify-content-between align-items-center border-start-0 border-top-0 border-end-0 border-bottom rounded-0 mb-2"
                >
                  <div class="d-flex align-items-center">
                    <input
                      class="form-check-input me-2"
                      type="checkbox"
                      v-model="form.status"
                      :key="todo.id"
                      v-if="todo.status == 1"
                      checked
                      v-on:click="updateStatus(todo.id)"
                    />
                    <input
                      class="form-check-input me-2"
                      type="checkbox"
                      v-model="form.status"
                      v-else
                      v-on:click="updateStatus(todo.id)"
                    />

                    {{ todo.task }}
                    <input type="hidden" v-model="form.id" />
                  </div>
                  <Link
                    href="/delete"
                    data-mdb-toggle="tooltip"
                    title="Remove item"
                    class="btn btn-danger"
                    method="post"
                    :data="{ id: todo.id }"
                  >
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      width="16"
                      height="16"
                      fill="currentColor"
                      class="bi bi-archive"
                      viewBox="0 0 16 16"
                    >
                      <path
                        d="M0 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 12.5V5a1 1 0 0 1-1-1V2zm2 3v7.5A1.5 1.5 0 0 0 3.5 14h9a1.5 1.5 0 0 0 1.5-1.5V5H2zm13-3H1v2h14V2zM5 7.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"
                      />
                    </svg>
                  </Link>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup>

import { Head, useForm, Link, router } from "@inertiajs/vue3";
import swal from "sweetalert";
const form = useForm({
  task: null,
  status: [],
});

defineProps({ todos: Object ,flash:Array});

function updateStatus(id) {
  swal({
    title: "Are you sure?",
    text: "Once you mark it as done it can't be revert ",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  }).then((willDelete) => {
    if (willDelete) {
      router.post("/update-status", {
        id: id,
      });
      swal("Marked as done ", {
        icon: "success",
      });
    } else {
      swal("Nothing changed");
    }
  });
}
</script>
