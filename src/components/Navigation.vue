<template>
   <div>
       <ul>
           <li>
               <router-link to="/todo">Todo</router-link>
           </li>
           <li>
               <router-link to="/history">History</router-link>
           </li>
           
       </ul>
   </div>
</template>

<script>
export default {
 
}
</script>

<style>
    ul{
        display: flex;
        list-style: none;
        justify-content: center;
        align-items: center;
    }
    ul li{
        margin:0 15px;
    }
</style>