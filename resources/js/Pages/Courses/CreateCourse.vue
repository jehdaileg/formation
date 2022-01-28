<template>
<AppLayoutVue>

              <template #header>
                 <div class="flex space-x-2 ">
                      <Link :href="route('dashboard')"><span class="px-2 py-2 p-4" :style="'padding:20px;'">&larr;</span></Link>
                  <h5 class="text-black font-bold">Nouvelle Formation</h5>

                 </div>
              </template>

                        <div class="w-full mt-3 max-w-lg mx-20">
                                <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                                    <div class="mb-4">
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                                        Title
                                    </label>
                                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text" placeholder="Username">
                                    </div>
       <div class="mb-4">
    <label for="exampleFormControlTextarea1" class="form-label inline-block mb-2 text-gray-700"
      >Example textarea</label
    >
    <textarea class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid rounded transition ease-in-out m-0 focus:text-gray-700 focus:outline-none focus:border-blue-600 focus:bg-white"
      id="exampleFormControlTextarea1"
      rows="3"
      placeholder="Description..."
    ></textarea>
  </div>

                                    <div class="flex items-center justify-between">
                                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                                        Sign In
                                    </button>
                                    <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="#">
                                        Forgot Password?
                                    </a>
                                    </div>
                                </form>
            <p class="text-center text-gray-500 text-xs">
                &copy;2020 Acme Corp. All rights reserved.
            </p>
            </div>

</AppLayoutVue>

</template>

<script>

import AppLayoutVue from "../../Layouts/AppLayout.vue";
import { Link } from "@inertiajs/inertia-vue3";
export default {

    components: {
        AppLayoutVue, Link,

    }

}

</script>
