<template>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="shadow bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <nav class="p-4   flex justify-between items-center">
                            <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight hidden md:flex">{{ this.headTitle }}</h1>
                            <form v-if="this.headTitle=='Events'" class="flex items-center  gap-4 w-full md:w-auto">
                                
                                <input v-model="this.form.name"  type="text" class="rounded flex-1" name="name" placeholder="Event name">
                                <button class="bg-cyan-500 px-4 py-2 rounded text-white " @click.prevent="this.submit"> Create event</button>
                            </form>
                            <form v-else class="flex items-center  gap-4 w-full md:w-auto">
                                
                                <input v-model="this.findform.name"  type="text" class="rounded flex-1" name="name" placeholder="Event name">
                                <button class="bg-green-500 px-4 py-2 rounded text-white " @click.prevent="this.find"> Search event</button>
                            </form>
                        </nav>
                        
                        
                        </div> 
                             <div  v-for="(data,index) in events" :key="index">
                                
                        <div class="bg-white rounded">
                            <div  @click="getEvent(data)" class="p-4 md:rounded bg-white my-4 shadow flex justify-between items-center" :class="{cyan:this.property==data.id}">
                                <h1 class="font-semibold">{{ data.name }}</h1>
                                        
                                <div class="text-gray-700">
                                    <font-awesome-icon icon="fa-solid fa-sort-down"  />
                                </div>
                        </div>
                        <div v-if="this.property==data.id && this.headTitle=='Events'" class="w-full bg-white md:rounded shadow p-4">
                            <form class="flex flex-col  md:flex-row justify-between gap-6  items-center">
                                <div class="flex flex-col gap-4 md:flex-1   w-full md:w-auto">
                                    
                                    <label for="ename">Event name</label>
                                    <input required name="ename" v-model="eform.name" placeholder="Event name"  type="text" class=" rounded">
                                </div>
                                <div  class="flex flex-col gap-4 md:flex-1  w-full md:w-auto">
                                    <label for="edate">Date </label>
                                    <input required name="edate" v-model="eform.date" placeholder="Date" type="text" class="rounded  w-full md:w-auto">
                                </div>
                                
                                <div  class="flex flex-col gap-4 md:flex-1  w-full md:w-auto">
                                    <label for="elocation">Location </label>
                                    <input required name="elocation" v-model="eform.location" placeholder="Location" type="text" class="rounded  w-full md:w-auto">
                                </div>
                                <div class="flex flex-col gap-4 justify-between md:justify-center w-full md:w-auto">
                                    <div class="text-white hidden  md:block">.</div>
                                    <div  class="flex justify-between gap-4 items-center w-full md:w-auto">
                                        <button @click.prevent="this.update()" class="rounded bg-green-500 px-4 py-2 text-white font-semibold  flex-1 ">Update</button>
                                        <button @click.prevent="this.delete(data.id)" class="rounded bg-red-500 px-4 py-2 text-white font-semibold">Delete</button>
                                    </div>
                                </div>
                            </form>
                            <p v-if="this.error" class="font-semibold text-red-600 bg-red-100 rounded p-2 w-full my-4">*All fields are required</p>
                        
                            <nav class=" flex flex-col gap-4 items-start my-2  py-2">
                                <h1 class="font-semibold text-xl dark:text-gray-200 leading-tight hidden md:flex" >Event portions</h1>
                                <form v-if="this.headTitle=='Events'" class="flex flex-col md:flex-row w-full  items-start  gap-4 md:w-auto">
                                    
                                    <input v-model="this.portionform.name"  type="text" class="rounded w-full md:w-auto" name="name" placeholder="Portion name">
                                
                                    <button @click.prevent="this.addPortion()" class="rounded text-white shadow px-4 py-2 bg-cyan-500 font-semibold"><font-awesome-icon icon="fa-solid fa-add"  /></button>
                                </form>
                            </nav>

                            <div  v-for="(eportion,i) in eventportion" :key="i"  class="flex my-2  corsur-pointer" >
                               <div v-if="eportion.event_id==data.id" class="text-cyan-700 hover:bg-cyan-200 flex items-center gap-6 bg-cyan-100 px-6 py-2 rounded">
                                
                                <h1 class=" font-semibold ">{{ eportion.name }}</h1>
                                <font-awesome-icon icon="fa-solid fa-close" @click.prevent="this.deletePortion(eportion.id)" />
                                
                            </div>
                            </div>
                        </div>
                        </div>
                </div>

               
        </div>
</template>

<script>

import { router } from '@inertiajs/vue3';
export default {
    data()
    {
        return{
            findform:{
                name:''
            },
            form:{
                name:'',
            },
            property:-1,
            eform:{
                id:'',
                name:'',
                date:'',
                location:'',
            },
            portionform:{
                portionid:'',
                id:'',
                name:'',
            },
            updateerr:false,
            error:false,
        }
    },
    methods:{
        deletePortion($id)
        {
            router.delete("/portions/"+$id)
        },
        submit()
        {
            if(this.form.name!='')
            {
                router.post('/events', this.form);
                this.form.name='';  
            }
        },
        find()
        {
            if(this.form.name!='')
            {
                router.post('/events', this.form);
                this.form.name='';  
            }
        },
        addPortion()
        {
            if(this.portionform.name!=''){
                router.post('/portions',this.portionform);
                this.portionform.name='';
            }
        },
        update()
        {
            if( this.eform.date!='' && this.eform.location!='' && this.eform.name!='')
            {
                this.error=false;
                router.post("/event/update",this.eform)
            }else{
                this.error=true;
            }
        },
        delete($id){
            router.delete('/events/'+$id)
        },
        getEvent(data)
        {
            
            if(this.property!=data.id)
            {
            this.portionform.name='';
            this.portionform.id=data.id;
            this.eform.id=data.id;
            this.property=data.id;
            this.eform.name=data.name;
            this.eform.date=data.date;
            this.eform.location=data.location;
            }else
            {
                this.error=false;
                this.property=-1;
            }
        },
        

    },
    props:['events','headTitle','eventportion'],
    }
</script>

<style scoped>
.cyan{
    border-left: 4px solid #06b6d4;
}
</style>