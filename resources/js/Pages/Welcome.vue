<template>
    <Head title="Welcome" />
   
        <header class="shadow bg-white">
        <nav class="w-[95%] py-3 mx-auto flex justify-between items-center">
            <h1 class="text-lg font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                >Tabulating System</h1>
            <!--menu-->
                <ul v-if="$page.props.auth.user" class=" hidden md:block">
                    <li><a class="cursor-pointer font-[Poppins] text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white "
                :href="route('dashboard')">Dashboard</a></li>
                </ul>
                <ul v-else class="md:flex gap-4 hidden md:block">
                    <li><a class="cursor-pointer font-[Poppins] text-gray-600 hover:text-cyan-500 dark:text-gray-400 dark:hover:text-cyan-500 "
                :href="route('login')">Login</a></li>
                <li><a class="cursor-pointer font-[Poppins]  text-gray-600 hover:text-cyan-500 dark:text-gray-400 dark:hover:text-cyan-500 "
                :href="route('register')">Register</a></li>
                </ul>
            <button 
                                @click="showbar = !showbar"
                                class="inline-flex md:hidden items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out"
                            >
                                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path
                                        :class="{
                                            hidden: showbar,
                                            'inline-flex': !showbar,
                                        }"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M4 6h16M4 12h16M4 18h16"
                                    />
                                    <path
                                        :class="{
                                            hidden: !showbar,
                                            'inline-flex': showbar,
                                        }"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"
                                    />
                                </svg>
                            </button>
        </nav>
        <!--responsive menu-->
        <div class="absolute w-full z-[-1] bg-white shadow md:hidden" :class="{ block: showbar, hidden:!showbar}">
            <nav class="p-6 bg-white w-[95%] ">
                <ul v-if="$page.props.auth.user"  class=" flex  flex-col gap-4">
                <li><a class="cursor-pointer font-[Poppins] text-gray-600 hover:text-cyan-500 dark:text-gray-400 dark:hover:text-cyan-500 "
                :href="route('dashboard')">Dashboard</a></li>
                
                </ul>

                <ul v-else class=" flex  flex-col gap-4">
                <li><a class=" cursor-pointer font-[Poppins] text-gray-600 hover:text-cyan-500 dark:text-gray-400 dark:hover:text-cyan-500 "
                :href="route('login')">Login</a></li>
                
                <li><a class="cursor-pointer font-[Poppins]  text-gray-600 hover:text-cyan-500 dark:text-gray-400 dark:hover:text-cyan-500 "
                :href="route('register')">Register</a></li>
                </ul>
        </nav>
        </div>
    </header>
    <!--content-->
        <div class="">
            
        </div>
    
    
    
</template>
<script setup>
 import { Head } from '@inertiajs/vue3';
</script>
<script>

export default {
 props:['canLogin','canRegister','laravelVersion','phpVersion'],
 data()
 {
    return {
        showbar:false,
    }
 },
 

}
</script>






<!--<nav v-if="canLogin" class="shadow p-5 bg-white flex md:justify-between md:items-center shadow">
        <h1 class="text-lg font-semibold mx-4 text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white "
                >Tabulating System</h1>
               
        <ul v-if="$page.props.auth.user">
            <li><a class="cursor-pointer font-semibold mx-4 text-white rounded bg-cyan-500 px-6 py-2   "
                :href="route('dashboard')">Dashboard</a></li>
             
        </ul>
        <ul v-else class="md:flex ">
            <li><a class="cursor-pointer font-semibold mx-4 text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white "
                :href="route('login')">Login</a></li>
            <li><a class="cursor-pointer font-semibold mx-4 text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white "
                :href="route('register')">Register</a></li>
            
        </ul>
    </nav>-->
<style>
.bg-dots-darker {
    background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E");
}
@media (prefers-color-scheme: dark) {
    .dark\:bg-dots-lighter {
        background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E");
    }
}
</style>
