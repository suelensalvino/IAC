<script>
  import { currentPage, isLogged } from "./data-users";
  import Index from "./routes/Index.svelte";
  import Navbar from "./routes/Navbar.svelte";
  import SignIn from "./routes/SignIn.svelte";
  import SignUp from "./routes/SignUp.svelte";
  import Home from "./routes/Home.svelte";
</script>

<main class="bg-gray-800 h-screen flex">
  <Navbar />

  {#if $currentPage == 'index'}
    <Index />
  {:else if $currentPage == 'register'}
    <SignUp />
  {:else if $currentPage == 'login'}
  <SignIn />
  {:else if $currentPage == 'home'}
  <Home />
  {/if}

</main>
