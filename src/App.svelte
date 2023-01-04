<script>
  import { currentPage } from "./data-users";
  import Header from "./routes/Header.svelte";
  import Navbar from "./routes/Navbar.svelte";
  import SignIn from "./routes/SignIn.svelte";
  import SignUp from "./routes/SignUp.svelte";
  import Forget from './routes/Forget.svelte'
  import Horarios from "./routes/Horarios.svelte";
</script>

<main class="bg-gray-800 h-full flex flex-col justify-center items-center">
<Header/>
<Navbar />
    {#if $currentPage == "index"}
      <SignIn />
    {:else if $currentPage == "register"}
      <SignUp />
    {:else if $currentPage == "login"}
      <SignIn />
    {:else if $currentPage == "forget"}
      <Forget />
    {:else if $currentPage == "home"}
      <Horarios />
    {/if}


</main>
